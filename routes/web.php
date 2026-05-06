<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;

// 1. Route Halaman Utama (Home)
Route::get('/', function () {
    return view('home');
}); // <-- Pastikan ada tutup kurung dan titik koma di sini

// 2. Route Untuk Berita Kota (Daftar Berita)
Route::get('/berita-kota', [BeritaController::class, 'index'])->name('berita.index');

// 3. Route Untuk Detail Berita (Berdasarkan Slug)
Route::get('/berita-kota/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Pastikan URL-nya sama dengan yang ada di link menu kamu
Route::get('/agenda-pimpinan', [AgendaController::class, 'index'])->name('agenda.pimpinan');

Route::get('/tentang/visi-misi', function () {
    return view('pages.visi-misi');
})->name('visi-misi');

Route::get('/tupoksi', function () {
    return view('pages.tupoksi');
})->name('tupoksi');

Route::get('/analis-kebijakan', function () {
    return view('pages.analis-kebijakan');
})->name('analis-kebijakan');

Route::get('/asda-1', function () {
    return view('pages.asda1');
})->name('asda1');

Route::get('/asda-2', function () {
    return view('pages.asda2');
})->name('asda2');

Route::get('/asda-3', function () {
    return view('pages.asda3');
})->name('asda3');

Route::get('/struktur-organisasi', function () {
    return view('pages.struktur');
})->name('struktur');

Route::get('/program/renstra', function () {
    return view('pages.renstra');
})->name('renstra');

Route::get('/program/rpd', function () {
    return view('pages.rpd');
})->name('rpd');


Route::get('/program/fokus-utama', function () {
    // Karena nama filenya fokusutama.blade.php
    return view('pages.fokusutama'); 
})->name('fokus_utama');

Route::get('/program/sinkronisasi', function () {
    return view('pages.sinkronisasi');
})->name('sinkronisasi');

Route::get('/program/lakip', function () {
    return view('pages.lakip');
})->name('lakip');

// Halaman LPPD (File: lpdd.blade.php)
    Route::get('/lppd', function () {
        return view('pages.lppd');
    })->name('lppd');

Route::get('/program/spm', function () {
    return view('pages.spm');
})->name('spm');

// Route untuk halaman Alur Surat
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
    // Pastikan menggunakan 'pages.kerjasama' (sesuai folder.nama_file)
    return view('pages.kerjasama'); 
})->name('kerjasama');

Route::get('/pelayanan/bantuan-hukum', function () {
    return view('pages.bantuanhukum');
})->name('bantuanhukum');