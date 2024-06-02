<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cari Pesanan Route
Route::get('/cari-{kodePesanan}', [PesananController::class, 'getPesananByCode'])->name('search.pesanan');

// Auth Routes
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

// Admin Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('pesanan.log');
        Route::get('/pesanan', [AdminController::class, 'getPesanan'])->name('pesanan.data');
        Route::get('/view-tambah', [AdminController::class, 'inputView'])->name('pesanan.tambah');
        Route::post('/store', [AdminController::class, 'storePesanan'])->name('pesanan.store');
        Route::get('/complete/{id}', [AdminController::class, 'completePesanan'])->name('pesanan.complete');
        Route::post('/update/{id}', [AdminController::class, 'updatePesanan'])->name('pesanan.update');
        Route::get('/destroy/{id}', [AdminController::class, 'destroyPesanan'])->name('pesanan.destroy');
    });
});
