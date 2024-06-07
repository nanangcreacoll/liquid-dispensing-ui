<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DispensingDataController;

Route::redirect('/', '/kendali');

Route::get('/kendali', [DispensingDataController::class, 'kendaliView'])->name('kendali')->middleware('auth');
Route::get('/riwayat', [DispensingDataController::class, 'riwayatView'])->name('riwayat')->middleware('auth');
Route::post('/store', [DispensingDataController::class, 'store'])->name('dispensing-data-store')->middleware('auth');
Route::post('/publish', [DispensingDataController::class, 'publish'])->name('dispensing-data-publish')->middleware('auth');


Route::get('/login', [UserController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'loginAuth'])->name('login-auth');
Route::post('/logout', [UserController::class, 'logoutAuth'])->name('logout-auth')->middleware('auth');
