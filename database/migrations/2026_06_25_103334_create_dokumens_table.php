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
    Schema::create('dokumens', function (Blueprint $table) {
        $table->id();
        $table->string('bagian')->nullable(); // 'humas', 'kesra', dll
        $table->string('judul')->nullable();
        $table->string('file')->nullable();
        $table->string('tipe')->nullable(); // 'foto', 'dokumen', dll
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('dokumens');
}
};
