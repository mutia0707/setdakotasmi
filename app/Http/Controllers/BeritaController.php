<?php

namespace App\Http\Controllers;

use App\Models\Berita; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class BeritaController extends Controller
{
    // 1. Fungsi Menampilkan Semua Berita
    public function index() {
        $beritas = Berita::all();
        return view('pages.berita', compact('beritas')); 
    }

    // 2. Fungsi Menyimpan Berita Baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'isi'    => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        
        // PERBAIKAN: Memaksa file langsung masuk ke folder public depan (Anti-Gagal di Laragon)
        $gambar->move(public_path('img_berita'), $nama_gambar);

        Berita::create([
            'judul'           => $request->judul,
            'slug'            => Str::slug($request->judul), 
            'isi_berita'      => $request->isi,               
            'gambar'          => $nama_gambar,                
            'tanggal_publish' => now(),                       
        ]);

        return redirect()->back()->with('success', 'Berita hari ini sukses ter-upload!');
    }

    // 3. Fungsi Menampilkan Detail Berita (DIPERBAIKI AGAR TIDAK ERROR COUNT NULL)
    public function show($id)
    {
        // 1. Kita tetep ambil semua berita biar fungsi count($beritas) di blade gak error
        $beritas = Berita::all();

        // 2. Kita ambil data berita spesifik yang diklik buat detailnya
        $beritaDetail = Berita::where('id', $id)->firstOrFail();
        
        // Kirim kedua variabelnya ke view pages.berita
        return view('pages.berita', compact('beritas', 'beritaDetail')); 
    }
}