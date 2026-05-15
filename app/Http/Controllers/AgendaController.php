<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
{
    // Pastikan variabel ini selalu ada, meskipun isinya kosong
    $agendas = Agenda::orderBy('tanggal', 'desc')->get() ?? collect();
    
    return view('pages.agenda_pimpinan', compact('agendas'));
}
}