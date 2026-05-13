<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('layanan', LayananController::class);
Route::view('/tentang', 'tentang');


