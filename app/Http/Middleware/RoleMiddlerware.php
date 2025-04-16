<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddlerware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            // Pengguna belum login
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            // Pengguna memiliki peran yang berbeda, arahkan ke URL sesuai peran mereka
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin');
                case 'customer':
                    return redirect('/customer');
                default:
                    return redirect('/');
            }
        }
        return $next($request);
    }
}
