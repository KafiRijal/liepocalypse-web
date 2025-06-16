<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DetectController;
use App\Http\Controllers\RiwayatController;

// Auth (biasa)
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Guest login
Route::get('/login/guest', [LoginController::class, 'guest'])->name('login.guest');

// Google login
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('login', [LandingPageController::class, 'login'])->name('login');

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::middleware('auth')->group(function () {
    Route::post('/deteksi-hoaks', [DetectController::class, 'detect'])->name('deteksi.hoaks');
    Route::post('/clear-session', [DetectController::class, 'clearSession'])->name('clear.session');
    Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->name('riwayat');
    Route::get('/riwayat/{id}/detail', [RiwayatController::class, 'detail'])->name('riwayat.detail');
    Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    Route::get('/riwayat/{id}/pdf', [RiwayatController::class, 'downloadPdf'])->name('riwayat.download.pdf');
    Route::get('tentang', [LandingPageController::class, 'tentang'])->name('tentang');
    Route::get('langganan', [LandingPageController::class, 'langganan'])->name('langganan');
    Route::get('kontak', [LandingPageController::class, 'kontak'])->name('kontak');
    Route::get('hasil', [LandingPageController::class, 'hasil'])->name('hasil');
    Route::post('/kirim-pesan', [ContactController::class, 'send'])->name('contact.send');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/404', function () {
    return view('404');
})->name('notFound');
