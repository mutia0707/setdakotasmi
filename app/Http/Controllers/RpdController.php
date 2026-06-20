<?php

namespace App\Http\Controllers;

use App\Models\Rpd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RpdController extends Controller
{
    // --- MENU PUSAT (Untuk Halaman Pilihan Menu/Hub) ---
    public function menuPerencanaan() {
        return view('auth.perencanaan-menu');
    }

    // --- PUBLIK: Tampilan Halaman ---
    public function show() {
        $data = Rpd::first();
        return view('pages.rpd', compact('data'));
    }

    public function showFokus() {
        $data = Rpd::first();
        return view('pages.fokusutama', compact('data'));
    }

    public function showSinkronisasi() {
        $data = Rpd::first();
        return view('pages.sinkronisasi', compact('data'));
    }

    // --- ADMIN: Form Edit ---
    public function edit() {
        $data = Rpd::first() ?? new Rpd();
        return view('auth.rpd-edit', compact('data'));
    }

    public function editFokus() {
        $data = Rpd::first() ?? new Rpd();
        return view('auth.fokus-edit', compact('data'));
    }

    public function editSinkronisasi() {
        $data = Rpd::first() ?? new Rpd();
        return view('auth.sinkronisasi-edit', compact('data'));
    }

    // --- ADMIN: Proses Simpan ---
    public function update(Request $request) {
        $data = Rpd::first() ?? new Rpd();
        $data->deskripsi = $request->deskripsi;
        $data->tujuan_strategis = $request->tujuan_strategis;
        
        if ($request->hasFile('file_pdf')) {
            if ($data->file_pdf) Storage::disk('public')->delete($data->file_pdf);
            $data->file_pdf = $request->file('file_pdf')->store('dokumen', 'public');
        }
        $data->save();
        return redirect()->back()->with('success', 'Data RPD berhasil diperbarui!');
    }

    public function updateFokus(Request $request) {
        $data = Rpd::first() ?? new Rpd();
        $data->fokus_utama = $request->fokus_utama;
        $data->save();
        return redirect()->back()->with('success', 'Data Fokus Utama berhasil diperbarui!');
    }

    public function updateSinkronisasi(Request $request) {
        $data = Rpd::first() ?? new Rpd();
        $data->sinkronisasi = $request->sinkronisasi;
        $data->save();
        return redirect()->back()->with('success', 'Data Sinkronisasi berhasil diperbarui!');
    }
}