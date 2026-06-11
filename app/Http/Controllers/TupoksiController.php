<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TupoksiController extends Controller
{
        // Tambahkan fungsi ini di TupoksiController
public function showTupoksiPublik()
{
    // Mengambil data berdasarkan ID 1 secara spesifik
    $data = \Illuminate\Support\Facades\DB::table('tupoksis')->where('id', 1)->first();
    
    return view('auth.tupoksi', compact('data'));
}
    // Halaman Edit (Admin)
    public function editTupoksi()
    {
        $data = DB::table('tupoksis')->first();
        return view('auth.tupoksi-edit', compact('data'));
    }

    // Proses Simpan/Update
public function updateTupoksi(Request $request)
{
    // Bersihkan data dari spasi sampah
    $konten = trim($request->tupoksi);

    // Langsung update atau insert ke ID 1
    \Illuminate\Support\Facades\DB::table('tupoksis')->updateOrInsert(
        ['id' => 1], // Kondisi (Cari ID 1)
        ['tupoksi' => $konten] // Data yang diupdate
    );

    return redirect()->route('admin.tupoksi.edit')->with('success', 'Tupoksi berhasil diperbarui!');
}
}