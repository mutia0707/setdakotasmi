<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // KUNCI: Untuk koneksi ke database

class AgendaController extends Controller
{
    public function index()
    {
        // 1. Ambil data agenda dari database
        $agendas = DB::table('agendas')->orderBy('tanggal', 'desc')->get();

        // 2. PERBAIKAN: Sesuaikan dengan nama file asli kamu (agenda_pimpinan)
        // (Jika filenya ada di dalam folder pages, tulis 'pages.agenda_pimpinan')
        return view('pages.agenda_pimpinan', compact('agendas')); 
    }
}