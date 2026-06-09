<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Models\ProfilSetda; // Tambahkan ini agar lebih bersih
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PROFIL SETDA
    |--------------------------------------------------------------------------
    */
    
    // Untuk Pengunjung Publik
    public function showProfilSetda()
    {
        $data = ProfilSetda::first() ?? new ProfilSetda();
        return view('auth.profil-setda', compact('data'));
    }

    // Untuk Admin (Halaman Edit)
    public function editSetda()
    {
        $data = ProfilSetda::first() ?? new ProfilSetda();
        return view('auth.edit-profil-setda', compact('data'));
    }

    public function updateSetda(Request $request)
    {
        ProfilSetda::updateOrCreate(
            ['id' => 1],
            ['isi_profil' => $request->isi_profil]
        );

        return back()->with('success', 'Profil Setda berhasil diperbarui!');
    }

    /*
    |--------------------------------------------------------------------------
    | VISI MISI
    |--------------------------------------------------------------------------
    */

    // Untuk Pengunjung Publik
    public function showVisiMisi()
    {
        $data = VisiMisi::first() ?? new VisiMisi();
        return view('auth.visi-misi', compact('data')); 
    }

    // Untuk Admin (Halaman Edit)
    public function editVisiMisi()
    {
        $data = VisiMisi::first() ?? new VisiMisi();
        return view('auth.edit-visi-misi', compact('data')); 
    }

    public function updateVisiMisi(Request $request)
    {
        VisiMisi::updateOrCreate(
            ['id' => 1],
            ['visi' => $request->visi, 'misi' => $request->misi]
        );

        return back()->with('success', 'Data Visi dan Misi berhasil diperbarui!');
    }
}