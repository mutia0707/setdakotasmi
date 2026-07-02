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
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\AlurSuratController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\BagianOrganisasiController;
use App\Http\Controllers\PerekonomianController;
use App\Http\Controllers\TataPemerintahanController;
use App\Http\Controllers\PelayananHukumController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\SuratEdaranController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HibahController;
/*
|--------------------------------------------------------------------------
| 1. ROUTE PUBLIK (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return view('home'); })->name('home');

Route::controller(ProfilController::class)->group(function () {
    Route::get('/profil-setda', 'showProfilSetda')->name('profil-setda');
    Route::get('/tentang/visi-misi', 'showVisiMisi')->name('visi-misi');
});

Route::get('/tupoksi', [TupoksiController::class, 'showTupoksiPublik'])->name('tupoksi');
Route::get('/analisis-kebijakan', [AnalisisKebijakanController::class, 'showAnalisKebijakan'])->name('analisis-kebijakan');
Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'show'])->name('struktur');

Route::get('/program/renstra', [RenstraController::class, 'show'])->name('renstra');
Route::get('/program/rpd', [RpdController::class, 'show'])->name('rpd');
Route::get('/program/fokus-utama', [RpdController::class, 'showFokus'])->name('fokusutama');
Route::get('/program/sinkronisasi', [RpdController::class, 'showSinkronisasi'])->name('sinkronisasi');

// Pelaporan Publik
Route::get('/program/lakip', [PelaporanController::class, 'showPublik'])->defaults('jenis', 'lkip')->name('lakip');
Route::get('/program/spm',   [PelaporanController::class, 'showPublik'])->defaults('jenis', 'spm')->name('spm');
Route::get('/lppd',          [PelaporanController::class, 'showPublik'])->defaults('jenis', 'lppd')->name('lppd');

// Bagian Umum Publik
Route::get('/alursurat', [AlurSuratController::class, 'show'])->name('alursurat');
Route::get('/pelayanan/perlengkapan', [PerlengkapanController::class, 'show'])->name('perlengkapan');

// Asisten
Route::controller(AsistenController::class)->group(function () {
    Route::get('/asda-1', 'show')->defaults('kode', 'asda1')->name('asda1');
    Route::get('/asda-2', 'show')->defaults('kode', 'asda2')->name('asda2');
    Route::get('/asda-3', 'show')->defaults('kode', 'asda3')->name('asda3');
});

// Bagian Organisasi Publik
Route::get('/pelayanan/spbe', [BagianOrganisasiController::class, 'show'])->defaults('jenis', 'spbe')->name('spbe');
Route::get('/pelayanan/rb', [BagianOrganisasiController::class, 'show'])->defaults('jenis', 'rb')->name('rb');
Route::get('/pelayanan/kelembagaan', [BagianOrganisasiController::class, 'show'])->defaults('jenis', 'kelembagaan')->name('kelembagaan');

// Bagian Perekonomian Publik
Route::get('/pelayanan/bumd', [PerekonomianController::class, 'show'])->defaults('slug', 'bumd')->name('bumd');
Route::get('/pelayanan/tpid', [PerekonomianController::class, 'show'])->defaults('slug', 'tpid')->name('tpid');
Route::get('/pelayanan/tp2d', [PerekonomianController::class, 'show'])->defaults('slug', 'tp2d')->name('tp2d');
Route::get('/pelayanan/umkm', [PerekonomianController::class, 'show'])->defaults('slug', 'umkm')->name('umkm');

// Tata Pemerintahan Publik
Route::get('/pelayanan/kunjungan-pimpinan', [TataPemerintahanController::class, 'show'])->defaults('slug', 'kunjungan-pimpinan')->name('kunjungan');
Route::get('/pelayanan/pemilu-pilkada', [TataPemerintahanController::class, 'show'])->defaults('slug', 'pemilu-pilkada')->name('pemilu');

// Pelayanan Hukum Publik
Route::get('/pelayanan/kerjasama-daerah', [PelayananHukumController::class, 'showPublik'])
    ->defaults('jenis', 'pelayanan_publik')->name('pelayanan.publik');
Route::get('/pelayanan/bantuan-hukum', [PelayananHukumController::class, 'showPublik'])
    ->defaults('jenis', 'bantuan_hukum')->name('pelayanan.bantuan-hukum');

// Humas & Kesra Publik
Route::get('/pelayanan/humas', [DokumenController::class, 'humasPublik'])->name('publik.humas.index');
Route::get('/pelayanan/kesra', [DokumenController::class, 'kesraPublik'])->name('kesra.publik');

Route::prefix('pelayanan')->group(function () {
    Route::view('/lppd', 'pages.pelayananlppd')->name('pelayananlppd');
});

Route::controller(BeritaController::class)->group(function () {
    Route::get('/berita-kota', 'index')->name('berita.index');
    Route::get('/berita-kota/{slug}', 'show')->name('berita.show');
});

// Tambahkan baris ini di routes/web.php
Route::get('/agenda-pimpinan', [AgendaController::class, 'tampilkanAgendaPublik'])->name('agenda.pimpinan');

Route::controller(GaleriController::class)->group(function () {
    Route::get('/galeri/photos', 'indexFoto')->name('publik.photos');
    Route::get('/galeri/video', 'indexVideo')->name('publik.video');
});

Route::prefix('informasi')->group(function () {
    // Publik
    Route::get('/penghargaan', [PenghargaanController::class, 'index'])->name('penghargaan');
    Route::get('/surat-edaran', [SuratEdaranController::class, 'index'])->name('surat.edaran');
    
    // Perbaikan Rute Download Publik (Memanggil Controller agar data $files terkirim)
    Route::get('/download', [DownloadController::class, 'indexPublik'])->name('download.index');
    
    Route::get('/informasi/hibah', [HibahController::class, 'indexPublik'])->name('hibah.index');
    Route::get('/dokumen-unduhan', [DokumenController::class, 'index'])->name('publik.dokumen.index');
});

    // Tambahkan baris ini di bagian paling bawah web.php
Route::get('/download', [App\Http\Controllers\DownloadController::class, 'indexPublik'])->name('download.publik');
    Route::view('/hibah', 'pages.hibah')->name('hibah.index');
    Route::get('/dokumen-unduhan', [DokumenController::class, 'index'])->name('publik.dokumen.index');




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

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('admin.dashboard');
        Route::get('/admin/dashboard', [AdminController::class, 'dashboardView'])->name('auth.admin');

        Route::get('/visi-misi-edit', [ProfilController::class, 'editVisiMisi'])->name('admin.visi-misi.edit');
        Route::post('/visi-misi-update', [ProfilController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
        Route::get('/profil-setda-edit', [ProfilController::class, 'editSetda'])->name('admin.profil-setda.edit');
        Route::post('/profil-setda-update', [ProfilController::class, 'updateSetda'])->name('admin.profil-setda.update');

        Route::get('/tupoksi-edit', [TupoksiController::class, 'editTupoksi'])->name('admin.tupoksi.edit');
        Route::post('/tupoksi-update', [TupoksiController::class, 'updateTupoksi'])->name('admin.tupoksi.update');

        Route::get('/analisis-kebijakan/edit', [AnalisisKebijakanController::class, 'edit'])->name('admin.analisis-kebijakan.edit');
        Route::post('/analisis-kebijakan/update', [AnalisisKebijakanController::class, 'update'])->name('admin.analisis-kebijakan.update');

        Route::get('/asisten-menu', function () { return view('auth.asisten-menu'); })->name('admin.asisten.menu');
        Route::get('/asisten-edit/{kode}', [AsistenController::class, 'edit'])->name('admin.asisten.edit');
        Route::post('/asisten-update/{kode}', [AsistenController::class, 'update'])->name('admin.asisten.update');

        Route::get('/struktur-edit', [StrukturOrganisasiController::class, 'edit'])->name('admin.struktur.edit');
        Route::post('/struktur-update', [StrukturOrganisasiController::class, 'update'])->name('admin.struktur.update');

        Route::get('/renstra/edit', [RenstraController::class, 'edit'])->name('admin.renstra.edit');
        Route::post('/renstra/update', [RenstraController::class, 'update'])->name('admin.renstra.update');

        Route::get('/perencanaan-menu', [RpdController::class, 'menuPerencanaan'])->name('admin.perencanaan.menu');
        Route::get('/sinkronisasi/edit', [RpdController::class, 'editSinkronisasi'])->name('admin.sinkronisasi.edit');
        Route::post('/sinkronisasi/update', [RpdController::class, 'updateSinkronisasi'])->name('admin.sinkronisasi.update');
        Route::get('/rpd/edit', [RpdController::class, 'edit'])->name('admin.rpd.edit');
        Route::post('/rpd/update', [RpdController::class, 'update'])->name('admin.rpd.update');
        Route::get('/fokus/edit', [RpdController::class, 'editFokus'])->name('admin.fokus.edit');
        Route::post('/fokus/update', [RpdController::class, 'updateFokus'])->name('admin.fokus.update');

        Route::post('/ganti-foto-sambutan', [AdminController::class, 'updateSambutan'])->name('admin.sambutan.update');
        Route::post('/ganti-foto-berita-utama', [AdminController::class, 'updateFotoBeritaUtama'])->name('admin.beritautama.update');
        Route::post('/ganti-foto-pejabat', [AdminController::class, 'updateFotoPejabat'])->name('admin.pejabat.update');

        Route::get('/kelola-berita', [AdminController::class, 'index'])->name('admin.berita.index');
        Route::post('/kelola-berita/store', [AdminController::class, 'store'])->name('admin.berita.store');
        Route::post('/berita/update/{id}', [AdminController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/delete/{id}', [AdminController::class, 'destroy'])->name('admin.berita.delete');

        Route::prefix('kelola-galeri')->group(function () {
            Route::get('/', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
            Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
            Route::post('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
            Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        });

        Route::prefix('dokumen')->group(function () {
            Route::get('/', [DokumenController::class, 'adminIndex'])->name('admin.dokumen.index');
            Route::post('/store', [DokumenController::class, 'store'])->name('admin.dokumen.store');
            Route::post('/update/{id}', [DokumenController::class, 'update'])->name('admin.dokumen.edit');
            Route::delete('/delete/{id}', [DokumenController::class, 'destroy'])->name('admin.dokumen.destroy');
        });

        // Pelaporan Admin
        Route::get('/pelaporan-menu', [PelaporanController::class, 'menuPelaporan'])->name('admin.pelaporan.menu');
        Route::get('/pelaporan/{jenis}/edit', [PelaporanController::class, 'edit'])->name('admin.pelaporan.edit');
        Route::post('/pelaporan/{jenis}/update', [PelaporanController::class, 'update'])->name('admin.pelaporan.update');
        Route::post('/pelaporan/{jenis}/store', [PelaporanController::class, 'store'])->name('admin.pelaporan.store');
        Route::delete('/pelaporan/{id}/destroy/{jenis}', [PelaporanController::class, 'destroy'])->name('admin.pelaporan.destroy');

        // Bagian Umum Admin
        Route::get('/alursurat/edit', [AlurSuratController::class, 'edit'])->name('admin.alursurat.edit');
        Route::post('/alursurat/update', [AlurSuratController::class, 'update'])->name('admin.alursurat.update');
        Route::get('/perlengkapan/edit', [PerlengkapanController::class, 'edit'])->name('admin.perlengkapan.edit');
        Route::post('/perlengkapan/update', [PerlengkapanController::class, 'update'])->name('admin.perlengkapan.update');

        // Bagian Organisasi Admin
        Route::get('/bagian-organisasi-menu', [BagianOrganisasiController::class, 'menu'])->name('admin.bagian-organisasi.menu');
        Route::get('/bagian-organisasi/{jenis}/edit', [BagianOrganisasiController::class, 'edit'])->name('admin.bagian-organisasi.edit');
        Route::post('/bagian-organisasi/{jenis}/update', [BagianOrganisasiController::class, 'update'])->name('admin.bagian-organisasi.update');

        // Perekonomian Admin
        Route::get('/perekonomian', [PerekonomianController::class, 'index'])->name('admin.perekonomian.index');
        Route::get('/perekonomian/{slug}/edit', [PerekonomianController::class, 'edit'])->name('admin.perekonomian.edit');
        Route::post('/perekonomian/{slug}/update', [PerekonomianController::class, 'update'])->name('admin.perekonomian.update');

        // Tata Pemerintahan Admin
        Route::get('/tatapemerintahan', [TataPemerintahanController::class, 'index'])->name('admin.tatapemerintahan.index');
        Route::get('/tatapemerintahan/{slug}/edit', [TataPemerintahanController::class, 'edit'])->name('admin.tatapemerintahan.edit');
        Route::post('/tatapemerintahan/{slug}/update', [TataPemerintahanController::class, 'update'])->name('admin.tatapemerintahan.update');

        // Pelayanan Hukum Admin
        Route::get('/pelayanan-hukum-menu', [PelayananHukumController::class, 'menu'])->name('admin.pelayanan-hukum.menu');
        Route::get('/pelayanan-hukum/{jenis}/edit', [PelayananHukumController::class, 'edit'])->name('admin.pelayanan-hukum.edit');
        Route::post('/pelayanan-hukum/{jenis}/update', [PelayananHukumController::class, 'update'])->name('admin.pelayanan-hukum.update');
   
        // Admin Penghargaan
Route::get('/admin/penghargaan', [PenghargaanController::class, 'adminIndex'])->name('admin.penghargaan.index');
Route::post('/admin/penghargaan/store', [PenghargaanController::class, 'store'])->name('admin.penghargaan.store');
Route::post('/admin/penghargaan/update/{id}', [PenghargaanController::class, 'update'])->name('admin.penghargaan.update');
Route::delete('/admin/penghargaan/delete/{id}', [PenghargaanController::class, 'destroy'])->name('admin.penghargaan.destroy');

// Admin Surat Edaran
Route::get('/admin/surat-edaran', [SuratEdaranController::class, 'adminIndex'])->name('admin.surat.index');
Route::post('/admin/surat-edaran/store', [SuratEdaranController::class, 'store'])->name('admin.surat.store');
Route::post('/admin/surat-edaran/update/{id}', [SuratEdaranController::class, 'update'])->name('admin.surat.update');
Route::delete('/admin/surat-edaran/delete/{id}', [SuratEdaranController::class, 'destroy'])->name('admin.surat.destroy');

Route::get('/download/edit', [DownloadController::class, 'indexAdmin'])->name('admin.download.edit');
Route::post('/download/store', [DownloadController::class, 'store'])->name('admin.download.store');
Route::delete('/download/{id}', [DownloadController::class, 'destroy'])->name('admin.download.destroy');
        
Route::get('/admin/hibah', [HibahController::class, 'indexAdmin'])->name('admin.hibah.edit');
Route::post('/admin/hibah/store', [HibahController::class, 'store'])->name('admin.hibah.store');
Route::delete('/admin/hibah/{id}', [HibahController::class, 'destroy'])->name('admin.hibah.destroy');

    Route::get('/kelola-berita', [BeritaController::class, 'adminIndex'])->name('admin.berita.index');
    Route::post('/kelola-berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');
    Route::get('/berita/edit/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
});


 Route::prefix('staff')->group(function () {
        // Menggunakan Controller lebih disarankan daripada function closure
        Route::get('/agenda', [AgendaController::class, 'index'])->name('staff.agenda.index');
        Route::post('/agenda', [AgendaController::class, 'store'])->name('staff.agenda.store');
        Route::post('/agenda/update/{id}', [AgendaController::class, 'update'])->name('staff.agenda.update');
        Route::get('/agenda/delete/{id}', [AgendaController::class, 'delete'])->name('staff.agenda.delete');
    });

    Route::prefix('staff')->group(function () {
        // Hanya untuk role 'bagian_pelayanan'
        Route::get('/berita', [BeritaController::class, 'index'])->name('staff.berita.index');
        Route::post('/berita/store', [BeritaController::class, 'store'])->name('staff.berita.store');
        Route::delete('/berita/destroy/{id}', [BeritaController::class, 'destroy'])->name('staff.berita.destroy');
    });
    
});