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
    public function dashboardView()
    {
        $beritas = DB::table('beritas')->orderBy('id', 'desc')->get();
        return view('auth.admin', compact('beritas'));
    }

    // Alias untuk dashboard agar konsisten
    public function index()
    {
        return $this->dashboardView();
    }

    /**
     * Kelola Berita
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
            'judul'           => $request->judul,
            'slug'            => Str::slug($request->judul) . '-' . time(),
            'isi_berita'      => $request->isi,
            'gambar'          => $namaGambar,
            'tanggal_publish' => now(),
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return redirect()->back()->with('success', 'Berita Baru Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = DB::table('beritas')->where('id', $id)->first();
        if (!$berita) return redirect()->back()->with('error', 'Data berita tidak ditemukan.');

        $namaGambarBaru = $berita->gambar;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && File::exists(public_path('img_berita/' . $berita->gambar))) {
                File::delete(public_path('img_berita/' . $berita->gambar));
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

        return redirect()->back()->with('success', 'Berita Berhasil Diperbarui!');
    }

    public function destroy($id)
    {
        $berita = DB::table('beritas')->where('id', $id)->first();
        if ($berita) {
            if ($berita->gambar && File::exists(public_path('img_berita/' . $berita->gambar))) {
                File::delete(public_path('img_berita/' . $berita->gambar));
            }
            DB::table('beritas')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Berita Berhasil Dihapus!');
        }
        return redirect()->back()->with('error', 'Gagal menghapus berita.');
    }

    /**
     * Update Foto Statis (Sambutan, Berita Utama, Pejabat)
     */
    public function updateSambutan(Request $request)
    {
        $request->validate(['gambar_sambutan' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
        $request->file('gambar_sambutan')->move(public_path('img'), 'sambutan.jpg');
        return redirect()->back()->with('success', 'Foto Sambutan Berhasil Diperbarui!');
    }

    public function updateFotoBeritaUtama(Request $request)
    {
        $request->validate(['foto_berita_utama' => 'required|image|mimes:jpeg,png,jpg|max:2048']);
        $request->file('foto_berita_utama')->move(public_path('img'), 'berita_utama.jpg');
        return redirect()->back()->with('success', 'Foto Berita Utama Berhasil Diperbarui!');
    }

    public function updateFotoPejabat(Request $request)
    {
        $request->validate([
            'kode_pejabat' => 'required|string',
            'foto_pejabat' => 're/quired|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $request->file('foto_pejabat')->move(public_path('img/pejabat'), $request->kode_pejabat . '.jpg');
        return redirect()->back()->with('success', 'Foto Pejabat Berhasil Diperbarui!');
    }
}