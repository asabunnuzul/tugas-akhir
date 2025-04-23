<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:Pembimbing|Ketua|Sekretaris'])
->group(function(){
//
});
