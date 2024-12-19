<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Midtrans\Config;
use Midtrans\Snap;


class PaymentController extends Controller
{

    public function process(Request $request)
    {
        $request->validate([
            'makanan_id' => 'required|exists:makanan,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $makanan = Makanan::findOrFail($request->makanan_id);

        if ($makanan->stock < $request->quantity) {
            return back()->with('error', 'Stock tidak mencukupi');
        }

        $total_amount = $makanan->harga * $request->quantity;
        $order_id = 'TRX-' . time();

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'order_id' => $order_id,
            'total_amount' => $total_amount,
            'status' => 'pending',
        ]);

        TransactionItem::create([
            'transaction_id' => $transaction->id,
            'makanan_id' => $makanan->id,
            'quantity' => $request->quantity,
            'price' => $makanan->harga,
        ]);

        // Mengonfigurasi Midtrans
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

            return view('transactions.payment', compact('transaction', 'makanan', 'snapToken'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mendapatkan Snap Token');
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            $transaction = Transaction::where('order_id', $request->order_id)->first();

            if ($request->transaction_status == 'capture' || $request->transaction_status == 'Settlement') {
                $transaction->update(['status' => 'paid']);

                // Update stock
                foreach ($transaction->items as $item) {
                    $makanan = $item->makanan;
                    $makanan->update([
                        'stock' => $makanan->stock - $item->quantity
                    ]);
                }
            } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {
                $transaction->update(['status' => 'cancelled']);
            }
        }

        return response()->json(['status' => 'success']);
    }

    public function updatePaymentStatus(Request $request)
    {
        $transaction = Transaction::where('order_id', $request->order_id)->first();

        if ($transaction) {
            $transaction->update(['status' => 'paid']);

            // Update stock untuk setiap item yang ada di dalam transaksi
            foreach ($transaction->items as $item) {
                $makanan = $item->makanan;
                $makanan->update([
                    'stock' => $makanan->stock - $item->quantity
                ]);
            }

            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'error'], 404);
    }

    public function index()
    {
        // Mengambil semua transaksi untuk pengguna yang sedang login
        $transaction = Transaction::with('items.makanan')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        // Mengembalikan view dengan data transaksi
        return view('transactions.history', compact('transaction'));
    }
}
