<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('edit_locks', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');      // contoh: 'beritas', 'agendas'
            $table->unsignedBigInteger('record_id');
            $table->foreignId('locked_by')->constrained('users')->cascadeOnDelete();
            $table->timestamp('locked_at');
            $table->timestamps();
            $table->unique(['table_name', 'record_id']); // 1 baris data cuma bisa 1 lock aktif
        });
    }
    public function down() {
        Schema::dropIfExists('edit_locks');
    }
};