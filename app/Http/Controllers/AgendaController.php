<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgendaController extends Controller
{
    // Menampilkan halaman panel agenda staff (Hanya menampilkan agenda milik user yang login)
    public function index()
    {
        $divisiLogin = Auth::user()->name;

        // Filter data berdasarkan nama user yang sedang login di dalam teks kegiatan
        $agendas = DB::table('agendas')
                    ->where('nama_kegiatan', 'LIKE', '[' . $divisiLogin . ']%')
                    ->orderBy('tanggal', 'desc')
                    ->get();

        return view('staff.agenda', compact('agendas'));
    }

    // Menyimpan agenda baru (Otomatis menggunakan nama user/divisi yang login)
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_kegiatan' => 'required|string|max:1000',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $divisiLogin = Auth::user()->name;
        $namaHari = Carbon::parse($request->tanggal)->locale('id')->dayName;
        $kegiatanLengkap = "[" . $divisiLogin . "] " . $request->nama_kegiatan;

        $namaFoto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/agenda'), $namaFoto);
        }

        DB::table('agendas')->insert([
            'tanggal'       => $request->tanggal,
            'hari'          => $namaHari,
            'nama_kegiatan' => $kegiatanLengkap, 
            'foto'          => $namaFoto,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->back()->with('success', 'Jadwal agenda berhasil disimpan!');
    }

    // Memperbarui agenda
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_kegiatan' => 'required|string|max:1000',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $agendaLama = DB::table('agendas')->where('id', $id)->first();
        $divisiLogin = Auth::user()->name;
        $namaHari = Carbon::parse($request->tanggal)->locale('id')->dayName;
        $kegiatanLengkap = "[" . $divisiLogin . "] " . $request->nama_kegiatan;

        $namaFoto = $agendaLama->foto;
        if ($request->hasFile('foto')) {
            if ($namaFoto && file_exists(public_path('storage/agenda/' . $namaFoto))) {
                unlink(public_path('storage/agenda/' . $namaFoto));
            }

            $file = $request->file('foto');
            $namaFoto = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/agenda'), $namaFoto);
        }

        DB::table('agendas')->where('id', $id)->update([
            'tanggal'       => $request->tanggal,
            'hari'          => $namaHari,
            'nama_kegiatan' => $kegiatanLengkap,
            'foto'          => $namaFoto,
            'updated_at'    => now(),
        ]);

        return redirect()->back()->with('success', 'Jadwal agenda berhasil diperbarui!');
    }

    // Menghapus agenda
    public function delete($id)
    {
        $agenda = DB::table('agendas')->where('id', $id)->first();
        if ($agenda && $agenda->foto) {
            if (file_exists(public_path('storage/agenda/' . $agenda->foto))) {
                unlink(public_path('storage/agenda/' . $agenda->foto));
            }
        }

        DB::table('agendas')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Jadwal agenda berhasil dihapus!');
    }

    // Menampilkan agenda di halaman utama/publik website (Menampilkan SEMUA agenda dari semua ASDA)
    public function tampilkanAgendaPublik()
    {
        $agendas = DB::table('agendas')->orderBy('tanggal', 'desc')->get();
        return view('pages.agenda_pimpinan', compact('agendas'));
    }
}