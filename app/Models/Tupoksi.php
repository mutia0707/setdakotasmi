<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tupoksi extends Model
{
    protected $table = 'tupoksis';
    protected $fillable = ['tupoksi']; // Harus 'tupoksi' sesuai screenshot
    public $timestamps = true; // Karena di screenshot ada updated_at & created_at, ubah ke true
}