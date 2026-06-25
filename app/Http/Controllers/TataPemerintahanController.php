<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TataPemerintahanController extends Controller
{
    public function show($slug)
    {
        $data = DB::table('tata_pemerintahan')->where('slug', $slug)->first();
        $judul = strtoupper($slug);
        return view('pages.tatapemerintahan', compact('data', 'slug', 'judul'));
    }

    public function index()
    {
        return view('auth.tatapemerintahan_index');
    }

    public function edit($slug)
    {
        $data = DB::table('tata_pemerintahan')->where('slug', $slug)->first();
        return view('auth.tatapemerintahan_edit', compact('data', 'slug'));
    }

   public function update(Request $request, $slug)
{
    $updateData = [
        'judul'      => strtoupper(str_replace('-', ' ', $slug)),
        'konten'     => $request->konten,
        'updated_at' => now(),
    ];

    // Upload PDF
    try {
        if (!empty($_FILES['file_pdf']['tmp_name']) && is_uploaded_file($_FILES['file_pdf']['tmp_name'])) {
            $fileName = time() . '_' . basename($_FILES['file_pdf']['name']);
            $destination = public_path('uploads/tata_pemerintahan');
            if (!file_exists($destination)) mkdir($destination, 0755, true);
            if (move_uploaded_file($_FILES['file_pdf']['tmp_name'], $destination . '/' . $fileName)) {
                $updateData['file_pdf'] = 'uploads/tata_pemerintahan/' . $fileName;
            }
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Upload PDF gagal: ' . $e->getMessage());
    }

    // Upload Gambar
    try {
        if (!empty($_FILES['gambar']['tmp_name']) && is_uploaded_file($_FILES['gambar']['tmp_name'])) {
            $fileName = time() . '_' . basename($_FILES['gambar']['name']);
            $destination = public_path('uploads/tata_pemerintahan');
            if (!file_exists($destination)) mkdir($destination, 0755, true);
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $destination . '/' . $fileName)) {
                $updateData['gambar'] = 'uploads/tata_pemerintahan/' . $fileName;
            }
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Upload gambar gagal: ' . $e->getMessage());
    }

    DB::table('tata_pemerintahan')->updateOrInsert(['slug' => $slug], $updateData);
    return back()->with('success', 'Data berhasil diperbarui!');
}
}