<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function cariLokasi(Request $request)
    {
        // Ambil daftar kota yang unik
        $lokasi = Lokasi::all();
        $lokasi = Lokasi::distinct()->pluck('nama_kota', 'nama_kota');

        // Logika pencarian jika ada input lokasi
        $query = Lokasi::query();

        // Jika ada input lokasi, filter berdasarkan kota
        if ($request->has('lokasi') && $request->lokasi != '') {
            $query->where('nama_kota', $request->lokasi);
        }

        // Ambil hasil pencarian
        $hasil = $query->get();

        // Kirim data ke view
        return view('user.lokasi', compact('lokasi', 'hasil'));
    }


}
