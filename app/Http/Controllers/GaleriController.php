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
        return view('pages.photos', compact('fotos')); 
    }

    // Tampilan Halaman Video Publik
    public function indexVideo()
    {
        $videos = Galeri::where('tipe', 'video')->orderBy('id', 'desc')->get();
        return view('pages.video', compact('videos')); 
    }

    // Proses Simpan Data dari Dashboard Admin (UBAH KE FILE VIDEO)
    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:255',
            'tipe'       => 'required|in:foto,video',
            'kategori'   => 'required|in:pelayanan,sosialisasi,agenda',
            'foto_file'  => 'required_if:tipe,foto|nullable|image|mimes:jpeg,png,jpg|max:5120',
            'video_file' => 'required_if:tipe,video|nullable|mimes:mp4,mov,avi,webm|max:51200', // Maksimal 50MB
        ]);

        if ($request->tipe === 'foto') {
            $file = $request->file('foto_file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img_galeri'), $namaFile);
            $sumberData = $namaFile;
        } else {
            // Proses simpan file video mentah asli (.mp4)
            $file = $request->file('video_file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('video_galeri'), $namaFile);
            $sumberData = $namaFile;
        }

        Galeri::create([
            'judul'    => $request->judul,
            'tipe'     => $request->tipe,
            'kategori' => $request->kategori,
            'sumber'   => $sumberData
        ]);

        return redirect()->back()->with('success_galeri', 'Media baru berhasil di-upload ke halaman galeri publik!');
    }

    // Proses Hapus Data Galeri (Hapus File Fisik Video & Foto)
    public function delete($id)
    {
        $media = Galeri::findOrFail($id);
        if ($media->tipe === 'foto') {
            $path = public_path('img_galeri/' . $media->sumber);
            if (File::exists($path)) { File::delete($path); }
        } else {
            $path = public_path('video_galeri/' . $media->sumber);
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

    // Proses Update Data Media
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required',
            'kategori' => 'required',
        ]);

        $galeri = Galeri::findOrFail($id);
        $sumberMedia = $galeri->sumber; 

        if ($request->tipe === 'foto') {
            if ($request->hasFile('foto_file')) {
                // Hapus berkas foto lama
                if ($galeri->tipe === 'foto' && file_exists(public_path('img_galeri/' . $galeri->sumber))) {
                    @unlink(public_path('img_galeri/' . $galeri->sumber));
                }
                $file = $request->file('foto_file');
                $sumberMedia = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('img_galeri'), $sumberMedia);
            }
        } else {
            // Jika admin mengganti atau mengunggah file video baru
            if ($request->hasFile('video_file')) {
                // Hapus berkas video lama jika sebelumnya tipe datanya memang video
                if ($galeri->tipe === 'video' && file_exists(public_path('video_galeri/' . $galeri->sumber))) {
                    @unlink(public_path('video_galeri/' . $galeri->sumber));
                }
                $file = $request->file('video_file');
                $sumberMedia = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('video_galeri'), $sumberMedia);
            }
        }

        $galeri->update([
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'sumber' => $sumberMedia,
        ]);

        return redirect()->back()->with('success_galeri', 'Data media galeri berhasil diperbarui!');
    }
}