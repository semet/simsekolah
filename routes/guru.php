<?php

use App\Http\Controllers\Guru\AuthController;
use App\Http\Controllers\Guru\HomeController;
use App\Http\Controllers\Guru\JadwalController;
use App\Http\Controllers\Guru\RapotController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'showLogin')
        ->name('guru.login.show')
        ->middleware('guest:guru');
    Route::post('login', 'login')->name('guru.login');
    Route::get('logout', 'logout')->name('guru.logout');
});

Route::middleware(['guru'])->group(function() {
    //Home route
    Route::redirect('/', 'guru.home');
    Route::get('home', [HomeController::class, 'index'])->name('guru.home');
    //Jadwal Routes
    Route::controller(JadwalController::class)->group(function() {
        Route::get('jadwal', 'index')->name('guru.jadwal');
    });
    //Rapot Routes
    Route::controller(RapotController::class)->group(function() {
        Route::get('rapot', 'index')->name('guru.rapot');
    });
});
