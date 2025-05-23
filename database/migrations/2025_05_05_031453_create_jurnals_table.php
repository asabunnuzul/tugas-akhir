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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('tahun', 30)->index();
            $table->date('tanggal')->index();
            $table->foreignId('nis')->index();
            $table->foreignId('kelas_id')->index();
            $table->foreignId('hubin_id')->index();
            $table->foreignId('pembimbing_id')->index();
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals');
    }
};
