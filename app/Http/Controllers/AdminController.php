<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard');

    }


    // Menampilkan daftar makanan untuk user
    public function makanan()
    {
        $makanan = Makanan::all();
        return view('user.dashboard', compact('makanan'));
    }
}
