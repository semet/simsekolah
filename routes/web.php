<?php

use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::controller(GeneralController::class)
    ->prefix('general')
    ->group(function () {
        Route::get('tingkat-by-departemen', 'tingkatByDepartemen')->name('general.tingkat.by.departemen');
        Route::get('kelas-by-tingkat', 'kelasByTingkat')->name('general.kelas.by.tingkat');
        Route::get('kelas-by-guru', 'kelasByGuru')->name('general.kelas.by.guru');
        Route::get('semester-by-tahun', 'semesterByTahun')->name('general.semester.by.tahun');
        Route::get('mapel-by-tingkat', 'mapelByTingkat')->name('general.mapel.by.tingkat');
    });
