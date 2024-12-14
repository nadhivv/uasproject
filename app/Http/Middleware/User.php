<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to access this page.']);
        }

        if ($user->jenisuser_id !== 2) {
            return redirect()->route('user.dashboard')->withErrors(['error' => 'Access denied for Admin users.']);
        }
        return $next($request);
    }
}
