<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek jika pengguna tidak login atau rolenya tidak sesuai dengan yang diizinkan
        if (! $request->user() || $request->user()->role !== $role) {
            // Tampilkan halaman error 403 dengan pesan yang lebih umum
            abort(403, 'ANDA TIDAK MEMILIKI AKSES UNTUK HALAMAN INI.');
        }

        return $next($request);
    }
}
