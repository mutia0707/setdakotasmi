<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HibahController extends Controller {

    // --- PUBLIK ---
    public function indexPublik()
    {
        // Mengambil data dari tabel 'hibah'
        $hibah = DB::table('hibah')->latest()->get();
        return view('pages.hibah', compact('hibah'));
    }

    // --- ADMIN ---
    public function indexAdmin() {
        $hibah = DB::table('hibah')->latest()->get();
        return view('auth.hibah_edit', compact('hibah'));
    }

    public function store(Request $request) {
        $path = $request->file('file')->store('hibah', 'public');
        DB::table('hibah')->insert([
            'judul' => $request->judul,
            'file_path' => $path,
            'created_at' => now()
        ]);
        return back()->with('success', 'File Hibah berhasil diupload!');
    }

    public function destroy($id) {
        $data = DB::table('hibah')->find($id);
        if ($data) {
            Storage::disk('public')->delete($data->file_path);
            DB::table('hibah')->where('id', $id)->delete();
        }
        return back()->with('success', 'File berhasil dihapus!');
    }

}
