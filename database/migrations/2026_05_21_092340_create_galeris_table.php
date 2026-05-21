<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('tipe', ['foto', 'video']);
            $table->string('kategori'); // pelayanan, sosialisasi, agenda
            $table->string('sumber');   // nama file foto ATAU id/link youtube video
            $table->timestamps();
        });
    }
};
