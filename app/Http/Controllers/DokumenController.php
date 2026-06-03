<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DokumenController extends Controller
{
    // 1. HALAMAN PUBLIK (Masyarakat umum - Tanpa Login)
    public function index(Request $request) {
        // Jika ada filter bagian di halaman publik (misal: ?bagian=humas)
        if ($request->has('bagian')) {
            $dokumens = Dokumen::where('bagian', $request->bagian)->orderBy('id', 'desc')->get();
        } else {
            $dokumens = Dokumen::orderBy('id', 'desc')->get();
        }
        
        // PERBAIKAN: Diarahkan ke file download yang ada di dalam folder pages
        return view('pages.download', compact('dokumens'));
    }

    // 2. HALAMAN ADMIN (Untuk Kelola Dokumen di Dashboard Admin)
    public function adminIndex(Request $request) {
        // Biar yang muncul di tabel bawah hanya sesuai menu bagian yang diklik (misal: Humas saja)
        if ($request->has('bagian')) {
            $dokumens = Dokumen::where('bagian', $request->bagian)->orderBy('id', 'desc')->get();
        } else {
            $dokumens = Dokumen::orderBy('id', 'desc')->get();
        }
        
        return view('auth.admin_dokumen', compact('dokumens'));
    }

    // 3. Proses Upload (Dipanggil oleh form admin)
    public function store(Request $request) {
        $request->validate(['file_pdf' => 'required|mimes:pdf|max:10000']);
        
        $file = $request->file('file_pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('berkas_dokumen'), $filename);
        
        Dokumen::create([
            'judul' => $request->judul,
            'bagian' => $request->bagian,
            'file_pdf' => $filename
        ]);
        
        return back()->with('success', 'Dokumen berhasil diupload!');
    }

    // 4. Proses Update / Edit Data (BARU: Untuk memproses form Modal Edit)
    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'bagian' => 'required|string'
        ]);

        $doc = Dokumen::findOrFail($id);
        $doc->update([
            'judul' => $request->judul,
            'bagian' => $request->bagian
        ]);

        return back()->with('success', 'Data dokumen berhasil diperbarui!');
    }

    // 5. Proses Hapus
    public function destroy($id) {
        $doc = Dokumen::findOrFail($id);
        $path = public_path('berkas_dokumen/' . $doc->file_pdf);
        
        if (File::exists($path)) {
            File::delete($path);
        }
        
        $doc->delete();
        return back()->with('success', 'Dokumen berhasil dihapus!');
    }

    // Taruh fungsi ini di dalam DokumenController.php
public function humasPublik() {
    // Otomatis mengunci dan hanya mengambil dokumen yang bagiannya 'humas'
    $dokumens = Dokumen::where('bagian', 'humas')->orderBy('id', 'desc')->get();
    
    // Melempar data ke file tampilan khusus humas.blade.php
    return view('pages.humas', compact('dokumens'));
}
}