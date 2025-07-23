<?php

use App\Http\Controllers\Admin\UploadDataSiswaSimpanController;
use App\Livewire\Admin\AturKategoriNilai;
use App\Livewire\Admin\BuatRole;
use App\Livewire\Admin\DataKelas;
use App\Livewire\Admin\DataUser;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\TambahUser;
use App\Livewire\Admin\UploadDataSiswa;

Route::middleware(['auth','role:Admin'])
->group(function(){
    Route::get('atur-kategori-nilai', AturKategoriNilai::class)->name('atur-kategori-nilai')->lazy();
    Route::get('buat-role', BuatRole::class)->name('buat-role')->lazy();
    Route::get('data-kelas', DataKelas::class)->name('data-kelas')->lazy();
    Route::get('data-user', DataUser::class)->name('data-user')->lazy();
    Route::get('tambah-user', TambahUser::class)->name('tambah-user')->lazy();
    Route::get('tambah-user', TambahUser::class)->name('tambah-user')->lazy();
    Route::get('upload-data-siswa', UploadDataSiswa::class)->name('upload-data-siswa')->lazy();
    Route::post('upload-data-siswa-simpan', UploadDataSiswaSimpanController::class)->name('upload-data-siswa-simpan');
});
