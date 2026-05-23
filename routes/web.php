<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;

// 1. Home
Route::get('/', function () { return view('home'); })->name('home');

// 2. Berita
Route::get('/berita-kota', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita-kota/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// 3. Agenda Pimpinan
Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');

// 4. Profil & Tentang
Route::get('/tentang/visi-misi', function () { return view('pages.visi-misi'); })->name('visi-misi');
Route::get('/tupoksi', function () { return view('pages.tupoksi'); })->name('tupoksi');
Route::get('/analis-kebijakan', function () { return view('pages.analis-kebijakan'); })->name('analis-kebijakan');
Route::get('/struktur-organisasi', function () { return view('pages.struktur'); })->name('struktur');

// 5. Bidang ASDA
Route::get('/asda-1', function () { return view('pages.asda1'); })->name('asda1');
Route::get('/asda-2', function () { return view('pages.asda2'); })->name('asda2');
Route::get('/asda-3', function () { return view('pages.asda3'); })->name('asda3');

// 6. Program & Kegiatan
Route::get('/program/renstra', function () { return view('pages.renstra'); })->name('renstra');
Route::get('/program/rpd', function () { return view('pages.rpd'); })->name('rpd');
Route::get('/program/fokus-utama', function () { return view('pages.fokusutama'); })->name('fokus_utama');
Route::get('/program/sinkronisasi', function () { return view('pages.sinkronisasi'); })->name('sinkronisasi');
Route::get('/program/lakip', function () { return view('pages.lakip'); })->name('lakip');
Route::get('/lppd', function () { return view('pages.lppd'); })->name('lppd');
Route::get('/program/spm', function () { return view('pages.spm'); })->name('spm');

// 7. Pelayanan
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

// 8. DOKUMEN PUBLIK
Route::middleware(['auth'])->group(function () {
    // Pastikan route ini menggunakan 'adminIndex'
    Route::get('/admin/dokumen', [DokumenController::class, 'adminIndex'])->name('admin.dokumen.index');
    // Pastikan baris ini ada di routes/web.php
Route::delete('/admin/dokumen/destroy/{id}', [App\Http\Controllers\DokumenController::class, 'destroy'])->name('admin.dokumen.destroy');
// Rute untuk menampilkan halaman edit
Route::get('/admin/dokumen/{id}/edit', [App\Http\Controllers\DokumenController::class, 'edit'])->name('admin.dokumen.edit');

// Rute untuk memproses update data
Route::put('/admin/dokumen/{id}', [App\Http\Controllers\DokumenController::class, 'update'])->name('admin.dokumen.update');
    
    Route::post('/admin/dokumen/store', [DokumenController::class, 'store'])->name('admin.dokumen.store');
    Route::delete('/admin/dokumen/delete/{id}', [DokumenController::class, 'delete'])->name('admin.dokumen.delete');
});
// 9. Galeri
Route::get('/galeri/photos', [GaleriController::class, 'indexFoto'])->name('photos');
Route::get('/galeri/video', [GaleriController::class, 'indexVideo'])->name('video');

// 10. Informasi Publik
Route::get('/informasi/penghargaan', function () { return view('pages.penghargaan'); })->name('penghargaan');
Route::get('/informasi/surat-edaran', function () { return view('pages.suratedaran'); })->name('surat.edaran');
Route::get('/informasi/download', function () { return view('pages.download'); })->name('download.index');
Route::get('/informasi/hibah', function () { return view('pages.hibah'); })->name('hibah.index');

// LOGIN
Route::get('/pintu-setda', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/pintu-setda', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// AREA AMAN (ADMIN & STAFF)
Route::middleware(['auth'])->group(function () {
    Route::post('/upload-berita-sekarang', [BeritaController::class, 'store'])->name('admin.berita.store');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            if (strtolower(auth()->user()->role) !== 'admin') return redirect('/pintu-setda');
            $beritas = DB::table('beritas')->orderBy('id', 'desc')->get(); 
            return view('auth.admin', compact('beritas'));
        })->name('auth.admin');

        Route::get('/kelola-berita', [BeritaController::class, 'adminBerita'])->name('admin.berita.index');
        Route::post('/berita/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('admin.berita.delete');
        
        Route::get('/kelola-galeri', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
        Route::post('/kelola-galeri/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::put('/kelola-galeri/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/kelola-galeri/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');

        // KELOLA DOKUMEN (Admin)
        Route::get('/dokumen', [DokumenController::class, 'adminIndex'])->name('admin.dokumen.index');
        Route::post('/dokumen/store', [DokumenController::class, 'store'])->name('admin.dokumen.store');
        Route::delete('/dokumen/delete/{id}', [DokumenController::class, 'destroy'])->name('admin.dokumen.delete');
    });

    Route::prefix('staff')->group(function () {
        Route::get('/agenda', [LoginController::class, 'indexAgenda'])->name('staff.agenda.index');
        Route::post('/agenda', [LoginController::class, 'storeAgenda'])->name('staff.agenda.store');
        Route::post('/agenda/update/{id}', [LoginController::class, 'updateAgenda'])->name('staff.agenda.update');
        Route::delete('/agenda/delete/{id}', [LoginController::class, 'deleteAgenda'])->name('staff.agenda.delete');
    });
});