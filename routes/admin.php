<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'showLogin')
        ->name('admin.login')
        ->middleware('guest:admin');
});
