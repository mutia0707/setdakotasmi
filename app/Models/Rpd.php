<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rpd extends Model
{
    // Tambahkan 'fokus_utama' ke array $fillable agar bisa di-update
    protected $fillable = [
        'deskripsi', 
        'tujuan_strategis', 
        'file_pdf', 
        'fokus_utama', 
        'sinkronisasi'
    ];
}