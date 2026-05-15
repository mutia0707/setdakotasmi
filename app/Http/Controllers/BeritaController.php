<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Pastikan Model Berita di-import
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
    $beritas = Berita::all();
    // Pastikan ini mengarah ke file yang isinya kartu-kartu berita tadi
    return view('pages.berita', compact('beritas')); 
}
}