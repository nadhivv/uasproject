<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
{
    // Eager load relasi jenisUser
    $users = User::with('jenisUser')->get();
    $jenisusers = JenisUser::all();
    $menus = Menu::all();
    $currentUserRole = Auth::user()->jenisuser_id;
    $assignedMenuIds = JenisUser::findOrFail($currentUserRole)->menus->pluck('id')->toArray();
    $assignedMenus = Menu::whereIn('id', $assignedMenuIds)->get();

    return view('user.dashboard', [
        'users' => $users,
        'menus' => $menus,
        'assignedMenus' => $assignedMenus,
        'jenisusers' => $jenisusers
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
                return redirect()->intended('/admin/dashboard')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->intended('/user/dashboard')->with('success', 'Welcome User!');
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
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
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

}

