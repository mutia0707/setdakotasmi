<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul', 
        'slug', 
        'isi_berita',      // Sesuaikan dengan yang disimpan di controller
        'gambar', 
        'bagian',          // Menyimpan nama bagian (ASDA 1, dll)
        'user_id',         // <--- WAJIB DITAMBAHKAN AGAR ID USER TERSIMPAN
        'tanggal_publish'
    ];

    /**
     * Relasi ke tabel User untuk memanggil nama uploader secara otomatis
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}