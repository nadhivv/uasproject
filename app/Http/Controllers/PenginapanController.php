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
}
