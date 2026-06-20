<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renstra extends Model
{
    // Menentukan nama tabel yang sesuai di database
    protected $table = 'renstras';

    // Mendefinisikan kolom mana saja yang boleh diisi melalui form
    protected $fillable = [
        'deskripsi', 
        'tujuan_strategis', 
        'file_pdf'
    ];
}