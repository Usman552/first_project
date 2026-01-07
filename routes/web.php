<?php

use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/add-product', [ProductController::class, 'create'])->name('addproduct');
    Route::post('/store-product', [ProductController::class, 'store'])->name('storeproduct');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('updateproduct');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroyproduct');
});



Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [categorycontroller::class, 'index'])->name('category');
    Route::get('/add-category', [categorycontroller::class, 'create'])->name('addcategory');
    
});
