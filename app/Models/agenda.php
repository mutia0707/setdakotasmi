<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'agendas';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'hari',
        'tanggal',
        'nama_kegiatan',
        'jam',
        'lokasi'
    ];
}