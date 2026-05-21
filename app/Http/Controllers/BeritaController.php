<?php

namespace App\Http\Controllers;

use App\Models\Berita; 
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File; // Wajib diimport untuk menghapus file foto lama

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

    // 3. Fungsi Menampilkan Detail Berita
    public function show($id)
    {
        $beritas = Berita::all();
        $beritaDetail = Berita::where('id', $id)->firstOrFail();
        return view('pages.berita', compact('beritas', 'beritaDetail')); 
    }

    /**
     * FUNGSI BARU 1: Memproses Update Berita & Foto (Jika Diubah)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Boleh kosong kalau gak mau ganti foto
        ]);

        $berita = Berita::findOrFail($id);

        // Ambil data inputan teks biasa
        $berita->judul      = $request->judul;
        $berita->slug       = Str::slug($request->judul);
        $berita->isi_berita = $request->isi;

        // Logika jika admin mengupload gambar baru untuk mengganti gambar lama
        if ($request->hasFile('gambar')) {
            
            // Hapus gambar lama dari folder public/img_berita agar hemat storage
            $pathGambarLama = public_path('img_berita/' . $berita->gambar);
            if (File::exists($pathGambarLama)) {
                File::delete($pathGambarLama);
            }

            // Upload gambar yang baru
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('img_berita'), $nama_gambar);
            
            // Simpan nama gambar baru ke database
            $berita->gambar = $nama_gambar;
        }

        $berita->save(); // Simpan perubahan

        return redirect()->back()->with('success', 'Berita Berhasil Diperbarui!');
    }

    /**
     * FUNGSI BARU 2: Memproses Hapus Berita Sekaligus File Fotonya
     */
    public function delete($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambarnya yang ada di folder public/img_berita
        $pathGambar = public_path('img_berita/' . $berita->gambar);
        if (File::exists($pathGambar)) {
            File::delete($pathGambar);
        }

        // Hapus data baris dari database
        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus secara permanen dari sistem!');
    }

    /**
     * Fungsi Menampilkan Galeri Foto Publik
     */
    public function galeriFoto()
    {
        // Mengambil semua data berita yang memiliki gambar
        $fotos = Berita::orderBy('id', 'desc')->get();
        return view('pages.galeri_foto', compact('fotos'));
    }

    /**
     * Fungsi Menampilkan Galeri Video Publik
     */
    public function galeriVideo()
    {
        // Mengambil semua data berita
        $beritas = Berita::orderBy('id', 'desc')->get();
        $videos = [];

        foreach ($beritas as $berita) {
            // Otomatis mencari apakah ada link YouTube di dalam isi berita
            // Contoh link: https://www.youtube.com/watch?v=xxxx atau https://youtu.be/xxxx
            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $berita->isi_berita, $match);
            
            if (!empty($match[1])) {
                $videos[] = [
                    'judul' => $berita->judul,
                    'video_id' => $match[1],
                    'tanggal' => $berita->tanggal_publish
                ];
            }
        }

        return view('pages.galeri_video', compact('videos'));
    }

    public function adminBerita()
{
    $beritas = \Illuminate\Support\Facades\DB::table('beritas')->orderBy('id', 'desc')->get();
    return view('auth.admin_berita', compact('beritas'));
}
}