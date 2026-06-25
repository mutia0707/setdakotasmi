<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratEdaranController extends Controller
{
    // PUBLIK
public function index()
{
    $data = DB::table('surat_ederans')->orderBy('tanggal', 'desc')->get();
    return view('pages.suratedaran', compact('data'));
}

// ADMIN
public function adminIndex()
{
    $data = DB::table('surat_ederans')->orderBy('tanggal', 'desc')->get();
    return view('auth.surat-edaran-edit', compact('data'));
}

public function store(Request $request)
{
    $request->validate([
        'judul'   => 'required|string|max:255',
        'tanggal' => 'required',
    ]);

    $filename = null;
    if ($request->hasFile('file_pdf')) {
        $file     = $request->file('file_pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $folder   = public_path('storage/surat_edaran');
        if (!file_exists($folder)) mkdir($folder, 0755, true);
        $file->move($folder, $filename);
    }

    DB::table('surat_ederans')->insert([
        'judul'        => $request->judul,
        'nomor_surat'  => $request->nomor_surat,
        'tanggal'      => $request->tanggal,
        'file_pdf'     => $filename,
        'created_at'   => now(),
        'updated_at'   => now(),
    ]);

    return back()->with('success', 'Surat Edaran berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    $existing = DB::table('surat_ederans')->where('id', $id)->first();

    $filename = $existing->file_pdf;
    if ($request->hasFile('file_pdf')) {
        $file     = $request->file('file_pdf');
        $filename = time() . '_' . $file->getClientOriginalName();
        $folder   = public_path('storage/surat_edaran');
        if (!file_exists($folder)) mkdir($folder, 0755, true);
        $file->move($folder, $filename);
    }

    DB::table('surat_ederans')->where('id', $id)->update([
        'judul'        => $request->judul,
        'nomor_surat'  => $request->nomor_surat,
        'tanggal'      => $request->tanggal,
        'file_pdf'     => $filename,
        'updated_at'   => now(),
    ]);

    return back()->with('success', 'Surat Edaran berhasil diperbarui!');
}

public function destroy($id)
{
    $item = DB::table('surat_ederans')->where('id', $id)->first();
    if ($item && $item->file_pdf) {
        $path = public_path('storage/surat_edaran/' . $item->file_pdf);
        if (file_exists($path)) unlink($path);
    }
    DB::table('surat_ederans')->where('id', $id)->delete();
    return back()->with('success', 'Surat Edaran berhasil dihapus!');
}
}