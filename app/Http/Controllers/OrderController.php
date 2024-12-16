<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use App\Models\Laundry;
use App\Models\Orders;
use App\Models\Penginapan;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan semua pesanan pengguna yang sudah login
    public function index()
    {
        // Ambil pesanan berdasarkan user yang login
        $orders = Orders::where('user_id', Auth::id())
            ->whereIn('type', ['food', 'laundry'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('order.index', compact('orders'));
    }

}
