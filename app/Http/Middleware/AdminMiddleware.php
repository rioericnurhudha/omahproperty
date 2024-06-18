<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sedang login sebagai admin
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman login
        return redirect()->route('login')->withErrors(['message' => 'Unauthorized.']);
    }
}
