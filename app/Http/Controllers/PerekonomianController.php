<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerekonomianController extends Controller
{
    public function show($slug)
{
    // Mengambil data berdasarkan slug (misal: 'bumd', 'tpid', 'tp2d', 'umkm')
    $data = \Illuminate\Support\Facades\DB::table('perekonomian')
            ->where('slug', $slug)
            ->first();

    // Jika data tidak ditemukan, beri judul default agar tidak error
    $judul = strtoupper($slug); 

    return view('pages.perekonomian', compact('data', 'slug', 'judul'));
}
    // Tambahkan method ini agar error hilang
   public function index()
{
    // Mengarah ke resources/views/auth/perekonomian_index.blade.php
    return view('auth.perekonomian_index'); 
}

public function edit($slug)
{
    $data = DB::table('perekonomian')->where('slug', $slug)->first();
    // Mengarah ke resources/views/auth/perekonomian_edit.blade.php
    return view('auth.perekonomian_edit', compact('data', 'slug'));
}

    public function update(Request $request, $slug)
    {
        $updateData = ['konten' => $request->konten, 'updated_at' => now()];

        if ($request->hasFile('file_pdf')) {
            $updateData['file_pdf'] = $request->file('file_pdf')->store('perekonomian', 'public');
        }

        DB::table('perekonomian')->updateOrInsert(['slug' => $slug], $updateData);
        return back()->with('success', 'Data berhasil diperbarui!');
    }
}