<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Untuk interaksi dengan Database
use Carbon\Carbon; // Untuk mengatur format hari otomatis Indonesia

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

    /**
     * FUNGSI PERBAIKAN: Menyimpan data Agenda tanpa kolom 'kategori' yang belum ada di database
     */
   public function storeAgenda(Request $request)
    {
        // 1. Validasi Input Form (tanggal, nama kegiatan, dan divisi wajib diisi)
        $request->validate([
            'tanggal' => 'required|date',
            'nama_kegiatan' => 'required|string|max:1000',
            'divisi' => 'required|string',
        ]);

        // 2. Generate Nama Hari Otomatis
        $namaHari = Carbon::parse($request->tanggal)->locale('id')->dayName;

        // 3. TRIK PENYELAMAT: Gabungkan Divisi dengan nama kegiatan agar rapi di halaman depan
        // Hasilnya nanti di DB: "[ASDA I (Pemerintahan & Kesejahteraan Rakyat)] - Rapat Koordinasi..."
        $kegiatanLengkap = "[" . $request->divisi . "] " . $request->nama_kegiatan;

        // 4. Simpan ke database menggunakan string gabungan tadi
        DB::table('agendas')->insert([
            'tanggal'       => $request->tanggal,
            'hari'          => $namaHari,
            'nama_kegiatan' => $kegiatanLengkap, // Menyimpan teks yang sudah dibumbui nama divisi
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        // 5. Kembali ke form dengan membawa pesan sukses berwujud alert hijau
        return redirect()->back()->with('success', 'Jadwal agenda berhasil disimpan dan otomatis muncul di halaman publik!');
    }
    /**
     * FUNGSI BARU: Memproses Update Agenda
     */
    public function updateAgenda(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_kegiatan' => 'required|string|max:1000',
            'divisi' => 'required|string',
        ]);

        $namaHari = Carbon::parse($request->tanggal)->locale('id')->dayName;
        $kegiatanLengkap = "[" . $request->divisi . "] " . $request->nama_kegiatan;

        // Update data berdasarkan ID
        DB::table('agendas')->where('id', $id)->update([
            'tanggal'       => $request->tanggal,
            'hari'          => $namaHari,
            'nama_kegiatan' => $kegiatanLengkap,
            'updated_at'    => now(),
        ]);

        return redirect()->back()->with('success', 'Jadwal agenda berhasil diperbarui!');
    }

    /**
     * FUNGSI BARU: Memproses Hapus Agenda
     */
    public function deleteAgenda($id)
    {
        // Hapus data berdasarkan ID
        DB::table('agendas')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Jadwal agenda berhasil dihapus dari sistem!');
    }
}