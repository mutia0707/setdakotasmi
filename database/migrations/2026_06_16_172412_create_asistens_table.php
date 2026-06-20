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
    Schema::create('asistens', function (Blueprint $table) {
        $table->id();
        $table->string('kode_asisten'); // 'asda1', 'asda2', atau 'asda3'
        $table->string('nama_pejabat')->nullable();
        $table->text('tugas_fungsi')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistens');
    }
};
