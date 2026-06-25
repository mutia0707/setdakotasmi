<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenghargaanController extends Controller
{
    // PUBLIK
    public function index()
    {
        $data = DB::table('penghargaans')->orderBy('tahun', 'desc')->get();
        return view('pages.penghargaan', compact('data'));
    }

    // ADMIN
    public function adminIndex()
    {
        $data = DB::table('penghargaans')->orderBy('tahun', 'desc')->get();
        return view('auth.penghargaan', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'tahun' => 'required|string|max:10',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $folder   = public_path('img/penghargaan');
            if (!file_exists($folder)) mkdir($folder, 0755, true);
            $file->move($folder, $filename);
        }

        DB::table('penghargaans')->insert([
            'nama'       => $request->nama,
            'tahun'      => $request->tahun,
            'foto'       => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Penghargaan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $existing = DB::table('penghargaans')->where('id', $id)->first();

        $filename = $existing->foto;
        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $folder   = public_path('img/penghargaan');
            if (!file_exists($folder)) mkdir($folder, 0755, true);
            $file->move($folder, $filename);
        }

        DB::table('penghargaans')->where('id', $id)->update([
            'nama'       => $request->nama,
            'tahun'      => $request->tahun,
            'foto'       => $filename,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Penghargaan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = DB::table('penghargaans')->where('id', $id)->first();
        if ($item && $item->foto) {
            $path = public_path('img/penghargaan/' . $item->foto);
            if (file_exists($path)) unlink($path);
        }
        DB::table('penghargaans')->where('id', $id)->delete();
        return back()->with('success', 'Penghargaan berhasil dihapus!');
    }
}