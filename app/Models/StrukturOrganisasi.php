<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    // Menentukan kolom apa saja yang boleh diisi secara massal
    protected $fillable = [
        'gambar_struktur', 
        'keterangan'
    ];
}