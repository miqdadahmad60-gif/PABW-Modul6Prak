<?php
use App\Http\Controllers\LaporBanjirController;
use Illuminate\Support\Facades\Route;

Route::get('/lapor-banjir', [LaporBanjirController::class, 'index'])->name('lapor.index');

Route::get('/lapor-banjir/tambah', [LaporBanjirController::class, 'form'])->name('lapor.form');

Route::post('/lapor-banjir', [LaporBanjirController::class, 'kirim'])->name('lapor.kirim');
