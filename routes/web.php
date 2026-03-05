<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/',[Controller::class,'index'])->name('dashboard');


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

Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('/sign-up',[AuthController::class,'register'])->name('signup');
    Route::get('/sign-in',[AuthController::class,'signin'])->name('signin');
});

Route::prefix('users')->name('users.')->group(function(){
    Route::get('/',[UsersController::class,'index'])->name('index');
    Route::post('/store',[AuthController::class,'store'])->name('registerUser');

});
