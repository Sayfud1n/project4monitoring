<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Setelah login, arahkan ke dashboard.
     * Kita ganti RouteServiceProvider::HOME menjadi '/dashboard'
     */
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // 1. Validasi input
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // 2. Cek apakah yang diinput itu email atau username
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 3. Susun data login
        $loginData = [
            $loginType => $request->username,
            'password' => $request->password
        ];

        // 4. Proses Autentikasi
        if (Auth::attempt($loginData)) {
            // Jika berhasil, arahkan ke URL /dashboard
            return redirect()->intended('/dashboard');
        }

        // 5. Jika gagal, balik ke login dengan pesan error
        return redirect()->route('login')
            ->withInput($request->only('username'))
            ->with(['error' => 'Username/Email atau Password salah!']);
    }
}