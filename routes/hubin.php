<?php

use App\Livewire\Hubin\AbsensiSiswa;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:Admin|Pembimbing|Ketua|Sekretaris|Hubin'])
->group(function(){
        Route::get('absensi-siswa', AbsensiSiswa::class)->name('absensi-siswa')->lazy();
});
