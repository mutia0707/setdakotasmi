<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Tampilkan Halaman Utama Dashboard Admin
     */
    public function index()
    {
        // Ambil data berita untuk ditampilkan di form kelola berita admin
        $beritas = DB::table('beritas')->orderBy('id', 'desc')->get();
        return view('auth.admin', compact('beritas'));
    }

    public function form()
    {
        $beritas = DB::table('beritas')->orderBy('id', 'desc')->get();
        return view('auth.kelola_berita', compact('beritas'));
    }

    /**
     * Menyimpan Berita Baru dari Admin (STORE)
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $namaGambar = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img_berita'), $namaGambar);
        }

        DB::table('beritas')->insert([
            'judul'      => $request->judul,
            'slug'       => Str::slug($request->judul) . '-' . time(),
            'isi_berita' => $request->isi, // Sesuaikan field database kamu (isi atau isi_berita)
            'gambar'     => $namaGambar,
            'tanggal_publish' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Berita Baru Berhasil Ditambahkan!');
    }

    /**
     * Memperbarui Data Berita Termasuk Mengganti Gambar (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = DB::table('beritas')->where('id', $id)->first();
        if (!$berita) {
            return redirect()->back()->with('error', 'Data berita tidak ditemukan.');
        }

        $namaGambarBaru = $berita->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus foto lama jika ada
            if ($berita->gambar) {
                $fotoLama = public_path('img_berita/' . $berita->gambar);
                if (File::exists($fotoLama)) {
                    File::delete($fotoLama);
                }
            }

            $file = $request->file('gambar');
            $namaGambarBaru = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img_berita'), $namaGambarBaru);
        }

        DB::table('beritas')->where('id', $id)->update([
            'judul'      => $request->judul,
            'slug'       => Str::slug($request->judul) . '-' . time(),
            'isi_berita' => $request->isi,
            'gambar'     => $namaGambarBaru,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Konten Berita dan Foto Berhasil Diperbarui!');
    }

    /**
     * Menghapus Berita (DESTROY)
     */
    public function destroy($id)
    {
        $berita = DB::table('beritas')->where('id', $id)->first();
        
        if ($berita) {
            if ($berita->gambar) {
                $foto = public_path('img_berita/' . $berita->gambar);
                if (File::exists($foto)) {
                    File::delete($foto);
                }
            }
            DB::table('beritas')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Berita Berhasil Dihapus!');
        }

        return redirect()->back()->with('error', 'Gagal menghapus berita.');
    }

    /**
     * Proses Ganti Foto Sambutan Beranda
     */
    public function updateSambutan(Request $request)
    {
        $request->validate([
            'gambar_sambutan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_sambutan')) {
            $image = $request->file('gambar_sambutan');
            $destinationPath = public_path('img');
            $fileName = 'sambutan.jpg';

            if (File::exists($destinationPath . '/' . $fileName)) {
                File::delete($destinationPath . '/' . $fileName);
            }

            $image->move($destinationPath, $fileName);
            return redirect()->back()->with('success', 'Foto Sambutan Berhasil Diperbarui!');
        }
        return redirect()->back()->with('error', 'Gagal memproses gambar sambutan.');
    }

    /**
     * Proses Ganti Foto Berita Utama Beranda
     */
    public function updateFotoBeritaUtama(Request $request)
    {
        $request->validate([
            'foto_berita_utama' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_berita_utama')) {
            $image = $request->file('foto_berita_utama');
            $destinationPath = public_path('img');
            $fileName = 'berita_utama.jpg';

            if (File::exists($destinationPath . '/' . $fileName)) {
                File::delete($destinationPath . '/' . $fileName);
            }

            $image->move($destinationPath, $fileName);
            return redirect()->back()->with('success_berita_utama', 'Foto Berita Utama Berhasil Diperbarui!');
        }
        return redirect()->back()->with('error', 'Gagal memproses gambar berita utama.');
    }

    /**
     * Proses Ganti Foto Pejabat Daerah secara Dinamis
     */
    public function updateFotoPejabat(Request $request)
    {
        $request->validate([
            'kode_pejabat' => 'required|string',
            'foto_pejabat' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_pejabat')) {
            $image = $request->file('foto_pejabat');
            $destinationPath = public_path('img/pejabat');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
            
            $fileName = $request->kode_pejabat . '.jpg';
            
            if (File::exists($destinationPath . '/' . $fileName)) {
                File::delete($destinationPath . '/' . $fileName);
            }

            $image->move($destinationPath, $fileName);
            return redirect()->back()->with('success_pejabat', 'Foto Pejabat Berhasil Diperbarui!');
        }
        return redirect()->back()->with('error', 'Gagal memperbarui foto pejabat.');
    }
}