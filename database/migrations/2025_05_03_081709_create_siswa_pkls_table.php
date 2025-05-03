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
        Schema::create('siswa_pkls', function (Blueprint $table) {
            $table->id();
            $table->string('tahun', 15)->index();
            $table->tinyInteger('kelas_id')->index();
            $table->string('nis', 15)->index();
            $table->foreignId('hubin_id')->index();
            $table->foreignId('user_hubin_id')->index();
            $table->foreignId('pembimbing_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_pkls');
    }
};
