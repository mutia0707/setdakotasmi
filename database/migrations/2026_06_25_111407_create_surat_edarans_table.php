<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('surat_ederans', function (Blueprint $table) {
            $table->date('tanggal')->nullable()->after('nomor');
        });

        // Isi tanggal untuk data lama (yang sebelumnya cuma punya kolom 'tahun')
        // supaya tidak null, pakai tanggal 1 Januari tahun tersebut.
        if (Schema::hasColumn('surat_ederans', 'tahun')) {
            DB::table('surat_ederans')->whereNull('tanggal')->get()->each(function ($row) {
                if ($row->tahun) {
                    DB::table('surat_ederans')->where('id', $row->id)->update([
                        'tanggal' => $row->tahun . '-01-01',
                    ]);
                }
            });

            Schema::table('surat_ederans', function (Blueprint $table) {
                $table->dropColumn('tahun');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('surat_ederans', function (Blueprint $table) {
            $table->string('tahun')->nullable();
        });

        Schema::table('surat_ederans', function (Blueprint $table) {
            $table->dropColumn('tanggal');
        });
    }
};