<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index'])->name('index');
Route::get('riwayat', [LandingPageController::class, 'riwayat'])->name('riwayat');
Route::get('tentang', [LandingPageController::class, 'tentang'])->name('tentang');
Route::get('langganan', [LandingPageController::class, 'langganan'])->name('langganan');
Route::get('kontak', [LandingPageController::class, 'kontak'])->name('kontak');
Route::get('login', [LandingPageController::class, 'login'])->name('login');

Route::get('/404', function () {
    return view('404');
})->name('notFound');
