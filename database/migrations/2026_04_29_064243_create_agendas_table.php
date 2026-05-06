<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); // Senin, Selasa, dll
            $table->date('tanggal'); // 2026-04-29
            $table->text('nama_kegiatan');
            $table->time('jam')->nullable(); // Opsional
            $table->string('lokasi')->nullable(); // Opsional
            $table->timestamps(); // create_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};