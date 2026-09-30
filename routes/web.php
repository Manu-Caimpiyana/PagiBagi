<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageController::class)->name('home');

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('isLoggedIn');

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/overview', function () {
        return view('admin.index');
    })->name('admin.overview');
});

Route::prefix('sekretaris')->middleware('isSekretaris')->group(function () {
    Route::get('/data-infaq', function () {
        return view('sekretaris.index');
    })->name('sekretaris.data-infaq');
});

Route::middleware('isGuest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.store');
});