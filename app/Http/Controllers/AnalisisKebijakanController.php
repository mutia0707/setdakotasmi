<?php

namespace App\Http\Controllers;

use App\Models\AnalisisKebijakan;
use Illuminate\Http\Request;

class AnalisisKebijakanController extends Controller
{
    // Fungsi untuk publik
    public function showAnalisKebijakan() 
    {
        $data = AnalisisKebijakan::first();
        return view('auth.analisis-kebijakan', compact('data')); 
    }

    // Fungsi untuk admin edit
    public function edit() 
    {
        $data = AnalisisKebijakan::first();
        return view('auth.analisis-kebijakan-edit', compact('data')); 
    }

    // Fungsi update (DIPERBAIKI)
    public function update(Request $request) 
    {
        // 1. Ambil data atau buat baru jika kosong
        $data = AnalisisKebijakan::first() ?? new AnalisisKebijakan();
        
        // 2. Simpan data dari form
        $data->tupoksi_utama = $request->tupoksi_utama;
        $data->rincian_tugas = $request->rincian_tugas;
        $data->save();

        // 3. PERBAIKAN: Arahkan kembali ke halaman edit 
        // atau ke dashboard admin setelah berhasil update
        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}