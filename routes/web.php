<?php

use App\Models\Agenda;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\DB;

// 1. Route Halaman Utama (Home)
Route::get('/', function () {
    return view('home');
})->name('home');

// 2. Route Untuk Berita Kota (Hanya untuk Melihat Berita)
Route::get('/berita-kota', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita-kota/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// 3. Route Agenda Pimpinan
Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');

// 4. Profil & Tentang
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

// 5. Bidang ASDA
Route::get('/asda-1', function () {
    return view('pages.asda1');
})->name('asda1');

Route::get('/asda-2', function () {
    return view('pages.asda2');
})->name('asda2');

Route::get('/asda-3', function () {
    return view('pages.asda3');
})->name('asda3');

// 6. Program & Kegiatan
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

// 7. Pelayanan
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

// 8. Galeri (Sisi User)
Route::get('/galeri/photos', function () {
    return view('pages.photos');
})->name('photos');

Route::get('/galeri/video', function () {
    return view('pages.video');
})->name('video');

Route::get('/galeri-foto', [BeritaController::class, 'galeriFoto'])->name('galeri.foto');
Route::get('/galeri-video', [BeritaController::class, 'galeriVideo'])->name('galeri.video');

// 9. Informasi
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


/*
|--------------------------------------------------------------------------
| AREA LOGIN & PROTEKSI
|--------------------------------------------------------------------------
*/

// Pintu Masuk Login
Route::get('/pintu-setda', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/pintu-setda', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// AREA AMAN: Harus Login Baru Bisa Akses Rute di Bawah Ini
Route::middleware(['auth'])->group(function () {

    Route::post('/upload-berita-sekarang', [BeritaController::class, 'store'])->name('admin.berita.store');

    // === Akses Admin ===
    Route::prefix('admin')->group(function () {
        
        // Halaman Utama Panel Kendali Admin
        Route::get('/dashboard', function () {
            if (strtolower(auth()->user()->role) !== 'admin') {
                return redirect('/pintu-setda')->withErrors('Akses Ditolak: Khusus Admin');
            }
            $beritas = DB::table('beritas')->orderBy('id', 'desc')->get(); 
            return view('auth.admin', compact('beritas'));
        })->name('auth.admin');

        // BARIS BARU: Route untuk membuka halaman khusus kelola berita mandiri
        Route::get('/kelola-berita', [BeritaController::class, 'adminBerita'])->name('admin.berita.index');

        // Proses Pembaruan & Hapus Berita Kota (Tetap Utuh)
        Route::post('/berita/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
        Route::get('/berita/delete/{id}', [BeritaController::class, 'delete'])->name('admin.berita.delete');
        // Jalur Baru Form Kelola Galeri Mandiri (Biar tidak 404 saat diklik)
        Route::prefix('kelola-galeri')->group(function () {
            Route::get('/', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
            Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
            Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        });
    });

    // === Akses Staff ===
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

    // Fitur CRUD Galeri Foto & Video mandiri
        Route::prefix('kelola-galeri')->group(function () {
            Route::get('/', [GaleriController::class, 'adminGaleri'])->name('admin.galeri.index');
            Route::post('/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
            Route::post('/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update'); // <-- TAMBAHKAN BARIS INI
            Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('admin.galeri.delete');
        });
});