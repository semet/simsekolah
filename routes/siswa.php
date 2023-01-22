<?php

use App\Http\Controllers\Siswa\AuthController;
use App\Http\Controllers\Siswa\HomeController;
use App\Http\Controllers\Siswa\JadwalController;
use App\Http\Controllers\Siswa\RapotController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'showLogin')
        ->name('siswa.login.show')
        ->middleware('guest:siswa');
    Route::post('login', 'login')->name('siswa.login');
    Route::get('logout', 'logout')->name('siswa.logout');
});

Route::middleware(['siswa'])->group(function() {
    //Home route
    Route::redirect('/', 'siswa.home');
    Route::get('home', [HomeController::class, 'index'])->name('siswa.home');

    Route::get('jadwal', [JadwalController::class, 'index'])->name('siswa.jadwal');
    Route::get('jadwal/list', [JadwalController::class, 'getJadwal'])->name('siswa.jadwal.list');

    Route::get('rapot', [RapotController::class, 'index'])->name('siswa.rapot');
    Route::get('rapot/list', [RapotController::class, 'getRapot'])->name('siswa.rapot.list');
});
