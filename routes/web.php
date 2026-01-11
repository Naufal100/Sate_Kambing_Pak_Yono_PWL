<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;

Route::get('/login', [AdminController::class, 'viewLoginAdmin']);
Route::post('/login', [AdminController::class, 'prosesLoginAdmin']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/dashboard/menu', [DashboardController::class, 'kelolaMenu']);
Route::get('/dashboard/pesanan', [PesananController::class, 'index']);
Route::get('/dashboard/saran', [DashboardController::class, 'kelolaSaran']);
Route::get('/dashboard/profil', [DashboardController::class, 'profil']);

// Routes untuk CRUD Pesanan
Route::get('/pesanan/create', [PesananController::class, 'create']);
Route::post('/pesanan', [PesananController::class, 'store']);
Route::get('/pesanan/{id}', [PesananController::class, 'show']);
Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit']);
Route::put('/pesanan/{id}', [PesananController::class, 'update']);
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy']);

Route::get('/logout', [AdminController::class, 'logoutAdmin']);
