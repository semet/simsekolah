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
        Route::get('rapot/create', 'create')->name('guru.rapot.create');
        Route::get('rapot/list', 'getRapot')->name('guru.rapot.list');
        Route::post('rapot', 'store')->name('guru.rapot.store');
        Route::post('rapot/update', 'update')->name('guru.rapot.update');
        Route::get('rapot/export-excel', 'exportExcel')->name('guru.rapot.export-excel');
        Route::get('rapot/export-pdf', 'exportPdf')->name('guru.rapot.export-pdf');
    });
});
