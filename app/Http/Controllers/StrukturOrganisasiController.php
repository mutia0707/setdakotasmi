<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
public function show() {
    $data = StrukturOrganisasi::first();
    // Pastikan ini sesuai dengan folder dan nama file Anda
    return view('pages.struktur', compact('data'));
}
    public function edit() {
        $data = StrukturOrganisasi::first() ?? new StrukturOrganisasi();
        return view('auth.struktur-edit', compact('data'));
    }

    public function update(Request $request) {
        $data = StrukturOrganisasi::first() ?? new StrukturOrganisasi();
        $data->keterangan = $request->keterangan;

        if ($request->hasFile('gambar')) {
            if ($data->gambar_struktur) Storage::disk('public')->delete($data->gambar_struktur);
            $data->gambar_struktur = $request->file('gambar')->store('struktur', 'public');
        }

        $data->save();
        return redirect()->back()->with('success', 'Struktur berhasil diperbarui!');
    }
}