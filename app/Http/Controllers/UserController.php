<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Makanan;
use App\Models\Photos;
use App\Models\Orders;
use App\Models\Service_Payment;
use App\Models\SettingMenu;


class UserController extends Controller
{

    public function index()
    {
        // Eager load relasi jenisUser
        $users = User::with('jenisusers')->get();
        $jenisusers = JenisUser::all();
        $menus = Menu::all();
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
        $makanan = Makanan::all();

        return view('user.dashboard', [
            'users' => $users,
            'menus' => $menus,
            'assignedMenus' => $assignedMenus,
            'jenisusers' => $jenisusers,
            'makanan'=> $makanan
        ]);
    }

    public function loginview()
    {
        return view('auth.login');

    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            $user = Auth::user();

            if ($user->jenisuser_id == 1) {
                return redirect('/admin/dashboard')->with('success', 'Welcome Admin!');
            } elseif ($user->jenisuser_id == 2) {
                return redirect('/user/dashboard')->with('success', 'Welcome User!');
            }
        }

        // Jika login gagal
        return redirect('/')->withErrors(['error' => 'Invalid credentials.']);
    }

    public function registerview()
{
    $users = User::all();
    $jenisusers = JenisUser::all();
    $menus = Menu::all();

    // Check if the user is authenticated
    if (Auth::check()) {
        $currentUserRole = Auth::user()->jenisuser_id;
        $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
        $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();
    } else {
        // If no user is logged in, set assignedMenus to an empty array
        $assignedMenus = [];
    }

    return view('auth.register', [
        'users' => $users,
        'menus' => $menus,
        'assignedMenus' => $assignedMenus,
        'jenisusers' => $jenisusers,
    ]);
}
    public function register(request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'jenisuser_id' => 2, // Default untuk user biasa
            'create_by' => 'system',
            'update_by' => 'system',
            'status_user' => 'active',
        ]);

        return redirect('/')->with('success', 'Registration successful. Please log in.');

    }

    public function logout(Request $request)
    {
        // Melakukan logout
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
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
        $orders = Orders::create([
            'user_id' => Auth::id(),
            'makanan_id' => $request->makanan_id,
            'description' => 'Pesanan makanan: ' . $makanan->nama_makanan,
            'price' => $totalPrice,
            'order_date' => now(),
        ]);

        // Setelah pesanan berhasil disimpan, arahkan ke halaman pembayaran
        return redirect()->route('pembayaran', ['orderId' => $orders->id]);
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
