<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/reset-visit', [DashboardController::class, 'reset']);
Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/search-layanan', [LayananController::class, 'search']);
Route::view('/tentang', 'tentang');
