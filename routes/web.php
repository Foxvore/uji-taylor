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
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/pesanan', [AdminController::class, 'pesanan']);
});

Route::get('/admin-tambah', function () {
    return view('tambah');
});
Route::get('/admin-edit', function () {
    return view('edit');
});

Route::get('/test', [PesananController::class, 'getUncompletedPesanan']);
