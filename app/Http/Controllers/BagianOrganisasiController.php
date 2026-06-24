<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BagianOrganisasiController extends Controller
{
    public function menu()
    {
        return view('auth.bagian-organisasi-menu');
    }

    public function edit($jenis)
    {
        $data = DB::table('bagian_organisasi')->where('jenis', $jenis)->first();
        return view('auth.bagian-organisasi-edit', compact('data', 'jenis'));
    }

   public function update(Request $request, $jenis)
{
    $filePath = null;

    try {
        if ($request->hasFile('file_pdf')) {

            $file = $request->file('file_pdf');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $destination = public_path('uploads/bagian_organisasi');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $fileName);

            $filePath = 'uploads/bagian_organisasi/' . $fileName;
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Upload gagal: ' . $e->getMessage());
    }

    $existing = DB::table('bagian_organisasi')->where('jenis', $jenis)->first();

    if ($existing) {
        DB::table('bagian_organisasi')->where('jenis', $jenis)->update([
            'deskripsi'  => $request->deskripsi,
            'file_pdf'   => $filePath ?? $existing->file_pdf,
            'updated_at' => now(),
        ]);
    } else {
        DB::table('bagian_organisasi')->insert([
            'jenis'      => $jenis,
            'deskripsi'  => $request->deskripsi,
            'file_pdf'   => $filePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return redirect()->route('admin.bagian-organisasi.edit', $jenis)
        ->with('success', 'Data berhasil diperbarui!');
}

    public function show($jenis)
    {
        $data = DB::table('bagian_organisasi')->where('jenis', $jenis)->first();
        $judul = [
            'spbe'        => 'Layanan SPBE',
            'rb'          => 'Reformasi Birokrasi',
            'kelembagaan' => 'Kelembagaan',
        ];
        $title = $judul[$jenis] ?? strtoupper($jenis);
        return view('pages.bagian-organisasi', compact('data', 'jenis', 'title'));
    }
}