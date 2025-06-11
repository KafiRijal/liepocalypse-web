<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Register
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register')
    ->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Forgot Password
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request')
    ->middleware('guest');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email')
    ->middleware('guest');

// Reset Password
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset')
    ->middleware('guest');
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest');

require __DIR__.'/auth.php';
