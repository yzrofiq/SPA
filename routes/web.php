<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Routes for authentication
Route::middleware(['web'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Main page route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Auth::routes();

// Routes requiring authentication
Route::middleware(['auth'])->group(function () {
    Route::resource('pelanggans', PelangganController::class);
    Route::resource('tagihans', TagihanController::class);
    Route::resource('pembayarans', PembayaranController::class);

    // Export data pelanggan ke CSV
    Route::get('/pelanggans/export', [PelangganController::class, 'exportCSV'])->name('pelanggans.export');

    // Filter berdasarkan alamat
    Route::get('/pelanggans/filter', [PelangganController::class, 'filterByAddress'])->name('pelanggans.filter');

    // Pengurutan berdasarkan nama
    Route::get('/pelanggans/sort/{order}', [PelangganController::class, 'sortByName'])->name('pelanggans.sort');
});

// Dashboard route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
