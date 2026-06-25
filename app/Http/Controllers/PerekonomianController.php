<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerekonomianController extends Controller
{
   public function show($slug)
{
    $data = DB::table('perekonomian')->where('slug', $slug)->first();
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
    $judul = strtoupper($slug);
    $updateData = [
        'judul'      => $judul,
        'konten'     => $request->konten,
        'updated_at' => now(),
    ];

    try {
        if (!empty($_FILES['file_pdf']['tmp_name']) && is_uploaded_file($_FILES['file_pdf']['tmp_name'])) {
            $fileName = time() . '_' . basename($_FILES['file_pdf']['name']);
            $destination = public_path('uploads/perekonomian');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            if (move_uploaded_file($_FILES['file_pdf']['tmp_name'], $destination . '/' . $fileName)) {
                $updateData['file_pdf'] = 'uploads/perekonomian/' . $fileName;
            }
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Upload gagal: ' . $e->getMessage());
    }

    DB::table('perekonomian')->updateOrInsert(['slug' => $slug], $updateData);
    return back()->with('success', 'Data berhasil diperbarui!');
}
}