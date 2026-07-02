<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'bagian', 'file_pdf'];
    protected $casts = [
    'created_at' => 'datetime',
];
}