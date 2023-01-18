<?php

use App\Http\Controllers\General\GeneralController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(GeneralController::class)
    ->prefix('general')
    ->group(function() {
    Route::get('tingkat-by-departemen', 'tingkatByDepartemen')->name('general.tingkat.by.departemen');
    Route::get('kelas-by-tingkat', 'kelasByTingkat')->name('general.kelas.by.tingkat');
    Route::get('kelas-by-guru', 'kelasByGuru')->name('general.kelas.by.guru');
});
