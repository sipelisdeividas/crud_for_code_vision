<?php

use App\Http\Controllers\auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'showCorrectHomePage'])->name('home');

Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');