<?php

use App\Http\Controllers\Operator\AuthController;
use App\Http\Controllers\Operator\GuruController;
use App\Http\Controllers\Operator\HomeController;
use App\Http\Controllers\Operator\JadwalController;
use App\Http\Controllers\Operator\SiswaController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'showLogin')
        ->name('operator.login.show')
        ->middleware('guest:operator');
    Route::post('login', 'login')->name('operator.login');
    Route::get('logout', 'logout')->name('operator.logout');
});

Route::middleware(['operator'])->group(function() {
    //Home route
    Route::redirect('/', 'operator.home');
    Route::get('home', [HomeController::class, 'index'])->name('operator.home');
    //Guru Routes
    Route::controller(GuruController::class)->group(function() {
        Route::get('guru', 'index')->name('operator.guru');
    });
    //Siswa Routes
    Route::controller(SiswaController::class)->group(function() {
        Route::get('siswa', 'index')->name('operator.siswa');
    });
    //Jadwal Routes
    Route::controller(JadwalController::class)->group(function() {
        Route::get('jadwal', 'index')->name('operator.jadwal');
        Route::get('jadwal/create', 'create')->name('operator.jadwal.create');
        Route::post('jadwal', 'store')->name('operator.jadwal.store');
    });
});
