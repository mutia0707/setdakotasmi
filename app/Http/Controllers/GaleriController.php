<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    // Tampilan Halaman Foto Publik
    public function indexFoto()
    {
        $fotos = Galeri::where('tipe', 'foto')->orderBy('id', 'desc')->get();
        return view('pages.galeri_foto', compact('fotos')); // Sesuaikan jika nama filemu berbeda
    }

    // Tampilan Halaman Video Publik
    public function indexVideo()
    {
        $videos = Galeri::where('tipe', 'video')->orderBy('id', 'desc')->get();
        return view('pages.galeri_video', compact('videos')); // Sesuaikan jika nama filemu berbeda
    }

    // Proses Simpan Data dari Dashboard Admin
    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'tipe'     => 'required|in:foto,video',
            'kategori' => 'required|in:pelayanan,sosialisasi,agenda',
            'foto_file'=> 'required_if:tipe,foto|image|mimes:jpeg,png,jpg|max:3072',
            'video_url'=> 'required_if:tipe,video|nullable|string',
        ]);

        if ($request->tipe === 'foto') {
            $file = $request->file('foto_file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img_galeri'), $namaFile);
            $sumberData = $namaFile;
        } else {
            // Otomatis membedah link YouTube panjang/pendek untuk mendapatkan Video ID uniknya saja
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $request->video_url, $match);
            $sumberData = !empty($match[1]) ? $match[1] : 'dQw4w9WgXcQ'; // default jika link tidak valid
        }

        Galeri::create([
            'judul'    => $request->judul,
            'tipe'     => $request->tipe,
            'kategori' => $request->kategori,
            'sumber'   => $sumberData
        ]);

        return redirect()->back()->with('success_galeri', 'Media baru berhasil ditambahkan ke halaman galeri publik!');
    }

    // Proses Hapus Data Galeri
    public function delete($id)
    {
        $media = Galeri::findOrFail($id);
        if ($media->tipe === 'foto') {
            $path = public_path('img_galeri/' . $media->sumber);
            if (File::exists($path)) { File::delete($path); }
        }
        $media->delete();
        return redirect()->back()->with('success_galeri', 'Media berhasil dihapus!');
    }

    // Fungsi menampilkan halaman kelola galeri khusus internal admin
    public function adminGaleri()
    {
        $galeris = Galeri::orderBy('id', 'desc')->get();
        return view('auth.admin_galeri', compact('galeris'));
    }

    public function update(Request $request, $id)
{
    // Validasi input data sederhana
    $request->validate([
        'judul' => 'required',
        'tipe' => 'required',
        'kategori' => 'required',
    ]);

    // Cari data galeri berdasarkan ID yang mau di-edit
    $galeri = \App\Models\Galeri::findOrFail($id);

    $sumberMedia = $galeri->sumber; // Ambil nilai file/link bawaan lama terlebih dahulu

    if ($request->tipe === 'foto') {
        // Jika admin mengunggah berkas foto baru
        if ($request->hasFile('foto_file')) {
            // Hapus foto lama di direktori lokal jika ada berkasnya
            if ($galeri->tipe === 'foto' && file_exists(public_path('img_galeri/' . $galeri->sumber))) {
                @unlink(public_path('img_galeri/' . $galeri->sumber));
            }
            
            // Proses simpan berkas foto baru
            $file = $request->file('foto_file');
            $sumberMedia = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img_galeri'), $sumberMedia);
        }
    } else {
        // Jika tipe beralih ke video, simpan link inputan URL YouTube-nya
        $sumberMedia = $request->video_url;
    }

    // Update baris kolom data di database
    $galeri->update([
        'judul' => $request->judul,
        'tipe' => $request->tipe,
        'kategori' => $request->kategori,
        'sumber' => $sumberMedia,
    ]);

    return redirect()->back()->with('success_galeri', 'Data media galeri berhasil diperbarui!');
}
}