<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DispensingDataController;

Route::redirect('/', '/kendali');

Route::get('/kendali', [DispensingDataController::class, 'index'])->name('kendali')->middleware('auth');
Route::get('/riwayat', [DispensingDataController::class, 'riwayatView'])->name('riwayat')->middleware('auth');
Route::get('/login', [UserController::class, 'loginView'])->name('login')->middleware('guest');
Route::post('/login-view', [UserController::class, 'loginAuth'])->name('login-auth');
Route::post('/logout-view', [UserController::class, 'logoutAuth'])->name('logout-auth');