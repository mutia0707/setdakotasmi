<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Coba Login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // 3. Pengalihan Berdasarkan Role (Pintu Masuk Otomatis)
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } 
            
            if ($user->role === 'staff') {
                return redirect()->intended('/staff/agenda');
            }

            return redirect('/');
        }

        // 4. Jika Login Gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // KUNCI: Redirect ke beranda agar tidak 404
        return redirect('/'); 
    }
}