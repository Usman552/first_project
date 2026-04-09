<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\categorycontroller;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    Route::get('/', [Controller::class, 'index'])->name('dashboard');
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/add-product', [ProductController::class, 'create'])->name('addproduct');
        Route::post('/store-product', [ProductController::class, 'store'])->name('storeproduct');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('editproduct');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('updateproduct');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroyproduct');
    });


    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/add-category', [CategoryController::class, 'create'])->name('addcategory');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('storecategory');
        Route::post('/category/toggle-status/{id}', [categorycontroller::class, 'toggleStatus'])->name('togglestatus');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('editcategory');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('updatecategory');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroycategory');
    });


    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('user/edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::put('user/update/{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('user/delete/{id}', [UsersController::class, 'destroy'])->name('destroy');
        Route::put('/users/{id}/role', [UsersController::class, 'updateRole'])->name('updateRole');
    });

    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('order/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::put('order/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::delete('order/delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
        Route::put('/order/{id}/role', [OrderController::class, 'updateRole'])->name('updateRole');
    });
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/sign-up', [AuthController::class, 'register'])->name('signup');
    Route::get('/sign-in', [AuthController::class, 'signin'])->name('login');
    Route::post('/store', [AuthController::class, 'store'])->name('registerUser');
    Route::post('/login', [AuthController::class, 'login'])->name('loginUser');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
