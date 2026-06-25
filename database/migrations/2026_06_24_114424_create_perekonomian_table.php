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
    Schema::create('perekonomian', function (Blueprint $table) {
        $table->id();
        $table->string('slug'); // Contoh: 'bumd', 'tpid', 'tp2d', 'umkm'
        $table->string('judul'); 
        $table->text('konten')->nullable();
        $table->string('file_pdf')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perekonomian');
    }
};
