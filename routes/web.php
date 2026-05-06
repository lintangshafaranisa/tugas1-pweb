<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::view('/layanan', 'layanan');
Route::view('/tentang', 'tentang');
//Route::get('/hitung/{a}/{b}', function ($a, $b) {
//     return $a + $b;
// });
