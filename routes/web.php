<?php

use App\Livewire\Dashboard;
use App\Livewire\Auth\Logout;
use App\Livewire\ProfilePengguna;
use Illuminate\Support\Facades\Route;



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('profile-pengguna', ProfilePengguna::class)->name('profile-pengguna');
Route::post('logout', Logout::class)->name('logout');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/hubin.php';
require __DIR__ . '/pembimbing.php';
