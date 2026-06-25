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
    Schema::create('tata_pemerintahan', function (Blueprint $table) {
        $table->id();
        $table->string('slug');
        $table->string('judul')->nullable();
        $table->text('konten')->nullable();
        $table->string('file_pdf')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tata_pemerintahan');
}
};
