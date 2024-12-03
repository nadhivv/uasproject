<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Orders;

class MakananController extends Controller
{
    public function index()
    {
        $makanan = Makanan::all();
        return view('makanan.index', compact('makanan'));
    }
    public function create($reservasiId)
    {
        $reservasi = Reservasi::findOrFail($reservasiId);
        $makanan = Makanan::all();

        return view('makanan.create', compact('reservasi', 'makanan')); // View untuk form pemesanan makanan
    }

    public function store(Request $request, $reservasiId)
    {
        $request->validate([
            'makanan_id' => 'required|exists:makanan,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cari data makanan berdasarkan ID
        $makanan = Makanan::findOrFail($request->makanan_id);

        // Ambil data reservasi untuk mendapatkan penginapan_id
        $reservasi = Reservasi::findOrFail($reservasiId);

        // Buat pemesanan makanan
        Orders::create([
            'user_id' => auth()->id(), // ID pengguna yang sedang login
            'penginapan_id' => $reservasi->penginapan_id, // ID penginapan dari reservasi
            'type' => 'food', // Jenis order
            'description' => 'Pemesanan makanan: ' . $makanan->nama_makanan, // Deskripsi order
            'price' => $makanan->harga * $request->quantity, // Total harga
            'status' => 'processing', // Status awal pemesanan
        ]);

        return redirect()->route('reservasi.show', $reservasiId)->with('success', 'Pesanan makanan berhasil dibuat.');
    }
}
