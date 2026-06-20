<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('struktur_organisasis', function (Blueprint $table) {
        $table->id();
        $table->string('gambar_struktur')->nullable(); // Untuk menyimpan path gambar bagan
        $table->text('keterangan')->nullable();        // Untuk teks di bawah bagan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasis');
    }
};
