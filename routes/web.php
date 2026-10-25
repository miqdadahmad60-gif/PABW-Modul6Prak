<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LaporBanjirController;
use Illuminate\Support\Facades\Route;

// Rute Utama / Redirect ke Form Laporan
Route::get('/', function () {
    return redirect()->route('lapor.form');
});

// ==========================================
// RUTE PUBLIK (Bisa diakses tanpa login warga)
// ==========================================
Route::get('/lapor-banjir/tambah', [LaporBanjirController::class, 'form'])->name('lapor.form');
Route::post('/lapor-banjir', [LaporBanjirController::class, 'kirim'])->name('lapor.kirim');

// Rute Autentikasi Manual (Register & Login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// ==========================================
// RUTE KHUSUS PETUGAS (Wajib Login / Middleware Auth)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/lapor-banjir', [LaporBanjirController::class, 'index'])->name('lapor.index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/profil', function () {
        return view('auth.profil');
    })->name('profil');
});