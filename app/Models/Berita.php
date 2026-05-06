<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // SESUAIKAN DENGAN GAMBAR PHPMYADMIN KAMU:
    protected $table = 'berita_kota'; 

    protected $fillable = ['judul', 'isi', 'gambar', 'pejabat'];
}