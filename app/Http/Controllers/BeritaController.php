<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    /**
     * Tampilkan List Berita Kota di Halaman Depan (Sisi Publik)
     * URL: /berita-kota
     */
    public function index()
{
    $beritas = DB::table('beritas')->orderBy('id', 'desc')->paginate(9);
    return view('berita.berita', compact('beritas')); // <--- Tanpa kata 'pages.'
}
    /**
     * Tampilkan Detail Single Berita Kota (Sisi Publik)
     * URL: /berita-kota/{slug}
     */
    public function show($slug)
    {
        $berita = DB::table('beritas')->where('slug', $slug)->first();
        
        if (!$berita) { 
            abort(404); 
        }
        
        return view('pages.berita-detail', compact('berita'));
    }

    /**
     * Tampilkan Galeri Foto Publik
     * URL: /galeri-foto
     */
    public function galeriFoto()
    {
        return view('pages.galeri-foto');
    }

    /**
     * Tampilkan Galeri Video Publik
     * URL: /galeri-video
     */
    public function galeriVideo()
    {
        return view('pages.galeri-video');
    }
}