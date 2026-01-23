<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganAuthController;
use App\Http\Controllers\MenuController;


// IMPORT CONTROLLER BARU (Langsung dari folder Controllers utama)
use App\Http\Controllers\SaranAdminController;
use App\Http\Controllers\SaranPelangganController;
use App\Http\Controllers\PesananController;

// --- AUTH ADMIN ---
Route::get('/login', [AdminController::class, 'viewLoginAdmin']);
Route::post('/login', [AdminController::class, 'prosesLoginAdmin']);
Route::get('/logout', [AdminController::class, 'logoutAdmin']);

// --- DASHBOARD ADMIN ---
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/pesanan', [DashboardController::class, 'kelolaPesanan']);
    Route::get('/pelanggan', [DashboardController::class, 'kelolaPelanggan']);
    Route::get('/profil', [DashboardController::class, 'profil']);

    // --> ROUTE SARAN ADMIN (Pakai Controller SaranAdminController)
    Route::get('/saran', [SaranAdminController::class, 'index']);
    Route::delete('/saran/{id}', [SaranAdminController::class, 'destroy']);

    // Fitur Admin Lainnya
    Route::get('/profil/edit', [DashboardController::class, 'editProfil']);
    Route::post('/profil/update', [DashboardController::class, 'updateProfil']);
    Route::get('/daftaradmin', [DashboardController::class, 'daftarAdmin']);
    Route::get('/admins/create', [DashboardController::class, 'createAdmin']);
    Route::post('/admins', [DashboardController::class, 'simpanAdmin']);
    Route::post('/admins/{id}/delete', [DashboardController::class, 'deleteAdmin']);
    Route::get('/pelanggan/{id}/edit', [DashboardController::class, 'editPelanggan']);
    Route::post('/pelanggan/{id}/update', [DashboardController::class, 'updatePelanggan']);
    Route::post('/pelanggan/{id}/delete', [DashboardController::class, 'deletePelanggan']);
});

// --- ROUTES PESANAN ---
Route::get('/pesanan/create', [PesananController::class, 'create']);
Route::post('/pesanan', [PesananController::class, 'store']);
Route::get('/pesanan/{id}', [PesananController::class, 'show']);
Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit']);
Route::post('/pesanan/{id}', [PesananController::class, 'update']);
Route::post('/pesanan/{id}/delete', [PesananController::class, 'destroy']);

// --- ROUTES PESAN LANGSUNG (PELANGGAN) ---
Route::get('/pesan/langsung/{menuId}', [PesananController::class, 'pesanLangsung']);
Route::post('/pesan/langsung/{menuId}', [PesananController::class, 'pesanLangsungSimpan']);
Route::get('/pesanan-berhasil/{id}', [PesananController::class, 'pesananBerhasil']);

// --- HALAMAN DEPAN ---
Route::get('/', [HomeController::class, 'index']);

// --- AUTH PELANGGAN ---
Route::get('/login-pelanggan', [PelangganAuthController::class, 'viewLogin']);
Route::post('/login-pelanggan', [PelangganAuthController::class, 'prosesLogin']);
Route::get('/register-pelanggan', [PelangganAuthController::class, 'viewRegister']);
Route::post('/register-pelanggan', [PelangganAuthController::class, 'prosesRegister']);
Route::get('/logout-pelanggan', [PelangganAuthController::class, 'logout']);

// --> ROUTE SARAN PELANGGAN (Pakai Controller SaranPelangganController)
Route::middleware(['web'])->group(function () {
    Route::get('/saran', [SaranPelangganController::class, 'index']);
    Route::post('/saran', [SaranPelangganController::class, 'store']);
    Route::put('/saran/{id}', [SaranPelangganController::class, 'update']);
    Route::delete('/saran/{id}', [SaranPelangganController::class, 'destroy']);
});
