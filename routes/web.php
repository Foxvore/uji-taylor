<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('dashboard');
});
Route::get('/admin-pesanan', function () {
    return view('pesanan');
});
Route::get('/admin-tambah', function () {
    return view('tambah');
});
