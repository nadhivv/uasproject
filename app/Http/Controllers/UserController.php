<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Makanan;
use App\Models\Photos;
use App\Models\Orders;
use App\Models\Service_Payment;

class UserController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login logic
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    public function showRegisterForm()
    {
    return view('auth.register');
    }

    // Handle register logic
        public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenisuser_id' => 2,
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        // Melakukan logout
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function index()
    {
        $makanan = Makanan::all();
        return view('user.dashboard', compact('makanan'));
    }

    public function showDetailPesanan($makananId)
    {
        $makanan = Makanan::findOrFail($makananId);

        return view('user.detail_pesanan', compact('makanan'));
    }

    public function storePesanan(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'makanan_id' => 'required|exists:makanan,id',
        ]);

        $makanan = Makanan::findOrFail($request->makanan_id);

        // Hitung harga total
        $totalPrice = $makanan->harga;

        // Simpan pesanan ke tabel orders
        $order = Orders::create([
            'user_id' => Auth::id(),
            'makanan_id' => $request->makanan_id,
            'description' => 'Pesanan makanan: ' . $makanan->nama_makanan,
            'price' => $totalPrice,
            'order_date' => now(),
        ]);

        // Setelah pesanan berhasil disimpan, arahkan ke halaman pembayaran
        return redirect()->route('pembayaran', ['orderId' => $order->id]);
    }

    public function showPembayaran($orderId)
    {
        $orders = Orders::with('makanan')->findOrFail($orderId);

        return view('user.pembayaran_makanan', compact('orders'));
    }

    public function prosesPembayaran(Request $request, $orderId)
    {
        $validated = $request->validate([
            'method' => 'required|string',
        ]);

        $orders = Orders::findOrFail($orderId);

        $this->savePayment($orders, $validated);

        return redirect()->route('pembayaran.sukses', ['orderId' => $orderId]);
    }


    public function showPembayaranSukses($orderId)
    {
        $orders = Orders::findOrFail($orderId);
        return view('user.pembayaran_sukses', compact('orders'));
    }


    private function savePayment($orders, $validated)
    {
        Service_Payment::create([
            'order_id' => $orders->id,
            'total_harga' => $orders->price,
            'payment_date' => now(),
            'method' => $validated['method'],
        ]);
    }


}

