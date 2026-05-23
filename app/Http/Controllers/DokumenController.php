<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DokumenController extends Controller
{
    // 1. Digunakan oleh rute: /informasi/dokumen-unduhan
    public function index() {
        $dokumens = Dokumen::all();
        return view('dokumen-unduhan', compact('dokumens'));
    }

    // 2. Digunakan oleh rute: /admin/dokumen
    // INI YANG TADI MEMBUAT ERROR, SEKARANG SUDAH DITAMBAHKAN
    public function adminIndex() {
        $dokumens = Dokumen::all();
        return view('.auth.admin_dokumen', compact('dokumens'));
    }

    // 3. Proses Upload (Dipanggil oleh form admin)
    public function store(Request $request) {
        $request->validate(['file_pdf' => 'required|mimes:pdf|max:10000p']);
        
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

    // 4. Proses Hapus (Dipanggil oleh tombol hapus di admin)
    public function destroy($id) {
        $doc = Dokumen::findOrFail($id);
        $path = public_path('berkas_dokumen/' . $doc->file_pdf);
        
        if (File::exists($path)) {
            File::delete($path);
        }
        
        $doc->delete();
        return back()->with('success', 'Dokumen dihapus!');
    }
}