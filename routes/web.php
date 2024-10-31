<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Laravel\Breeze\Breeze;
use App\Services\Breeze\UserService;

// Kode lainnya di sini

// Rute untuk autentikasi
Route::middleware(['web'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rute untuk mengautentikasi pengguna
Auth::routes();

// Rute yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::resource('pelanggans', PelangganController::class);
    Route::resource('tagihans', TagihanController::class);
    Route::resource('pembayarans', PembayaranController::class);
});

// Rute tambahan untuk dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
