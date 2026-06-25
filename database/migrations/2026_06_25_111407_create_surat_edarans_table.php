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
    Schema::create('surat_ederans', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('nomor')->nullable();
        $table->string('tahun');
        $table->string('file_pdf')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('surat_ederans');
}
};
