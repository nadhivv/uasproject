<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\Transaction;
use App\Models\TransactionLaundry;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class LaundryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_laundry' => 'required',
            'jumlah' => 'required|integer|min:1',
            'waktu_pengambilan' => 'required|date',
            'waktu_pengembalian' => 'required|date',
        ]);

        // Tentukan harga berdasarkan jenis layanan laundry
        $jenisLayanan = $request->jenis_laundry;
        $harga = match ($jenisLayanan) {
            'cuci_kering' => 20000,
            'cuci_setrika' => 30000,
            'setrika' => 15000,
            default => 0,
        };

        // Hitung total harga
        $totalHarga = $harga * $request->jumlah;

        // Buat data laundry
        $laundry = Laundry::create([
            'jenis_laundry' => $request->jenis_laundry,
            'harga' => $totalHarga,
            'jumlah' => $request->jumlah,
            'waktu_pengambilan' => $request->waktu_pengambilan,
            'waktu_pengembalian' => $request->waktu_pengembalian,
        ]);

        // Buat transaksi baru
        $order_id = 'TRX-' . time();
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'order_id' => $order_id,
            'total_amount' => $totalHarga,
            'status' => 'pending',
        ]);

        // Simpan data transaksi laundry
        TransactionLaundry::create([
            'transaction_id' => $transaction->id,
            'laundry_id' => $laundry->id, // Mengambil ID laundry yang baru saja dibuat
            'jumlah' => $request->jumlah,
            'price' => $totalHarga,
        ]);

        return redirect()->route('laundry.detail', ['laundryId' => $laundry->id]);
    }

    public function payment(Request $request, $transactionId)
    {
        if (!$transactionId) {
            return redirect()->back()->with('error', 'Transaction ID is missing.');
        }

        $transaction = Transaction::findOrFail($transactionId);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->order_id,
                'gross_amount' => $transaction->total_amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('transactions.laundry', compact('transaction', 'snapToken'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mendapatkan Snap Token');
        }
    }


    public function detail($laundryId)
    {
        $laundry = Laundry::with('transactionLaundry.transaction')->findOrFail($laundryId);

        $transaction = $laundry->transactionLaundry->first()->transaction;

        $transactionId = $transaction->id;
        return view('user.detail_pesanan2', compact('laundry', 'transactionId'));
    }



    public function callback(Request $request)
    {
        // Verifikasi signature dari Midtrans
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            $transaction = Transaction::where('order_id', $request->order_id)->first();

            // Cek status transaksi dari Midtrans
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                // Pembayaran berhasil
                $transaction->update(['status' => 'paid']);
            } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {
                // Pembayaran dibatalkan
                $transaction->update(['status' => 'cancelled']);
            }
        }

        return response()->json(['status' => 'success']);
    }

    public function DetailPesanan($laundryId)
    {
        $transaction = Transaction::with('laundry')->findOrFail($laundryId);

        return view('user.detail_pesanan2', compact('transaction'));
    }

    public function laundryhistory()
    {
        // Mengambil semua transaksi untuk pengguna yang sedang login
        $transaction = Transaction::with('item.laundry')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Mengembalikan view dengan data transaksi
        return view('transactions.history_laundry', compact('transaction'));
    }
}
