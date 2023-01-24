<?php

use App\Http\Controllers\Kepsek\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('email/verify/{id}', [RegisterController::class, 'verifyEmail'])
    ->name('kepsek.email.verify');
