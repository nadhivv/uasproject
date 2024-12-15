<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Orders;
use App\Models\Penginapan;
use App\Models\Service_Payment;
use Illuminate\Support\Facades\Auth;

class LaundryController extends Controller
{
    // Menampilkan daftar layanan laundry
    public function index()
    {
        $laundry = Laundry::all();
        return view('admin.laundry.index', compact('laundry'));
    }

    public function create(Request $request)
    {
        // Ambil laundry_id dari request
        $laundryId = $request->input('laundry_id');

        // Cari data laundry berdasarkan ID
        $laundry = Laundry::find($laundryId);

        // Jika data laundry tidak ditemukan, kirimkan pesan kesalahan
        if (!$laundry) {
            return view('dashboard', ['error' => 'Data laundry tidak ditemukan.']);
        }

        // Jika data ditemukan, tampilkan halaman untuk mengonfirmasi pesanan
        return view('user.detail_pesanan2', compact('laundry'));
    }



    // Memproses pesanan laundry

    public function storelaundry(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'jenis_laundry' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah' => 'required|integer|min:1',
            'waktu_pengambilan' => 'required|date',
            'waktu_pengembalian' => 'required|date|after_or_equal:waktu_pengambilan',
        ]);

        // Simpan data laundry
        $laundry = Laundry::create([
            'jenis_laundry' => $validated['jenis_laundry'],
            'harga' => $validated['harga'],
            'jumlah' => $validated['jumlah'],
            'waktu_pengambilan' => $validated['waktu_pengambilan'],
            'waktu_pengembalian' => $validated['waktu_pengembalian'],
        ]);

        // Hitung total harga
        $totalPrice = $validated['harga'] * $validated['jumlah'];

        // Simpan data orders
        $orders = Orders::create([
            'user_id' => Auth::id(),
            'laundry_id' => $request->laundry_id,
            'description' => 'Pesanan laundry: ' . $laundry->jenis_laundry,
            'price' => $totalPrice,
            'order_date' => now(),
        ]);

        // Redirect ke halaman detail pesanan
        return redirect()->route('detail_pesanan2', ['orderId' => $orders->id])
                         ->with('success', 'Pesanan Anda berhasil dibuat.');
    }


    public function detail($orderId)
    {
        $orders = Orders::with('laundry')->findOrFail($orderId);
        $laundry = $orders->laundry;

        return view('user.detail_pesanan2', compact('orders', 'laundry'));
    }


    // Menampilkan halaman pembayaran
    public function showPembayaranlaundry($orderId)
    {
        $orders = Orders::with('laundry')->findOrFail($orderId);

        return view('user.pembayaran_laundry', compact('orders'));
    }

    // Proses pembayaran pesanan
    public function prosesPembayaranlaundry(Request $request, $orderId)
    {
        $validated = $request->validate([
            'method' => 'required|string',
        ]);

        $orders = Orders::findOrFail($orderId);

        $this->savePayment($orders, $validated);

        return redirect()->route('pembayaran.sukses2', ['orderId' => $orderId]);
    }

    // Menampilkan halaman pembayaran sukses
    public function showPembayaranSukseslaundry($orderId)
    {
        $orders = Orders::findOrFail($orderId);
        return view('user.pembayaran_sukses_laundry', compact('orders'));
    }

    // Menyimpan informasi pembayaran
    private function savePayment($orders, $validated)
    {
        Service_Payment::create([
            'order_id' => $orders->id,
            'total_harga' => $orders->price,
            'payment_date' => now(),
            'method' => $validated['method'],
        ]);
    }
}
