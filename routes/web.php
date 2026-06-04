<?php

use App\Models\Agenda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DokumenController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');

// Berita & Agenda Publik
Route::get('/berita-kota', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita-kota/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');

// Profil & Visi Misi Publik
Route::get('/tentang/visi-misi', [ProfilController::class, 'showVisiMisi'])->name('visi-misi');
Route::get('/tupoksi', function () { return view('pages.tupoksi'); })->name('tupoksi');
Route::get('/analis-kebijakan', function () { return view('pages.analis-kebijakan'); })->name('analis-kebijakan');
Route::get('/struktur-organisasi', function () { return view('pages.struktur'); })->name('struktur');

// Bidang ASDA
Route::get('/asda-1', function () { return view('pages.asda1'); })->name('asda1');
Route::get('/asda-2', function () { return view('pages.asda2'); })->name('asda2');
Route::get('/asda-3', function () { return view('pages.asda3'); })->name('asda3');

// Program & Pelayanan
Route::get('/program/renstra', function () { return view('pages.renstra'); })->name('renstra');
Route::get('/program/rpd', function () { return view('pages.rpd'); })->name('rpd');
Route::get('/program/fokus-utama', function () { return view('pages.fokusutama'); })->name('fokus_utama');
Route::get('/program/sinkronisasi', function () { return view('pages.sinkronisasi'); })->name('sinkronisasi');
Route::get('/program/lakip', function () { return view('pages.lakip'); })->name('lakip');
Route::get('/lppd', function () { return view('pages.lppd'); })->name('lppd');
Route::get('/program/spm', function () { return view('pages.spm'); })->name('spm');
Route::get('/alursurat', function () { return view('pages.alursurat'); })->name('alursurat');
Route::get('/pelayanan/perlengkapan', function () { return view('pages.perlengkapan'); })->name('perlengkapan');
Route::get('/pelayanan/spbe', function () { return view('pages.spbe'); })->name('spbe');
Route::get('/pelayanan/rb', function () { return view('pages.rb'); })->name('rb');
Route::get('/pelayanan/kelembagaan', function () { return view('pages.kelembagaan'); })->name('kelembagaan');
Route::get('/pelayanan/bumd', function () { return view('pages.bumd'); })->name('bumd');
Route::get('/pelayanan/tpid', function () { return view('pages.tpid'); })->name('tpid');
Route::get('/pelayanan/tp2d', function () { return view('pages.tp2d'); })->name('tp2d');
Route::get('/pelayanan/umkm', function () { return view('pages.ukm'); })->name('umkm');
Route::get('/pelayanan/lppd', function () { return view('pages.pelayananlppd'); })->name('pelayananlppd');
Route::get('/pelayanan/kunjungan-pimpinan', function () { return view('pages.kunjungan'); })->name('kunjungan');
Route::get('/pelayanan/pemilu-pilkada', function () { return view('pages.pemilu'); })->name('pemilu');
Route::get('/pelayanan/kerja-sama', function () { return view('pages.kerjasama'); })->name('kerjasama');
Route::get('/pelayanan/bantuan-hukum', function () { return view('pages.bantuanhukum'); })->name('bantuanhukum');
Route::get('/pelayanan/humas-dokumentasi', [DokumenController::class, 'humasPublik'])->name('publik.humas.index');

// Galeri & Informasi Publik
Route::get('/galeri/photos', [GaleriController::class, 'indexFoto'])->name('publik.photos');
Route::get('/galeri/video', [GaleriController::class, 'indexVideo'])->name('publik.video');
Route::get('/galeri-foto', [BeritaController::class, 'galeriFoto'])->name('galeri.foto');
Route::get('/galeri-video', [BeritaController::class, 'galeriVideo'])->name('galeri.video');
Route::get('/informasi/penghargaan', function () { return view('pages.penghargaan'); })->name('penghargaan');
Route::get('/informasi/surat-edaran', function () { return view('pages.suratedaran'); })->name('surat.edaran');
Route::get('/informasi/download', function () { return view('pages.download'); })->name('download.index');
Route::get('/informasi/hibah', function () { return view('pages.hibah'); })->name('hibah.index');
Route::get('/informasi/dokumen-unduhan', [DokumenController::class, 'index'])->name('publik.dokumen.index');

/*
|--------------------------------------------------------------------------
| 2. AREA LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/pintu-setda', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/pintu-setda', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 3. AREA AMAN (ADMIN & STAFF)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // PANEL ADMIN
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            if (strtolower(auth()->user()->role) !== 'admin') {
                return redirect('/pintu-setda')->withErrors('Akses Ditolak');
            }
            $beritas = DB::table('beritas')->orderBy('id', 'desc')->get(); 
            return view('auth.admin', compact('beritas'));
        })->name('auth.admin');
// RUTE PUBLIK (Bisa diakses tanpa login)
Route::get('/tentang/visi-misi', [ProfilController::class, 'showVisiMisi'])->name('visi-misi');

// RUTE ADMIN (WAJIB LOGIN)
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/visi-misi-edit', [ProfilController::class, 'editVisiMisi'])->name('admin.visi-misi.edit');
        Route::post('/visi-misi-update', [ProfilController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
    });
});
        // Kelola Profil Setda
        Route::get('/profil-setda', [ProfilController::class, 'editSetda'])->name('admin.profil-setda.edit');
        Route::post('/profil-setda', [ProfilController::class, 'updateSetda']);

        // Kelola Berita
        Route::get('/kelola-berita', [AdminController::class, 'index'])->name('admin.berita.index');
        Route::post('/kelola-berita/store', [AdminController::class, 'store'])->name('admin.berita.store');
        Route::post('/berita/update/{id}', [AdminController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/delete/{id}', [AdminController::class, 'destroy'])->name('admin.berita.delete');
        Route::get('/kelola-berita2', [AdminController::class, 'form'])->name('admin.berita.form');
        
        // Fitur Foto
        Route::post('/ganti-foto-sambutan', [AdminController::class, 'updateSambutan'])->name('admin.sambutan.update');
        Route::post('/ganti-foto-berita-utama', [AdminController::class, 'updateFotoBeritaUtama'])->name('admin.beritautama.update');
        Route::post('/ganti-foto-pejabat', [AdminController::class, 'updateFotoPejabat'])->name('admin.pejabat.update');
        
        // Kelola Galeri
        Route::prefix('kelola-galeri')->group(function () {
            Route::get('/', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
            Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
            Route::post('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
            Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        });

        // Kelola Dokumen
        Route::get('/dokumen', [DokumenController::class, 'adminIndex'])->name('admin.dokumen.index');
        Route::post('/dokumen/store', [DokumenController::class, 'store'])->name('admin.dokumen.store');
        Route::post('/dokumen/update/{id}', [DokumenController::class, 'update'])->name('admin.dokumen.edit');
        Route::delete('/dokumen/delete/{id}', [DokumenController::class, 'destroy'])->name('admin.dokumen.destroy');
    });

    // PANEL STAFF
    Route::prefix('staff')->group(function () {
        Route::get('/agenda', function () {
            if (strtolower(auth()->user()->role) !== 'staff') {
                return redirect('/pintu-setda')->withErrors('Akses Ditolak');
            }
            $agendas = DB::table('agendas')->orderBy('tanggal', 'desc')->get();
            return view('staff.agenda', compact('agendas')); 
        })->name('staff.agenda.index');

        Route::post('/agenda', [LoginController::class, 'storeAgenda'])->name('staff.agenda.store');
        Route::post('/agenda/update/{id}', [LoginController::class, 'updateAgenda'])->name('staff.agenda.update');
        Route::get('/agenda/delete/{id}', [LoginController::class, 'deleteAgenda'])->name('staff.agenda.delete');
    });
});