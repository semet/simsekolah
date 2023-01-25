<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DepartemenController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KepalaSekolahController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TahunController;
use App\Http\Controllers\Admin\TingkatController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLogin')
        ->name('admin.login.show')
        ->middleware('guest:admin');
    Route::post('login', 'login')->name('admin.login');
    Route::get('logout', 'logout')->name('admin.logout');
    Route::get('otp', 'otpForm')
        ->name('admin.otp.show')
        ->middleware('guest:admin');
    Route::post('otp', 'verifyOtp')->name('admin.otp.verify');
});

Route::middleware(['admin', 'pass.otp:admin'])->group(function () {
    //Home route
    Route::get('home', [HomeController::class, 'index'])->name('admin.home');
    //Deppartemen routes
    Route::controller(DepartemenController::class)->group(function () {
        Route::get('departemen', 'index')->name('admin.departemen');
        Route::post('departemen', 'store')->name('admin.departemen.store');
        Route::get('departemen/{id}/edit', 'edit')->name('admin.departemen.edit');
        Route::post('departemen/update', 'update')->name('admin.departemen.update');
        Route::post('departemen/delete', 'destroy')->name('admin.departemen.delete');
    });
    //Kepala sekolah routes
    Route::controller(KepalaSekolahController::class)->group(function () {
        Route::get('kepsek', 'index')->name('admin.kepsek');
        Route::get('kepsek/create', 'create')->name('admin.kepsek.create');
        Route::post('kepsek', 'store')->name('admin.kepsek.store');
        Route::get('kepsek/{kepsek}/edit', 'edit')->name('admin.kepsek.edit');
        Route::post('kepsek/update/{id}', 'update')->name('admin.kepsek.update');
        Route::post('kepsek/delete', 'destroy')->name('admin.kepsek.delete');
    });
    //Tahun routes
    Route::controller(TahunController::class)->group(function () {
        Route::get('tahun', 'index')->name('admin.tahun');
        Route::post('tahun', 'store')->name('admin.tahun.store');
        Route::get('tahun/{tahun}/edit', 'edit')->name('admin.tahun.edit');
        Route::post('tahun/update', 'update')->name('admin.tahun.update');
        Route::post('tahun/delete', 'destroy')->name('admin.tahun.delete');
        Route::get('tahun/{id}/toggle', 'toggle')->name('admin.tahun.toggle');
    });
    //Semester routes
    Route::controller(SemesterController::class)->group(function () {
        Route::get('semester', 'index')->name('admin.semester');
        Route::post('semester', 'store')->name('admin.semester.store');
        Route::get('semester/{id}/edit', 'edit')->name('admin.semester.edit');
        Route::post('semester/update', 'update')->name('admin.semester.update');
        Route::get('semester/{id}/toggle', 'toggle')->name('admin.semester.toggle');
        Route::post('semester/delete', 'destroy')->name('admin.semester.delete');
    });
    //Tingkat routes
    Route::controller(TingkatController::class)->group(function () {
        Route::get('tingkat', 'index')->name('admin.tingkat');
        Route::post('tingkat', 'store')->name('admin.tingkat.store');
        Route::get('tingkat/{id}/edit', 'edit')->name('admin.tingkat.edit');
        Route::post('tingkat/update', 'update')->name('admin.tingkat.update');
        Route::post('tingkat/delete', 'destroy')->name('admin.tingkat.delete');
    });
    //Kelas routes
    Route::controller(KelasController::class)->group(function () {
        Route::get('kelas', 'index')->name('admin.kelas');
        Route::post('kelas', 'store')->name('admin.kelas.store');
        Route::get('kelas/{id}/edit', 'edit')->name('admin.kelas.edit');
        Route::post('kelas/update', 'update')->name('admin.kelas.update');
        Route::post('kelas/delete', 'destroy')->name('admin.kelas.delete');
    });
    //Mapel (Mata Pelajaran) routes
    Route::controller(MapelController::class)->group(function () {
        Route::get('mapel', 'index')->name('admin.mapel');
        Route::post('mapel', 'store')->name('admin.mapel.store');
    });
    //Guru routes
    Route::controller(GuruController::class)->group(function () {
        Route::get('guru', 'index')->name('admin.guru');
        Route::post('guru/store', 'store')->name('admin.guru.store');
    });
    //Siswa routes
    Route::controller(SiswaController::class)->group(function () {
        Route::get('siswa', 'index')->name('admin.siswa');
        Route::post('siswa', 'store')->name('admin.siswa.store');
    });
    //Pegawai routes
    Route::controller(PegawaiController::class)->group(function () {
        Route::get('pegawai', 'index')->name('admin.pegawai');
    });
});
