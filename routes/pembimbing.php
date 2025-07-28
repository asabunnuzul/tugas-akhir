<?php

use App\Http\Controllers\Pembimbing\PrintNilaiController;
use App\Livewire\Pembimbing\AturSiswaPkl;
use App\Livewire\Pembimbing\AturSiswaPklEdit;
use App\Livewire\Pembimbing\BiodataSiswa;
use App\Livewire\Pembimbing\CekJurnal;
use App\Livewire\Pembimbing\DataHubin;
use App\Livewire\Pembimbing\DataHubinEdit;
use App\Livewire\Pembimbing\DataSiswaPkl;
use App\Livewire\Pembimbing\InputNilai;
use App\Livewire\Pembimbing\PrintNilai;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:Admin|Pembimbing|Ketua|Sekretaris'])
->group(function(){
        Route::get('atur-siswa-pkl', AturSiswaPkl::class)->name('atur-siswa-pkl')->lazy();
        Route::get('atur-siswa-pkl/{id}', AturSiswaPklEdit::class)->name('edit-siswa-pkl')->lazy();
        Route::get('biodata-siswa', BiodataSiswa::class)->name('biodata-siswa')->lazy();
        Route::get('cek-jurnal', CekJurnal::class)->name('cek-jurnal')->lazy();
        Route::get('data-hubin', DataHubin::class)->name('data-hubin')->lazy();
        Route::get('data-hubin/edit/{id}', DataHubinEdit::class)->name('data-hubin.edit')->lazy();
        Route::get('data-siswa-pkl', DataSiswaPkl::class)->name('data-siswa-pkl')->lazy();
        Route::get('input-nilai', InputNilai::class)->name('input-nilai')->lazy();
        Route::get('print-nilai', PrintNilai::class)->name('print-nilai')->lazy();

        Route::get('print-nilai/print', PrintNilaiController::class)->name('print-nilai.print');
});
