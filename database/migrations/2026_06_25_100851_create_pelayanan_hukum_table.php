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
    Schema::create('pelayanan_hukums', function (Blueprint $table) {
        $table->id();
        $table->string('jenis'); // 'pelayanan_publik', 'bantuan_hukum'
        $table->text('deskripsi')->nullable();
        $table->string('file_pdf')->nullable();
        $table->timestamps();
    });
}

public function down() {
    Schema::dropIfExists('pelayanan_hukums');
}
};
