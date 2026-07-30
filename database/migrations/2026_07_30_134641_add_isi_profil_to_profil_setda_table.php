<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_setda', function (Blueprint $table) {
            $table->longText('isi_profil')->nullable()->after('nama');
        });
    }

    public function down(): void
    {
        Schema::table('profil_setda', function (Blueprint $table) {
            $table->dropColumn('isi_profil');
        });
    }
};