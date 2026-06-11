<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalisisKebijakan extends Model
{
    // Ini kuncinya agar Laravel tidak mencari tabel jamak (pakai 's')
    protected $table = 'analisis_kebijakan'; 

    protected $fillable = ['tupoksi_utama', 'rincian_tugas'];
}