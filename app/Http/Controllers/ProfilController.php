<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // 1. Fungsi untuk menampilkan halaman (untuk admin dan publik)
    public function showVisiMisi()
    {
        $data = VisiMisi::first();
        return view('auth.visi-misi', compact('data'));
    }

    // 2. Fungsi untuk proses simpan (Ini yang sering salah tulis)
    public function updateVisiMisi(Request $request)
    {
        VisiMisi::updateOrCreate(
            ['id' => 1],
            ['visi' => $request->visi, 'misi' => $request->misi]
        );

        return back()->with('success', 'Data berhasil disimpan!');
    }

    // 3. Tambahkan fungsi ini jika rute Anda memang memanggil editVisiMisi
    public function editVisiMisi()
    {
        $data = VisiMisi::first();
        return view('auth.visi-misi', compact('data'));
    }
}