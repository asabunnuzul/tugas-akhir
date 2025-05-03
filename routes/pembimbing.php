<?php

use App\Livewire\Pembimbing\AturSiswaPkl;
use App\Livewire\Pembimbing\BiodataSiswa;
use App\Livewire\Pembimbing\DataHubin;
use App\Livewire\Pembimbing\DataSiswaPkl;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:Admin|Pembimbing|Ketua|Sekretaris'])
->group(function(){
        Route::get('atur-siswa-pkl', AturSiswaPkl::class)->name('atur-siswa-pkl')->lazy();
        Route::get('biodata-siswa', BiodataSiswa::class)->name('biodata-siswa')->lazy();
        Route::get('data-hubin', DataHubin::class)->name('data-hubin')->lazy();
        Route::get('data-siswa-pkl', DataSiswaPkl::class)->name('data-siswa-pkl')->lazy();
});
