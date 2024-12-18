<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use Illuminate\Http\Request;

class PenginapanController extends Controller
{
    public function search(Request $request)
    {
        $penginapans = Penginapan::paginate(6);
        $penginapans = Penginapan::where('location', 'LIKE', '%' . $request->kota . '%')
            ->where('available_from', '<=', $request->checkin_date)
            ->where('available_to', '>=', $request->checkout_date)
            ->get();

        return view('user.penginapan', compact('penginapans'));
    }
}
