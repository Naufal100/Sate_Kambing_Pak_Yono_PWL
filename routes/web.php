<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AdminController::class, 'viewLoginAdmin']);
Route::post('/login', [AdminController::class, 'prosesLoginAdmin']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/menu', [DashboardController::class, 'kelolaMenu']);
Route::get('/dashboard/pesanan', [DashboardController::class, 'kelolaPesanan']);
Route::get('/dashboard/saran', [DashboardController::class, 'kelolaSaran']);
Route::get('/dashboard/profil', [DashboardController::class, 'profil']);

Route::get('/logout', [AdminController::class, 'logoutAdmin']);
