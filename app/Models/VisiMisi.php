<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    // Pastikan Laravel tahu nama tabelnya
    protected $table = 'visi_misi';

    // Izinkan kolom-kolom ini diisi
    protected $fillable = ['visi', 'misi'];
    
    // Matikan timestamps jika tabelmu tidak punya kolom created_at/updated_at
    public $timestamps = true; 
}