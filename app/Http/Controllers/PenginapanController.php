<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Penginapan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenginapanController extends Controller
{
    public function search(Request $request)
    {
        $penginapans = Penginapan::query();

        if ($request->has('kota') && $request->kota != '') {
            $penginapans->where('location', 'LIKE', '%' . $request->kota . '%');
        }

        if ($request->has('checkin_date') && $request->checkin_date != '') {
            $penginapans->where('available_from', '<=', $request->checkin_date)
                        ->where('available_to', '>=', $request->checkout_date);
        }

        // Pagination untuk menampilkan 6 penginapan per halaman
        $penginapans = $penginapans->paginate(6);

        return view('user.sample', compact('penginapans'));
    }

    public function show($name)
    {
        $penginapan = Penginapan::where('name', $name)->firstOrFail();

        return view('user.penginapan', compact('penginapan'));
    }

    public function booking(Request $request, $name)
{
    // Validasi data input
    $request->validate([

        'name' => 'required',
        'email' => 'required|email',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
        'total_harga' => 'required',
    ]);

    // Cari data penginapan berdasarkan name
    $penginapan = Penginapan::where('name', $name)->firstOrFail();
    Booking::create([
        'user_id' => Auth::id(), // Mengambil ID user yang sedang login
        'penginapan_id' => $penginapan->id, // ID dari penginapan yang dipilih
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'total_harga' => $request->total_harga,
        'status' => 'pending', // Atur status awal menjadi pending
    ]);
    // Simpan data booking lainnya
    return redirect()->route('penginapan.detail', ['name' => $penginapan->name])->with('success', 'Booking berhasil dibuat!');
   
}
// public function detail($name)
// {
//     // Cari data penginapan berdasarkan name dan muat relasi transactionPenginapan.transaction
//     $penginapan = Penginapan::with('transactionPenginapan.transaction')->where('name', $name)->firstOrFail();

//     // Ambil transaksi pertama dari relasi transactionPenginapan
//     $transaction = $penginapan->transactionPenginapan->first()->transaction;

//     // Ambil ID transaksi
//     $transactionId = $transaction->id;

//     // Kirim data ke view
//     return view('user.detail_penginapan', compact('transactionId'));
// }


}
