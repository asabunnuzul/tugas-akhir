<?php

use App\Models\Kehadiran;
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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Kehadiran::create(['nama' => 'Hadir']);
        Kehadiran::create(['nama' => 'Sakit']);
        Kehadiran::create(['nama' => 'Izin']);
        Kehadiran::create(['nama' => 'Alpha']);
        Kehadiran::create(['nama' => 'Bolos']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
