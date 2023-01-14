<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
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

});

