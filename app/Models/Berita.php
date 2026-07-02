<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul', 
        'slug', 
        'isi',           // Sesuaikan dengan controller (tadi kita pakai 'isi')
        'gambar', 
        'bagian',        // WAJIB ditambah agar bisa tersimpan
        'tanggal_publish'
    ];
}