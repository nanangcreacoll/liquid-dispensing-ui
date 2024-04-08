<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DispensingDataController;

Route::redirect('/', '/kendali');

Route::get('/kendali', [DispensingDataController::class, 'kendaliView'])->name('kendali')->middleware('auth');
Route::get('/riwayat', [DispensingDataController::class, 'riwayatView'])->name('riwayat')->middleware('auth');
Route::post('/dispensing-data', [DispensingDataController::class]);

Route::get('/login', [UserController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'loginAuth'])->name('login-auth');
Route::post('/logout', [UserController::class, 'logoutAuth'])->name('logout-auth');