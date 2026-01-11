<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesanController;

Route::get('/login', [AdminController::class, 'viewLoginAdmin']);
Route::post('/login', [AdminController::class, 'prosesLoginAdmin']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/menu', [DashboardController::class, 'kelolaMenu']);
Route::get('/dashboard/pesanan', [DashboardController::class, 'kelolaPesanan']);
Route::get('/dashboard/saran', [DashboardController::class, 'kelolaSaran']);
Route::get('/dashboard/profil', [DashboardController::class, 'profil']);

Route::resource('dashboard/pesan', PesanController::class);
// Tambahan: expose route tanpa prefix 'dashboard' sehingga /pesan mengarah ke CRUD yang sama
Route::resource('pesan', PesanController::class);

Route::get('/logout', [AdminController::class, 'logoutAdmin']);
