<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Laundry;
use App\Models\Orders;
use App\Models\Penginapan;
use Illuminate\Support\Facades\Auth;
use App\Models\Photos;

class OrderController extends Controller
{
    // Menampilkan semua pesanan pengguna yang sudah login
    public function index()
    {
        $orders = Orders::where('user_id', auth()->id())
                        ->whereIn('type', ['food', 'laundry'])
                        ->get();

        return view('order.index', compact('orders'));
    }

    // Fungsi untuk memesan makanan
    public function storeFoodOrder(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'penginapan_id' => 'required|exists:penginapan,id',
            'makanan_id' => 'required|exists:makanan,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $makanan = Makanan::findOrFail($validated['makanan_id']);

        // Membuat pesanan makanan
        Orders::create([
            'user_id' => $validated['user_id'],
            'penginapan_id' => $validated['penginapan_id'],
            'type' => 'food',
            'description' => 'Pesanan makanan: ' . $makanan->nama_makanan,
            'price' => $makanan->harga * $validated['quantity'],
            'status' => 'processing',
        ]);

        return redirect()->route('makanan.index')->with('success', 'Pesanan makanan berhasil dibuat!');
    }

    // Fungsi untuk memesan laundry
    public function storeLaundryOrder(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'penginapan_id' => 'required|exists:penginapan,id',
            'laundry_id' => 'required|exists:laundry,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $laundry = Laundry::findOrFail($validated['laundry_id']);

        // Membuat pesanan laundry
        Orders::create([
            'user_id' => $validated['user_id'],
            'penginapan_id' => $validated['penginapan_id'],
            'type' => 'laundry',
            'description' => 'Pesanan laundry: ' . $laundry->jenis_laundry,
            'price' => $laundry->harga * $validated['quantity'],
            'status' => 'processing',
        ]);

        return redirect()->route('laundry.index')->with('success', 'Pesanan laundry berhasil dibuat!');
    }

    public function pesan(Request $request, $makananId)
    {
        $penginapanId = $request->input('penginapan_id'); // Ambil penginapan_id dari request
        if (!$penginapanId) {
            return back()->withErrors(['error' => 'Kolom penginapan wajib diisi.']);
        }

        Order::create([
            'user_id' => Auth::id(),
            'makanan_id' => $makananId,
            'penginapan_id' => $penginapanId, // Pastikan nilai tersedia
        ]);

        return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
    }
}
