<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis'); // 'lkip', 'lppd', 'spm'
            $table->text('deskripsi')->nullable();
            $table->string('file_pdf')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('pelaporans');
    }
};