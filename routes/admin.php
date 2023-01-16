<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DepartemenController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KepalaSekolahController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TahunController;
use App\Http\Controllers\Admin\TingkatController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'showLogin')
        ->name('admin.login.show')
        ->middleware('guest:admin');
    Route::post('login', 'login')->name('admin.login');
});

Route::middleware(['admin'])->group(function() {
    //Home route
    Route::get('home', [HomeController::class, 'index'])->name('admin.home');
    //Deppartemen routes
    Route::controller(DepartemenController::class)->group(function() {
        Route::get('departemen', 'index')->name('admin.departemen');
        Route::post('departemen', 'store')->name('admin.departemen.store');
    });
    //Kepala sekolah routes
    Route::controller(KepalaSekolahController::class)->group(function() {
        Route::get('kepsek', 'index')->name('admin.kepsek');
        Route::get('kepsek/create', 'create')->name('admin.kepsek.create');
        Route::post('kepsek', 'store')->name('admin.kepsek.store');
    });
    //Tahun routes
    Route::controller(TahunController::class)->group(function() {
        Route::get('tahun', 'index')->name('admin.tahun');
        Route::post('tahun', 'store')->name('admin.tahun.store');
    });
    //Semester routes
    Route::controller(SemesterController::class)->group(function() {
        Route::get('semester', 'index')->name('admin.semester');
        Route::post('semester', 'store')->name('admin.semester.store');
    });
    //Tingkat routes
    Route::controller(TingkatController::class)->group(function() {
        Route::get('tingkat', 'index')->name('admin.tingkat');
        Route::post('tingkat', 'store')->name('admin.tingkat.store');
    });
    //Kelas routes
    Route::controller(KelasController::class)->group(function() {
        Route::get('kelas', 'index')->name('admin.kelas');
        Route::post('kelas', 'store')->name('admin.kelas.store');
    });
});

