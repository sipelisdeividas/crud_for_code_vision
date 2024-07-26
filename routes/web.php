<?php

use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PageController::class, 'showCorrectHomePage'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login.form');
});

// Authenticated and Admin Routes
Route::middleware(['auth', 'admin'])->prefix('products')->name('products.')->group(function () {
    Route::get('/create', [ProductController::class, 'showCreateProductForm'])->name('create.form');
    Route::post('/', [ProductController::class, 'createProduct'])->name('create');
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::delete('/{product}', [ProductController::class, 'deleteProduct'])->name('destroy');
    Route::delete('/', [ProductController::class, 'deleteAll'])->name('deleteAll');
    Route::get('/{product}/edit', [ProductController::class, 'showEditProductForm'])->name('edit.form');
    Route::put('/{product}', [ProductController::class, 'updateProduct'])->name('update');
});