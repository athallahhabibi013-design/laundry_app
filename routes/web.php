<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanPembersihController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [BahanPembersihController::class, 'index'])->name('bahan.index');
    Route::post('/simpan', [BahanPembersihController::class, 'store'])->name('bahan.store');
    Route::get('/edit/{id}', [BahanPembersihController::class, 'edit'])->name('bahan.edit');
    Route::get('/hapus/{id}', [BahanPembersihController::class, 'destroy'])->name('bahan.destroy');
});