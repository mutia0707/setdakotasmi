<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Proteksi: Hanya 'staff' atau 'admin' yang boleh masuk
        if ($user->role !== 'staff' && $user->role !== 'admin') {
            return redirect('/')->withErrors('Akses Ditolak.');
        }

        $query = DB::table('agendas');
        // Filter jabatan jika bukan admin
        if ($user->role === 'staff') {
            $query->where('jabatan', $user->jabatan);
        }

        $agendas = $query->orderBy('tanggal', 'desc')->get();
        return view('staff.agenda', compact('agendas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'staff' && $user->role !== 'admin') abort(403);

        $hari = Carbon::parse($request->tanggal)->translatedFormat('l');

        DB::table('agendas')->insert([
            'tanggal'       => $request->tanggal,
            'hari'          => $hari,
            'nama_kegiatan' => $request->nama_kegiatan,
            'jabatan'       => $user->jabatan,
            'created_at'    => now(),
        ]);

        return redirect()->route('staff.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function delete($id)
    {
        DB::table('agendas')->where('id', $id)->delete();
        return back()->with('success', 'Agenda dihapus.');
    }
}