<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;

Route::get('/', [LandingController::class, 'landing'])->name('home');
Route::get('/analytics', [LandingController::class, 'analytics'])->name('analytics');
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('links', LinkController::class);
});

require __DIR__.'/auth.php';
