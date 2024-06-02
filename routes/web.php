<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'authLogin']);

// Admin Dashboard Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('pesanan.log');
    Route::get('/pesanan', [AdminController::class, 'getPesanan'])->name('pesanan.data');
    Route::get('/view-tambah', [AdminController::class, 'inputView'])->name('pesanan.tambah');
    Route::post('/store', [AdminController::class, 'storePesanan'])->name('pesanan.store');
    Route::get('/complete/{id}', [AdminController::class, 'completePesanan'])->name('pesanan.complete');
    Route::post('/update/{id}', [AdminController::class, 'updatePesanan'])->name('pesanan.update');
    Route::get('/destroy/{id}', [AdminController::class, 'destroyPesanan'])->name('pesanan.destroy');
});

Route::get('/admin-edit', function () {
    return view('edit');
});

Route::get('/test', [PesananController::class, 'getUncompletedPesanan']);

Route::get('/cari-{kodePesanan}', [PesananController::class, 'getPesananByCode'])->name('search.pesanan');
