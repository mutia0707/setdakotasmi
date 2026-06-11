<?php

namespace App\Http\Controllers;

use App\Models\AnalisisKebijakan;
use Illuminate\Http\Request;

class AnalisisKebijakanController extends Controller
{
  public function showAnalisKebijakan() 
{
    $data = AnalisisKebijakan::first();
    // Panggil file untuk tampilan publik
    return view('auth.analisis-kebijakan', compact('data')); 
}

public function edit() 
{
    $data = AnalisisKebijakan::first();
    // Panggil file untuk admin edit
    return view('auth.analisis-kebijakan-edit', compact('data')); 
}
    public function update(Request $request) 
    {
        $data = AnalisisKebijakan::first() ?? new AnalisisKebijakan();
        $data->tupoksi_utama = $request->tupoksi_utama;
        $data->rincian_tugas = $request->rincian_tugas;
        $data->save();

        return redirect()->route('admin.analisis-kebijakan.index')->with('success', 'Data berhasil diperbarui!');
    }
}