<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up() {
    Schema::create('renstras', function (Blueprint $table) {
        $table->id();
        $table->text('deskripsi');
        $table->text('tujuan_strategis'); // Simpan per poin dengan enter
        $table->string('file_pdf')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renstras');
    }
};
