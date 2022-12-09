<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;





Route::get('/',[productController::class,'products'])->name('products');
Route::post('/add-product',[productController::class,'addProduct'])->name('add.product');
Route::post('/update-product',[productController::class,'updateProduct'])->name('update.product');
Route::post('/delete-product',[productController::class,'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data',[productController::class,'paginateProduct']);
Route::get('search-product',[productController::class,'searchProduct'])->name('search.product');;
