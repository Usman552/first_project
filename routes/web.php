<?php

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

Route::get('/',function (){
    return view('pages.categories.category');
})->name('category');

// Route::prefix('category')->('category.')->group(function (){


// });
