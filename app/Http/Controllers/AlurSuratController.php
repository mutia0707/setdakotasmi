<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlurSuratController extends Controller
{
    public function edit()
    {
        $data = DB::table('bagian_umum')->where('jenis', 'alursurat')->first();
        return view('auth.alursurat-edit', compact('data'));
    }

    public function update(Request $request)
    {
        $filePath = null;

        try {
            if (isset($_FILES['file_pdf']) && $_FILES['file_pdf']['error'] === 0) {
                $fileName = time() . '_' . $_FILES['file_pdf']['name'];
                $destination = public_path('uploads/bagian_umum');

                if (!file_exists($destination)) {
                    mkdir($destination, 0755, true);
                }

                move_uploaded_file($_FILES['file_pdf']['tmp_name'], $destination . '/' . $fileName);
                $filePath = 'uploads/bagian_umum/' . $fileName;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Upload gagal: ' . $e->getMessage());
        }

        $existing = DB::table('bagian_umum')->where('jenis', 'alursurat')->first();

        if ($existing) {
            DB::table('bagian_umum')->where('jenis', 'alursurat')->update([
                'file_pdf'   => $filePath ?? $existing->file_pdf,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('bagian_umum')->insert([
                'jenis'      => 'alursurat',
                'file_pdf'   => $filePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.alursurat.edit')->with('success', 'File PDF berhasil diupload!');
    }

    public function show()
    {
        $data = DB::table('bagian_umum')->where('jenis', 'alursurat')->first();
        return view('pages.alursurat', compact('data'));
    }
}