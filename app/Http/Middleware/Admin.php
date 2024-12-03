<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/')->withErrors(['error' => 'You must be logged in to access this page.']);
        }

        if ($user->id_jenis_user !== 1) {
            return redirect()->back()->withErrors(['error' => 'You must be an Admin to access this page.']);
        }
        return $next($request);
    }
}
