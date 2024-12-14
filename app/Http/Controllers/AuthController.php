<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\JenisUser;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login logic
    public function login(Request $request)
{

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();

        // Redirect berdasarkan jenisuser_id
        if ($user->jenisuser_id == 1) { // Admin
            return redirect()->route('admin.dashboard');
        } elseif ($user->jenisuser_id == 2) { // User
            return redirect()->route('user.dashboard');
        }
    }

    return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
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
            'jenisuser_id' => $request->jenisuser_id,
        ]);

        Auth::login($user);
        return redirect()->route('login');
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
