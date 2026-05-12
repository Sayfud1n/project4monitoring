<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoute
{ // <-- Jangan lupa kurung kurawal buka ini
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
{
    if ($request->route()->named('profile')) {
        // Ganti dd() menjadi logger() agar halaman tidak berhenti di sini
        logger("Berhasil! Middleware mendeteksi rute profile."); 
    }

    // Baris ini sangat penting agar request diteruskan ke tujuan aslinya (Controller/Route)
    return $next($request);
}
}