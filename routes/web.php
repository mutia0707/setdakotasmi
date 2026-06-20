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
use App\Http\Controllers\AsistenController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\RenstraController;
use App\Http\Controllers\RpdController;
/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');

// --- Profil & Kelembagaan ---
Route::controller(ProfilController::class)->group(function () {
    Route::get('/profil-setda', 'showProfilSetda')->name('profil-setda');
    Route::get('/tentang/visi-misi', 'showVisiMisi')->name('visi-misi');
});

Route::get('/tupoksi', [TupoksiController::class, 'showTupoksiPublik'])->name('tupoksi');
Route::get('/analisis-kebijakan', [AnalisisKebijakanController::class, 'showAnalisKebijakan'])->name('analisis-kebijakan');
Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'show'])->name('struktur');

// --- Program & Perencanaan ---
Route::get('/program/renstra', [RenstraController::class, 'show'])->name('renstra');
Route::get('program/rpd', [RpdController::class, 'show'])->name('rpd');
Route::get('/program/fokus-utama', [RpdController::class, 'showFokus'])->name('fokusutama');
Route::get('/program/sinkronisasi', [RpdController::class, 'showSinkronisasi'])->name('sinkronisasi');
Route::get('/program/lakip', function () { return view('pages.lakip'); })->name('lakip');
Route::get('/program/spm', function () { return view('pages.spm'); })->name('spm');

// --- Pelayanan & Administrasi ---
Route::get('/lppd', function () { return view('pages.lppd'); })->name('lppd');
Route::get('/alursurat', function () { return view('pages.alursurat'); })->name('alursurat');

Route::controller(AsistenController::class)->group(function () {
    Route::get('/asda-1', 'show')->defaults('kode', 'asda1')->name('asda1');
    Route::get('/asda-2', 'show')->defaults('kode', 'asda2')->name('asda2');
    Route::get('/asda-3', 'show')->defaults('kode', 'asda3')->name('asda3');
});

Route::prefix('pelayanan')->group(function () {
    Route::view('/perlengkapan', 'pages.perlengkapan')->name('perlengkapan');
    Route::view('/spbe', 'pages.spbe')->name('spbe');
    Route::view('/rb', 'pages.rb')->name('rb');
    Route::view('/kelembagaan', 'pages.kelembagaan')->name('kelembagaan');
    Route::view('/bumd', 'pages.bumd')->name('bumd');
    Route::view('/tpid', 'pages.tpid')->name('tpid');
    Route::view('/tp2d', 'pages.tp2d')->name('tp2d');
    Route::view('/umkm', 'pages.ukm')->name('umkm');
    Route::view('/lppd', 'pages.pelayananlppd')->name('pelayananlppd');
    Route::view('/kunjungan-pimpinan', 'pages.kunjungan')->name('kunjungan');
    Route::view('/pemilu-pilkada', 'pages.pemilu')->name('pemilu');
    Route::view('/kerja-sama', 'pages.kerjasama')->name('kerjasama');
    Route::view('/bantuan-hukum', 'pages.bantuanhukum')->name('bantuanhukum');
    Route::get('/humas-dokumentasi', [DokumenController::class, 'humasPublik'])->name('publik.humas.index');
});

// --- Berita & Agenda ---
Route::controller(BeritaController::class)->group(function () {
    Route::get('/berita-kota', 'index')->name('berita.index');
    Route::get('/berita-kota/{slug}', 'show')->name('berita.show');
    Route::get('/galeri-foto', 'galeriFoto')->name('galeri.foto');
    Route::get('/galeri-video', 'galeriVideo')->name('galeri.video');
});

Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');

// --- Galeri & Informasi ---
Route::controller(GaleriController::class)->group(function () {
    Route::get('/galeri/photos', 'indexFoto')->name('publik.photos');
    Route::get('/galeri/video', 'indexVideo')->name('publik.video');
});

Route::prefix('informasi')->group(function () {
    Route::view('/penghargaan', 'pages.penghargaan')->name('penghargaan');
    Route::view('/surat-edaran', 'pages.suratedaran')->name('surat.edaran');
    Route::view('/download', 'pages.download')->name('download.index');
    Route::view('/hibah', 'pages.hibah')->name('hibah.index');
    Route::get('/dokumen-unduhan', [DokumenController::class, 'index'])->name('publik.dokumen.index');
});
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

    // ADMIN GROUP
    Route::prefix('admin')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('admin.dashboard');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboardView'])->name('auth.admin');

        // Kelola Visi Misi & Profil
        Route::get('/visi-misi-edit', [ProfilController::class, 'editVisiMisi'])->name('admin.visi-misi.edit');
        Route::post('/visi-misi-update', [ProfilController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
        Route::get('/profil-setda-edit', [ProfilController::class, 'editSetda'])->name('admin.profil-setda.edit');
        Route::post('/profil-setda-update', [ProfilController::class, 'updateSetda'])->name('admin.profil-setda.update');

        // Kelola Tupoksi
        Route::get('/tupoksi-edit', [TupoksiController::class, 'editTupoksi'])->name('admin.tupoksi.edit');
        Route::post('/tupoksi-update', [TupoksiController::class, 'updateTupoksi'])->name('admin.tupoksi.update');

        // Kelola Analisis Kebijakan
        Route::get('/analisis-kebijakan/edit', [AnalisisKebijakanController::class, 'edit'])->name('admin.analisis-kebijakan.edit');
        Route::post('/analisis-kebijakan/update', [AnalisisKebijakanController::class, 'update'])->name('admin.analisis-kebijakan.update');

        // Halaman sub-menu Asisten
    Route::get('/asisten-menu', function () {
        return view('auth.asisten-menu');
    })->name('admin.asisten.menu');

// --- Manajemen Asisten ---
    Route::get('/asisten-edit/{kode}', [AsistenController::class, 'edit'])->name('admin.asisten.edit');
    Route::post('/asisten-update/{kode}', [AsistenController::class, 'update'])->name('admin.asisten.update');

    // --- Struktur Organisasi ---
    Route::get('/struktur-edit', [StrukturOrganisasiController::class, 'edit'])->name('admin.struktur.edit');
    Route::post('/struktur-update', [StrukturOrganisasiController::class, 'update'])->name('admin.struktur.update');

    Route::get('/renstra/edit', [RenstraController::class, 'edit'])->name('admin.renstra.edit');
    Route::post('/renstra/update', [RenstraController::class, 'update'])->name('admin.renstra.update');
    
    // Menu Utama Perencanaan (Halaman Gabungan)
    Route::get('/perencanaan-menu', [RpdController::class, 'menuPerencanaan'])->name('admin.perencanaan.menu');
    
    // Rute Sinkronisasi
    Route::get('/sinkronisasi/edit', [RpdController::class, 'editSinkronisasi'])->name('admin.sinkronisasi.edit');
    Route::post('/sinkronisasi/update', [RpdController::class, 'updateSinkronisasi'])->name('admin.sinkronisasi.update');
    
    // Rute Lainnya (Pastikan sudah ada)
    Route::get('/rpd/edit', [RpdController::class, 'edit'])->name('admin.rpd.edit');
    Route::post('/rpd/update', [RpdController::class, 'update'])->name('admin.rpd.update');
    Route::get('/fokus/edit', [RpdController::class, 'editFokus'])->name('admin.fokus.edit');
    Route::post('/fokus/update', [RpdController::class, 'updateFokus'])->name('admin.fokus.update');

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