<?php

use App\Http\Controllers\BukuController;

Route::get('/', [BukuController::class, 'index']);
Route::resource('buku', BukuController::class);

