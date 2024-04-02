<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DispensingDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kendali', [DispensingDataController::class, 'index'])->name('kendali');
Route::get('/riwayat', [DispensingDataController::class, 'riwayatView'])->name('riwayat');
Route::get('/login', [UserController::class, 'loginView'])->name('login');