<?php

use App\Http\Controllers\DispensingDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kendali', [DispensingDataController::class, 'index'])->name('kendali');