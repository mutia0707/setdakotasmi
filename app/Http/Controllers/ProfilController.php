<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use App\Models\ProfilSetda;
use App\Models\Tupoksi; // Tambahkan ini di atas
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PROFIL SETDA
    |--------------------------------------------------------------------------
    */
    public function showProfilSetda()
    {
        $data = ProfilSetda::first() ?? new ProfilSetda();
        return view('auth.profil-setda', compact('data'));
    }

    public function editSetda()
    {
        $data = ProfilSetda::first() ?? new ProfilSetda();
        return view('auth.edit-profil-setda', compact('data'));
    }

    public function updateSetda(Request $request)
    {
        $request->validate(['isi_profil' => 'required|string']);
        ProfilSetda::updateOrCreate(['id' => 1], ['isi_profil' => $request->isi_profil]);
        return back()->with('success', 'Profil Setda berhasil diperbarui!');
    }

    /*
    |--------------------------------------------------------------------------
    | VISI MISI
    |--------------------------------------------------------------------------
    */
    public function showVisiMisi()
    {
        $data = VisiMisi::first() ?? new VisiMisi();
        return view('auth.visi-misi', compact('data')); 
    }

    public function editVisiMisi()
    {
        $data = VisiMisi::first() ?? new VisiMisi();
        return view('auth.edit-visi-misi', compact('data')); 
    }

    public function updateVisiMisi(Request $request)
    {
        $request->validate(['visi' => 'required|string', 'misi' => 'required|string']);
        VisiMisi::updateOrCreate(['id' => 1], ['visi' => $request->visi, 'misi' => $request->misi]);
        return back()->with('success', 'Data Visi dan Misi berhasil diperbarui!');
    }
}