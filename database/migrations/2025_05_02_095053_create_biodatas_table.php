<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 15)->index();
            $table->string('nisn', 30)->nullable();
            $table->string('nik', 40)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('pekerjaan_ayah', 100)->nullable();
            $table->string('penghasilan_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('pekerjaan_ibu', 100)->nullable();
            $table->string('penghasilan_ibu', 100)->nullable();
            $table->string('nama_wali', 100)->nullable();
            $table->string('pekerjaan_wali', 100)->nullable();
            $table->string('penghasilan_wali', 100)->nullable();
            $table->string('telepon', 30)->nullable();
            $table->string('telepon_wali', 30)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('desa', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->timestamps();
        });

        Role::create([
            'name' => 'Siswa',
            'guard_name' => 'web'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
