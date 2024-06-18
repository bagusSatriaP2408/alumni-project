<?php

use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('home');

Route::get('/dashboard', Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('posts', [Controllers\PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    Route::resource('posts', Controllers\PostController::class)->except('index');
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['prefix' => 'Admin'], function () {
    Route::get('/Dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/Lulusan', [AdminController::class, 'show'])->name('admin.lulusan');
});

require __DIR__.'/auth.php';
