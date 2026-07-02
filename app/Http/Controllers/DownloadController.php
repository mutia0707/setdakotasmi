<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller {

    // Tampilan Publik
public function indexPublik()
{
    // Mengambil data dari tabel
    $files = \Illuminate\Support\Facades\DB::table('downloads')->latest()->get();
    
    // Mengirim data $files ke file view yang benar
    return view('pages.download', compact('files'));
}

    // Tampilan Admin
    public function indexAdmin() {
        $files = DB::table('downloads')->latest()->get();
        return view('auth.download_edit', compact('files'));
    }

    // Fungsi Upload
    public function store(Request $request) {
        $path = $request->file('file')->store('dokumen', 'public');
        DB::table('downloads')->insert([
            'judul' => $request->judul,
            'file_path' => $path, // Pastikan kolom di DB bernama 'file_path'
            'created_at' => now()
        ]);
        return back()->with('success', 'File berhasil diupload!');
    }

public function destroy($id) 
{
    $file = DB::table('downloads')->find($id);
    
    if ($file) {
        // Hapus file dari folder storage
        Storage::disk('public')->delete($file->file_path);
        
        // Hapus record dari database
        DB::table('downloads')->where('id', $id)->delete();
    }
    
    return back()->with('success', 'Dokumen berhasil dihapus!');
}
}