<?php

namespace App\Http\Controllers;

use App\Models\Asisten;
use Illuminate\Http\Request;

class AsistenController extends Controller
{
    // Fungsi untuk Publik (Halaman ASDA 1, 2, 3)
    public function show($kode) 
    {
        // Ambil data berdasarkan kode (asda1, asda2, asda3)
        $data = Asisten::where('kode_asisten', $kode)->first();
        
        // Sesuaikan dengan nama folder/file view Anda (misal: pages.asda1)
        // Kita gunakan view berdasarkan kode agar dinamis
        return view('pages.' . $kode, compact('data')); 
    }

    // Fungsi untuk Admin (Form Edit)
    public function edit($kode) 
    {
        $data = Asisten::where('kode_asisten', $kode)->first() ?? new Asisten();
        return view('auth.asisten-edit', compact('data', 'kode'));
    }

    // Fungsi Update
    public function update(Request $request, $kode) 
    {
        $asisten = Asisten::firstOrNew(['kode_asisten' => $kode]);
        
        $asisten->nama_pejabat = $request->nama_pejabat;
        $asisten->tugas_fungsi = $request->tugas_fungsi;
        
        if($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pejabat', 'public');
            $asisten->foto = $path;
        }
        
        $asisten->save();
        
        return redirect()->back()->with('success', 'Data ' . strtoupper($kode) . ' berhasil diperbarui!');
    }
}