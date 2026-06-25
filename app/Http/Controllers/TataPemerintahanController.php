<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TataPemerintahanController extends Controller {

public function show($slug) 
{
    // 1. Ambil data dari database berdasarkan slug yang diklik
    $data = DB::table('konten_web')->where('slug', $slug)->first();

    // 2. Kirim $data ke view
    return view('pages.tatapemerintahan', compact('data'));
}

    public function index() 
    { 
        // Sesuaikan dengan nama file di folder auth Anda
        // Jika nama filenya 'tata_pemerintahan_index.blade.php', maka:
        return view('auth.tatapemerintahan_index'); 
    }

public function edit($slug) 
{
    $data = DB::table('konten_web')->where('slug', $slug)->first();

    // Jika data null, buat objek kosong agar tidak error
    if (!$data) {
        $data = (object) [
            'slug' => $slug,
            'judul' => '',
            'konten' => '',
            'gambar' => null
        ];
    }

    return view('auth.tatapemerintahan_edit', compact('data', 'slug'));
}

    public function update(Request $request, $slug) {
        $data = [
            'kategori' => 'tata-pemerintahan',
            'judul' => $request->judul,
            'konten' => $request->konten,
        ];
        if ($request->hasFile('gambar')) $data['gambar'] = $request->file('gambar')->store('dokumentasi', 'public');
        if ($request->hasFile('file_pdf')) $data['file_pdf'] = $request->file('file_pdf')->store('pdfs', 'public');

        DB::table('konten_web')->updateOrInsert(['slug' => $slug], $data);
        return back()->with('success', 'Data berhasil diperbarui!');
    }
}