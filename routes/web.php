<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DokumenController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TupoksiController;
use App\Http\Controllers\AnalisisKebijakanController;

/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');

// Profil
Route::get('/profil-setda', [ProfilController::class, 'showProfilSetda'])->name('profil-setda');
Route::get('/tentang/visi-misi', [ProfilController::class, 'showVisiMisi'])->name('visi-misi');
Route::get('/tupoksi', [TupoksiController::class, 'showTupoksiPublik'])->name('tupoksi');
Route::get('/analisis-kebijakan', [AnalisisKebijakanController::class, 'showAnalisKebijakan'])->name('analis-kebijakan');
Route::get('/struktur-organisasi', function () { return view('pages.struktur'); })->name('struktur');

// Berita & Agenda
Route::get('/berita-kota', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita-kota/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');

// Bidang ASDA & Program (Statik)
Route::view('/asda-1', 'pages.asda1')->name('asda1');
Route::view('/asda-2', 'pages.asda2')->name('asda2');
Route::view('/asda-3', 'pages.asda3')->name('asda3');
Route::view('/program/renstra', 'pages.renstra')->name('renstra');
Route::view('/program/rpd', 'pages.rpd')->name('rpd');
Route::view('/program/fokus-utama', 'pages.fokusutama')->name('fokus_utama');
Route::view('/program/sinkronisasi', 'pages.sinkronisasi')->name('sinkronisasi');
Route::view('/program/lakip', 'pages.lakip')->name('lakip');
Route::view('/lppd', 'pages.lppd')->name('lppd');
Route::view('/program/spm', 'pages.spm')->name('spm');
Route::view('/alursurat', 'pages.alursurat')->name('alursurat');
Route::view('/pelayanan/perlengkapan', 'pages.perlengkapan')->name('perlengkapan');
Route::view('/pelayanan/spbe', 'pages.spbe')->name('spbe');
Route::view('/pelayanan/rb', 'pages.rb')->name('rb');
Route::view('/pelayanan/kelembagaan', 'pages.kelembagaan')->name('kelembagaan');
Route::view('/pelayanan/bumd', 'pages.bumd')->name('bumd');
Route::view('/pelayanan/tpid', 'pages.tpid')->name('tpid');
Route::view('/pelayanan/tp2d', 'pages.tp2d')->name('tp2d');
Route::view('/pelayanan/umkm', 'pages.ukm')->name('umkm');
Route::view('/pelayanan/lppd', 'pages.pelayananlppd')->name('pelayananlppd');
Route::view('/pelayanan/kunjungan-pimpinan', 'pages.kunjungan')->name('kunjungan');
Route::view('/pelayanan/pemilu-pilkada', 'pages.pemilu')->name('pemilu');
Route::view('/pelayanan/kerja-sama', 'pages.kerjasama')->name('kerjasama');
Route::view('/pelayanan/bantuan-hukum', 'pages.bantuanhukum')->name('bantuanhukum');
Route::get('/pelayanan/humas-dokumentasi', [DokumenController::class, 'humasPublik'])->name('publik.humas.index');

// Galeri & Informasi
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
/*
|--------------------------------------------------------------------------
| 3. AREA AMAN (ADMIN & STAFF)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // ADMIN GROUP
    Route::prefix('admin')->group(function () {
        
        // Dashboard (Diberi dua nama agar aman)
        Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('admin.dashboard');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboardView'])->name('auth.admin');

        // Kelola Visi Misi & Profil Setda
        Route::get('/visi-misi-edit', [ProfilController::class, 'editVisiMisi'])->name('admin.visi-misi.edit');
        Route::post('/visi-misi-update', [ProfilController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
        Route::get('/profil-setda-edit', [ProfilController::class, 'editSetda'])->name('admin.profil-setda.edit');
        Route::post('/profil-setda-update', [ProfilController::class, 'updateSetda'])->name('admin.profil-setda.update');

        // Kelola Tupoksi
        Route::get('/tupoksi-edit', [TupoksiController::class, 'editTupoksi'])->name('admin.tupoksi.edit');
        Route::post('/tupoksi-update', [TupoksiController::class, 'updateTupoksi'])->name('admin.tupoksi.update');

        // Kelola Analisis Kebijakan
        Route::get('/analisis-kebijakan-edit', [AnalisisKebijakanController::class, 'edit'])->name('admin.analisis-kebijakan.edit');
        Route::post('/analisis-kebijakan-update', [AnalisisKebijakanController::class, 'update'])->name('auth.analisis-kebijakan.update');

        // Fitur Ganti Foto
        Route::post('/ganti-foto-sambutan', [AdminController::class, 'updateSambutan'])->name('admin.sambutan.update');
        Route::post('/ganti-foto-berita-utama', [AdminController::class, 'updateFotoBeritaUtama'])->name('admin.beritautama.update');
        Route::post('/ganti-foto-pejabat', [AdminController::class, 'updateFotoPejabat'])->name('admin.pejabat.update');

        // Kelola Berita
        Route::get('/kelola-berita', [AdminController::class, 'index'])->name('admin.berita.index');
        Route::post('/kelola-berita/store', [AdminController::class, 'store'])->name('admin.berita.store');
        Route::post('/berita/update/{id}', [AdminController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/delete/{id}', [AdminController::class, 'destroy'])->name('admin.berita.delete');

        // Kelola Galeri
        Route::prefix('kelola-galeri')->group(function () {
            Route::get('/', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
            Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
            Route::post('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
            Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        });

        // Kelola Dokumen
        Route::prefix('dokumen')->group(function () {
            Route::get('/', [DokumenController::class, 'adminIndex'])->name('admin.dokumen.index');
            Route::post('/store', [DokumenController::class, 'store'])->name('admin.dokumen.store');
            Route::post('/update/{id}', [DokumenController::class, 'update'])->name('admin.dokumen.edit');
            Route::delete('/delete/{id}', [DokumenController::class, 'destroy'])->name('admin.dokumen.destroy');
        });
    });

    // Area Staff
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