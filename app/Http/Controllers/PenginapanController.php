<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

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
    ]);

    // Cari data penginapan berdasarkan name
    $penginapan = Penginapan::where('name', $name)->firstOrFail();

    // Membuat booking baru
    $booking = new Booking;
    $booking->user_id = Auth::id();
    $booking->penginapan_id = $penginapan->id;
    $booking->check_in = Carbon::parse($request->check_in)->format('Y-m-d');
    $booking->check_out = Carbon::parse($request->check_out)->format('Y-m-d');
    $booking->total_harga = $this->calculateTotalHarga($penginapan, $request->check_in, $request->check_out); // Menghitung total harga 
    $booking->status = 'pending';
    // Simpan data booking lainnya

    $booking->save();

    return view('transactions.payment')->with(compact('booking'));
}

}
