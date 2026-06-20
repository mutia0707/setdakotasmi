<?php

namespace App\Http\Controllers;

use App\Models\Renstra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RenstraController extends Controller
{
    public function show() 
    {
        $data = Renstra::first(); 
        return view('pages.renstra', compact('data'));
    }

    public function edit() 
    {
        $data = Renstra::first() ?? new Renstra();
        return view('auth.renstra-edit', compact('data'));
    }

    public function update(Request $request) 
    {
        // Mengambil data yang ada, atau membuat baru jika belum ada
        $data = Renstra::first() ?? new Renstra();
        
        // Sesuaikan dengan nama kolom di database Anda (lihat screenshot tadi)
        $data->deskripsi = $request->deskripsi;
        $data->tujuan_strategis = $request->tujuan_strategis;
        
        // Menangani file PDF
        if ($request->hasFile('file_pdf')) {
            // Hapus file lama jika ada
            if ($data->file_pdf) Storage::disk('public')->delete($data->file_pdf);
            
            // Simpan file baru
            $data->file_pdf = $request->file('file_pdf')->store('dokumen', 'public');
        }
        
        $data->save();
        
        return redirect()->back()->with('success', 'Data Renstra berhasil diperbarui!');
    }
}