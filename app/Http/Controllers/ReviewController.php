<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($penginapan_id)
    {
        // Mengambil semua review yang terkait dengan penginapan tertentu
        $reviews = Review::where('penginapan_id', $penginapan_id)
                         ->with('user') // Mengambil data user yang membuat review
                         ->get();

        // Pastikan data 'reviews' tidak kosong
        if ($reviews->isEmpty()) {
            abort(404, 'No reviews found for this penginapan');
        }

        // Mengirimkan data ke view
        return view('user.dashboard', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string',
        ]);

        Review::create([
            'user_id' => auth::id(), // pastikan pengguna sudah login
            'penginapan_id' => $request->penginapan_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
    }
}

