<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelayananHukumController extends Controller
{
    // ===== ADMIN =====
    public function menu()
    {
        return view('auth.pelayanan-hukum-menu');
    }

    public function edit($jenis)
    {
        $data = DB::table('pelayanan_hukums')->where('jenis', $jenis)->first();
        return view('auth.pelayanan-hukum-edit', compact('data', 'jenis'));
    }

    public function update(Request $request, $jenis)
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
        ]);

        $filePath = null;
        if ($request->hasFile('file_pdf')) {
            $file     = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $folder   = public_path('storage/pelayanan_hukum');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $file->move($folder, $filename);
            $filePath = 'pelayanan_hukum/' . $filename;
        }

        $existing = DB::table('pelayanan_hukums')->where('jenis', $jenis)->first();

        if ($existing) {
            DB::table('pelayanan_hukums')->where('jenis', $jenis)->update([
                'deskripsi'  => $request->deskripsi,
                'file_pdf'   => $filePath ?? $existing->file_pdf,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('pelayanan_hukums')->insert([
                'jenis'      => $jenis,
                'deskripsi'  => $request->deskripsi,
                'file_pdf'   => $filePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.pelayanan-hukum.menu')
            ->with('success', str_replace('_', ' ', strtoupper($jenis)) . ' berhasil diperbarui!');
    }

    // ===== PUBLIK =====
    public function showPublik($jenis)
    {
        $data = DB::table('pelayanan_hukums')->where('jenis', $jenis)->first();
        return view('pages.pelayanan-hukum', compact('data', 'jenis'));
    }
}