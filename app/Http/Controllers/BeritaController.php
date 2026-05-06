<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Pastikan Model Berita sudah dibuat

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua data berita dari database
        $berita = Beritas::all(); 

        // Mengirim data ke view (ganti 'berita.index' sesuai nama file blade kamu)
        return view('berita.index', compact('beritas'));
    }
}