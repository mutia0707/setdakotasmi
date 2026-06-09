<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSetda extends Model
{
    // 1. Tentukan nama tabel di database agar tidak error
    protected $table = 'profil_setda';

    // 2. Tentukan kolom apa saja yang boleh diisi (Mass Assignment)
    protected $fillable = ['isi_profil'];

    // 3. (Opsional) Jika tidak menggunakan kolom created_at/updated_at di database, set ke false
    // public $timestamps = false; 
}