<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index() 
    {
        // Proteksi: Hanya bagian_pelayanan yang boleh kelola berita
        if (auth()->user()->role !== 'bagian_pelayanan') {
            return redirect('/staff/agenda')->with('error', 'Akses tidak diizinkan.');
        }

        $beritas = Berita::where('bagian', auth()->user()->bagian)->latest()->get();
        return view('staff.berita.index', compact('beritas'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'judul' => 'required', 
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->slug = Str::slug($request->judul);
        $berita->bagian = auth()->user()->bagian;

        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->save();
        return redirect()->route('staff.berita.index')->with('success', 'Berita berhasil diupload!');
    }

    public function destroy($id) 
    {
        $berita = Berita::findOrFail($id);
        
        // Cek kepemilikan (hanya boleh hapus miliknya sendiri)
        if ($berita->bagian !== auth()->user()->bagian) abort(403);

        if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
        $berita->delete();
        
        return back()->with('success', 'Berita berhasil dihapus!');
    }
}