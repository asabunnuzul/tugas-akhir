<?php

use App\Livewire\Siswa\CekNilai;
use App\Livewire\Siswa\InputJurnal;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:Admin|Pembimbing|Ketua|Sekretaris|Hubin|Siswa'])
->group(function(){
        Route::get('input-jurnal', InputJurnal::class)->name('input-jurnal')->lazy();
        Route::get('cek-nilai', CekNilai::class)->name('cek-nilai')->lazy();
});
