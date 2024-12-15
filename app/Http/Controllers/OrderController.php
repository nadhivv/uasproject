<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Laundry;
use App\Models\Orders;
use App\Models\Penginapan;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan semua pesanan pengguna yang sudah login
    public function index()
    {
        // Ambil pesanan berdasarkan user yang login
        $orders = Orders::where('user_id', Auth::id())
            ->whereIn('type', ['food', 'laundry'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('order.index', compact('orders'));
    }

    // Fungsi untuk memesan makanan
    // public function storeFoodOrder(Request $request)
    // {
    //     $validated = $request->validate([
    //         'makanan_id' => 'required|exists:makanan,id',
    //         'penginapan_id' => 'required|exists:penginapan,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $makanan = Makanan::findOrFail($validated['makanan_id']);

    //     // Membuat pesanan makanan
    //     Orders::create([
    //         'user_id' => Auth::id(),
    //         'penginapan_id' => $validated['penginapan_id'],
    //         'type' => 'food',
    //         'description' => 'Pesanan makanan: ' . $makanan->nama_makanan,
    //         'price' => $makanan->harga * $validated['quantity'],
    //         'quantity' => $validated['quantity'],
    //         'status' => 'processing',
    //     ]);

    //     return redirect()->route('order.index')->with('success', 'Pesanan makanan berhasil dibuat!');
    // }

    // Fungsi untuk memesan laundry
    // public function storeLaundryOrder(Request $request)
    // {
    //     $validated = $request->validate([
    //         'laundry_id' => 'required|exists:laundry,id',
    //         'penginapan_id' => 'required|exists:penginapan,id',
    //         'jumlah' => 'required|integer|min:1',
    //     ]);

    //     $laundry = Laundry::findOrFail($validated['laundry_id']);

    //     // Membuat pesanan laundry
    //     Orders::create([
    //         'user_id' => Auth::id(),
    //         'penginapan_id' => $validated['penginapan_id'],
    //         'type' => 'laundry',
    //         'description' => 'Pesanan laundry: ' . $laundry->jenis_laundry,
    //         'price' => $laundry->harga * $validated['jumlah'],
    //         'quantity' => $validated['jumlah'],
    //         'status' => 'processing',
    //     ]);

    //     return redirect()->route('order.index')->with('success', 'Pesanan laundry berhasil dibuat!');
    // }
}
