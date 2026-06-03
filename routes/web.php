<?php

use App\Models\Agenda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DokumenController; 
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| 1. ROUTE HALAMAN UTAMA (HOME)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| 2. ROUTE BERITA KOTA (SISI USER / PUBLIK)
|--------------------------------------------------------------------------
*/
// Mengarah ke BeritaController khusus untuk tampilan publik/user
Route::get('/berita-kota', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita-kota/{slug}', [BeritaController::class, 'show'])->name('berita.show');


/*
|--------------------------------------------------------------------------
| 3. ROUTE AGENDA PIMPINAN (SISI USER / PUBLIK)
|--------------------------------------------------------------------------
*/
Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');


/*
|--------------------------------------------------------------------------
| 4. PROFIL & TENTANG
|--------------------------------------------------------------------------
*/
Route::get('/tentang/visi-misi', function () {
    return view('pages.visi-misi');
})->name('visi-misi');

Route::get('/tupoksi', function () {
    return view('pages.tupoksi');
})->name('tupoksi');

Route::get('/analis-kebijakan', function () {
    return view('pages.analis-kebijakan');
})->name('analis-kebijakan');

Route::get('/struktur-organisasi', function () {
    return view('pages.struktur');
})->name('struktur');


/*
|--------------------------------------------------------------------------
| 5. BIDANG ASDA
|--------------------------------------------------------------------------
*/
Route::get('/asda-1', function () {
    return view('pages.asda1');
})->name('asda1');

Route::get('/asda-2', function () {
    return view('pages.asda2');
})->name('asda2');

Route::get('/asda-3', function () {
    return view('pages.asda3');
})->name('asda3');


/*
|--------------------------------------------------------------------------
| 6. PROGRAM & KEGIATAN
|--------------------------------------------------------------------------
*/
Route::get('/program/renstra', function () {
    return view('pages.renstra');
})->name('renstra');

Route::get('/program/rpd', function () {
    return view('pages.rpd');
})->name('rpd');

Route::get('/program/fokus-utama', function () {
    return view('pages.fokusutama'); 
})->name('fokus_utama');

Route::get('/program/sinkronisasi', function () {
    return view('pages.sinkronisasi');
})->name('sinkronisasi');

Route::get('/program/lakip', function () {
    return view('pages.lakip');
})->name('lakip');

Route::get('/lppd', function () {
    return view('pages.lppd');
})->name('lppd');

Route::get('/program/spm', function () {
    return view('pages.spm');
})->name('spm');


/*
|--------------------------------------------------------------------------
| 7. PELAYANAN
|--------------------------------------------------------------------------
*/
Route::get('/alursurat', function () {
    return view('pages.alursurat');
})->name('alursurat');

Route::get('/pelayanan/perlengkapan', function () {
    return view('pages.perlengkapan');
})->name('perlengkapan');

Route::get('/pelayanan/spbe', function () {
    return view('pages.spbe');
})->name('spbe');

Route::get('/pelayanan/rb', function () {
    return view('pages.rb');
})->name('rb');

Route::get('/pelayanan/kelembagaan', function () {
    return view('pages.kelembagaan');
})->name('kelembagaan');

Route::get('/pelayanan/bumd', function () {
    return view('pages.bumd');
})->name('bumd');

Route::get('/pelayanan/tpid', function () {
    return view('pages.tpid');
})->name('tpid');

Route::get('/pelayanan/tp2d', function () {
    return view('pages.tp2d');
})->name('tp2d');

Route::get('/pelayanan/umkm', function () {
    return view('pages.ukm');
})->name('umkm');

Route::get('/pelayanan/lppd', function () {
    return view('pages.pelayananlppd');
})->name('pelayananlppd');

Route::get('/pelayanan/kunjungan-pimpinan', function () {
    return view('pages.kunjungan');
})->name('kunjungan');

Route::get('/pelayanan/pemilu-pilkada', function () {
    return view('pages.pemilu');
})->name('pemilu');

Route::get('/pelayanan/kerja-sama', function () {
    return view('pages.kerjasama'); 
})->name('kerjasama');

Route::get('/pelayanan/bantuan-hukum', function () {
    return view('pages.bantuanhukum');
})->name('bantuanhukum');

// Rute Publik Halaman Dokumen Khusus Bagian Humas
Route::get('/pelayanan/humas-dokumentasi', [DokumenController::class, 'humasPublik'])->name('publik.humas.index');


/*
|--------------------------------------------------------------------------
| 8. GALERI (SISI USER / PUBLIK)
|--------------------------------------------------------------------------
*/
Route::get('/galeri/photos', [GaleriController::class, 'indexFoto'])->name('publik.photos');
Route::get('/galeri/video', [GaleriController::class, 'indexVideo'])->name('publik.video');

Route::get('/galeri-foto', [BeritaController::class, 'galeriFoto'])->name('galeri.foto');
Route::get('/galeri-video', [BeritaController::class, 'galeriVideo'])->name('galeri.video');


/*
|--------------------------------------------------------------------------
| 9. INFORMASI & DOWNLOAD DOKUMEN (SISI USER / PUBLIK)
|--------------------------------------------------------------------------
*/
Route::get('/informasi/penghargaan', function () {
    return view('pages.penghargaan');
})->name('penghargaan');

Route::get('/informasi/surat-edaran', function () {
    return view('pages.suratedaran'); 
})->name('surat.edaran');

Route::get('/informasi/download', function () {
    return view('pages.download');
})->name('download.index');

Route::get('/informasi/hibah', function () {
    return view('pages.hibah');
})->name('hibah.index');

Route::get('/informasi/dokumen-unduhan', [DokumenController::class, 'index'])->name('publik.dokumen.index');


/*
|--------------------------------------------------------------------------
| 10. AREA LOGIN & OUT (PINTU GERBANG)
|--------------------------------------------------------------------------
*/
Route::get('/pintu-setda', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/pintu-setda', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| 11. AREA AMAN (SISTEM PROTEKSI: WAJIB LOGIN AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ==========================================
    // SUB-AKSES PANEL ADMIN
    // ==========================================
    Route::prefix('admin')->group(function () {
        
        // Halaman Utama Panel Kendali Admin Dashboard
        Route::get('/dashboard', function () {
            if (strtolower(auth()->user()->role) !== 'admin') {
                return redirect('/pintu-setda')->withErrors('Akses Ditolak: Khusus Admin');
            }
            $beritas = DB::table('beritas')->orderBy('id', 'desc')->get(); 
            return view('auth.admin', compact('beritas'));
        })->name('auth.admin');

        // Form Kelola Berita Mandiri
        Route::get('/kelola-berita', [AdminController::class, 'index'])->name('admin.berita.index');
        Route::post('/kelola-berita/store', [AdminController::class, 'store'])->name('admin.berita.store');
        Route::post('/berita/update/{id}', [AdminController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/delete/{id}', [AdminController::class, 'destroy'])->name('admin.berita.delete');
        Route::get('/kelola-berita2', [AdminController::class, 'form'])->name('admin.berita.form');
        // Fitur Pengaturan Foto Sambutan Pejabat di Beranda
        Route::post('/ganti-foto-sambutan', [AdminController::class, 'updateSambutan'])->name('admin.sambutan.update');

        // Fitur Pengaturan Foto Berita Utama di Beranda (Duplikat sudah dihapus)
        Route::post('/ganti-foto-berita-utama', [AdminController::class, 'updateFotoBeritaUtama'])->name('admin.beritautama.update');

        // Fitur Pengaturan Foto Pejabat Daerah
        Route::post('/ganti-foto-pejabat', [AdminController::class, 'updateFotoPejabat'])->name('admin.pejabat.update');
        
        // Form Kelola Galeri Mandiri
        Route::prefix('kelola-galeri')->group(function () {
            Route::get('/', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
            Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
            Route::post('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
            Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        });

        // KELOLA DOKUMEN
        Route::get('/dokumen', [DokumenController::class, 'adminIndex'])->name('admin.dokumen.index');
        Route::post('/dokumen/store', [DokumenController::class, 'store'])->name('admin.dokumen.store');
        Route::post('/dokumen/update/{id}', [DokumenController::class, 'update'])->name('admin.dokumen.edit');
        Route::delete('/dokumen/delete/{id}', [DokumenController::class, 'destroy'])->name('admin.dokumen.destroy');
    });



    // ==========================================
    // SUB-AKSES PANEL STAFF
    // ==========================================
    Route::prefix('staff')->group(function () {
        Route::get('/agenda', function () {
            if (strtolower(auth()->user()->role) !== 'staff') {
                return redirect('/pintu-setda')->withErrors('Akses Ditolak: Khusus Staff');
            }
            $agendas = DB::table('agendas')->orderBy('tanggal', 'desc')->get();
            return view('staff.agenda', compact('agendas')); 
        })->name('staff.agenda.index');

        Route::get('/auth-agenda-alias', function () {
            return redirect()->route('staff.agenda.index');
        })->name('auth.staffagenda');

        Route::post('/agenda', [LoginController::class, 'storeAgenda'])->name('staff.agenda.store');
        Route::post('/agenda/update/{id}', [LoginController::class, 'updateAgenda'])->name('staff.agenda.update');
        Route::get('/agenda/delete/{id}', [LoginController::class, 'deleteAgenda'])->name('staff.agenda.delete');
    });

});