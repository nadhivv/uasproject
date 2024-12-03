<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Orders;
use App\Models\Penginapan;

class LaundryController extends Controller
{
    // Menampilkan daftar layanan laundry
    public function index()
    {
        $laundry = Laundry::all();
        return view('laundry.index', compact('laundry'));
    }

    public function create($reservasiId)
    {
        // Ambil data reservasi untuk memastikan pemesanan hanya bisa dilakukan jika reservasi valid
        $reservasi = Reservasi::findOrFail($reservasiId);

        // Ambil semua layanan laundry
        $laundry = Laundry::all();

        return view('laundry.create', compact('reservasi', 'laundry'));
    }

    // Memproses pesanan laundry
    public function store(Request $request)
    {
        $request->validate([
            'laundry_id' => 'required|exists:laundry,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil data laundry yang dipilih
        $laundry = Laundry::findOrFail($request->laundry_id);

        $reservasi = Reservasi::findOrFail($reservasiId);

        Orders::create([
            'user_id' => auth()->id(),
            'penginapan_id' => $reservasi->penginapan_id, // Ambil penginapan dari reservasi
            'type' => 'laundry',
            'description' => 'Pemesanan laundry: ' . $laundry->jenis_laundry,
            'price' => $laundry->harga * $request->quantity,  // Harga total berdasarkan kuantitas
            'status' => 'processing',  // Status pesanan
        ]);

        return redirect()->route('laundry.index')->with('success', 'Pesanan laundry berhasil dibuat.');
    }
}
