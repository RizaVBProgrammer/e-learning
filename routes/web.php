<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;

// Rute Utama Mengarah ke Daftar Pelajaran
Route::get('/', [LessonController::class, 'index'])->name('lessons.index');

Route::get('/dashboard', [LessonController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute yang membutuhkan autentikasi dan admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
});
Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');

// Rute yang membutuhkan autentikasi (untuk profil)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute autentikasi (login, register, dll.)
require __DIR__.'/auth.php';
