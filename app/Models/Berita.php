<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel database kamu
    protected $table = 'beritas';

    // WAJIB DAFTARKAN SEMUA KOLOM INI BIAR GAK DIBUANG SAMA LARAVEL
    protected $fillable = [
        'judul', 
        'slug', 
        'isi_berita', 
        'gambar', 
        'tanggal_publish'
    ];
}