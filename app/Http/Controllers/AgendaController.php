<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        // Mengambil semua data agenda dan mengurutkan berdasarkan tanggal terbaru
        $agendas = Agenda::orderBy('tanggal', 'desc')->get();
        
        // Membuka file di resources/views/informasi/agenda.blade.php
        return view('informasi.agenda', compact('agendas'));
    }
}