<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    protected $table = 'asistens'; // Pastikan sesuai dengan nama tabel di DB

    // Tambahkan semua kolom yang ada di form Anda ke dalam array ini
    protected $fillable = [
        'kode_asisten', 
        'nama_pejabat', 
        'tugas_fungsi', 
        'foto'
    ];
}