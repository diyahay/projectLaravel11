<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryProductController;

Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/category-product',[CategoryProductController::class,'index'])->name('category_product.index');
Route::get('/category-product/create', [CategoryProductController::class,'create'])->name('category_product.create');
Route::post('/category-product', [CategoryProductController::class, 'store'])->name('category_product.store');
Route::get('/category-product/{id}/edit', [CategoryProductController::class, 'edit'])->name('category_product.edit');
Route::put('/category-product/{id}', [CategoryProductController::class, 'update'])->name('category_product.update');
Route::delete('/category-product/{id}', [CategoryProductController::class, 'destroy'])->name('category_product.destroy');
Route::get('/category-product/search', [CategoryProductController::class, 'search'])->name('category_product.search');
Route::get('/category-product/{id}', [CategoryProductController::class, 'show'])->name('category_product.show');

