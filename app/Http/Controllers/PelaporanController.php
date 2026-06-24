<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaporanController extends Controller
{
    // ===== ADMIN =====
    public function menuPelaporan()
    {
        return view('auth.pelaporan-menu');
    }

    public function edit($jenis)
    {
        $data = DB::table('pelaporans')->where('jenis', $jenis)->first();
        return view('auth.pelaporan-edit', compact('data', 'jenis'));
    }

    public function update(Request $request, $jenis)
    {
        $existing = DB::table('pelaporans')->where('jenis', $jenis)->first();

        if ($existing) {
            DB::table('pelaporans')->where('jenis', $jenis)->update([
                'konten'     => $request->konten,
                'updated_at' => now(),
            ]);
        } else {
            DB::table('pelaporans')->insert([
                'jenis'      => $jenis,
                'konten'     => $request->konten,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.pelaporan.menu')->with('success', strtoupper($jenis) . ' berhasil diperbarui!');
    }

    // ===== PUBLIK =====
    public function showPublik($jenis)
    {
        $data = DB::table('pelaporans')->where('jenis', $jenis)->first();
        return view('pages.pelaporan', compact('data', 'jenis'));
    }
}