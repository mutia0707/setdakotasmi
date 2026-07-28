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

            $bagian = strtolower(trim($user->bagian ?? ''));
            $role = strtolower(trim($user->role ?? ''));

            // 3. Pengalihan Berdasarkan Role & Bagian
            if ($role === 'admin' || $role === 'super_admin') { 
                return redirect()->to('/admin/dashboard'); 
            } 
            
            // JIKA BAGIANNYA UMUM: Arahkan ke panel khusus Bagian Umum
            if (stripos($bagian, 'umum') !== false) {
                return redirect()->to('/staff/umum'); // <--- Sesuaikan URL halaman Bagian Umum Anda jika berbeda
            }

            // Jika bagiannya khusus Agenda Pimpinan (ASDA)
            if (stripos($bagian, 'agenda') !== false || stripos($bagian, 'asda') !== false) {
                return redirect()->to('/staff/agenda'); 
            }

            // Jika bagian pelayanan lain
            if (stripos($bagian, 'pelayanan') !== false) {
                return redirect()->to('/staff/berita'); 
            }

            // Default staff lain
            if ($role === 'staff') {
                return redirect()->to('/staff/agenda'); 
            }

            return redirect()->to('/');
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
        
        return redirect('/'); 
    }
}