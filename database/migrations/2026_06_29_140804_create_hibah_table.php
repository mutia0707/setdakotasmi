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
    Schema::create('hibah', function (Blueprint $table) {
        $table->id();
        $table->string('judul');      // Nama dokumen
        $table->string('file_path');  // Lokasi file di storage
        $table->timestamps();         // created_at dan updated_at
    });
}

public function down()
{
    Schema::dropIfExists('hibah');
}
};
