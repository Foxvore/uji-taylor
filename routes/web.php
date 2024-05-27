<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'authLogin']);


Route::get('/test', [PesananController::class, 'getCompletedPesanan']);
