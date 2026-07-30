<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $tables = ['beritas', 'agendas', 'dokumens', 'users', 'galeris'];
    // tambahkan nama tabel lain di sini sesuai kebutuhan

    public function up() {
        foreach ($this->tables as $table) {
            if (Schema::hasColumn($table, 'updated_by')) continue;
            Schema::table($table, function (Blueprint $t) {
                $t->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            });
        }
    }
    public function down() {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->dropConstrainedForeignId('updated_by');
            });
        }
    }
};