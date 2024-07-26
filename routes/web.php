<?php

use App\Http\Controllers\auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'showCorrectHomePage'])->name('login');

Route::middleware('guest')->group(function () {;
    Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login.form');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/create-product', [ProductController::class, 'showCreateProductForm'])->name('product.create.form');
    Route::post('/create-product', [ProductController::class, 'createProduct'])->name('product.create');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::delete('/products/{id}', [ProductController::class, 'deleteProduct'])->name('product.destroy');
    Route::delete('/products', [ProductController::class, 'deleteAll'])->name('products.deleteAll');
    Route::get('/edit-product/{product}', [ProductController::class, 'showEditProductForm'])->name('product.edit.form');
    Route::put('/update-product/{product}', [ProductController::class, 'updateProduct'])->name('product.update');
});