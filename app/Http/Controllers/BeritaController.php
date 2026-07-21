<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class BeritaController extends Controller
{
    /**
     * Halaman PUBLIK: /berita-kota
     * Menampilkan semua berita dari semua bagian, tanpa perlu login.
     */
    public function indexPublik()
    {
        $beritas = Berita::latest()->get();
        return view('berita.berita', compact('beritas'));
    }

    /**
     * Halaman PUBLIK: /berita-kota/{slug}
     * Detail satu berita.
     */
    public function show($slug)
    {
        $item = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.show', compact('item'));
    }

    /**
     * Halaman STAFF: /staff/berita
     * Hanya boleh diakses staff yang sudah login, dan cuma lihat berita bagiannya sendiri.
     */
    public function index() 
    {
        // Proteksi: Hanya role staff (semua akun 7 Bagian) yang boleh kelola berita
        if (auth()->user()->role !== 'staff') {
            return redirect('/staff/agenda')->with('error', 'Akses tidak diizinkan.');
        }
        $beritas = Berita::where('bagian', auth()->user()->bagian)->latest()->get();
        return view('staff.berita.index', compact('beritas'));
    }

    /**
     * Halaman ADMIN: /admin/kelola-berita
     * Admin bisa lihat & kelola SEMUA berita dari semua bagian (tidak difilter).
     */
    public function adminIndex()
    {
        $beritas = Berita::latest()->get();

        // GANTI 'auth.kelola-berita' KALAU nama file blade kamu berbeda
        return view('auth.admin_berita', compact('beritas'));
    }

    /**
     * Generate slug unik. Kalau slug dasar sudah dipakai, tambahkan angka
     * di belakang: berita-baru, berita-baru-1, berita-baru-2, dst.
     */
    private function generateUniqueSlug(string $judul, ?int $ignoreId = null): string
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $i = 1;

        while (
            Berita::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $i;
            $i++;
        }

        return $slug;
    }

    public function store(Request $request) 
    {
        $request->validate([
            'judul' => 'required', 
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi_berita = $request->isi;
        $berita->slug = $this->generateUniqueSlug($request->judul);
        $berita->bagian = auth()->user()->bagian;
        $berita->tanggal_publish = now();
        if ($request->hasFile('gambar')) {
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }
        $berita->save();
        return redirect()->route('staff.berita.index')->with('success', 'Berita berhasil diupload!');
    }
    public function destroy($id) 
    {
        $berita = Berita::findOrFail($id);
        
        // Admin boleh hapus berita dari bagian manapun.
        // Staff cuma boleh hapus berita dari bagiannya sendiri.
        if (auth()->user()->role !== 'admin' && $berita->bagian !== auth()->user()->bagian) {
            abort(403);
        }

        if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
        $berita->delete();
        
        return back()->with('success', 'Berita berhasil dihapus!');
    }
    public function update(Request $request, $id)
{
    $berita = Berita::findOrFail($id);

    if ($berita->bagian !== auth()->user()->bagian) abort(403);

    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    $berita->judul = $request->judul;
    $berita->isi_berita = $request->isi;
    $berita->slug = $this->generateUniqueSlug($request->judul, $berita->id);

    if ($request->hasFile('gambar')) {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->gambar = $request->file('gambar')->store('berita', 'public');
    }

    $berita->save();

    return redirect()->route('staff.berita.index')->with('success', 'Berita berhasil diupdate!');
}
}