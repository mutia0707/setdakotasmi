<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Pastikan Model Berita di-import
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('berita.index', compact('beritas'));
    }
}