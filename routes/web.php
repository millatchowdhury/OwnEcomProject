<?php

use App\Http\Controllers\backend\BackendProductController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\FrontendProductController;
use Illuminate\Support\Facades\Route;


// Front End 
Route::get('/', [FrontendProductController::class, 'index'])->name('all.product');





// Back End 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/manage-product', [BackendProductController::class, 'manageProduct'])->name('manage.product');
Route::get('/create-product', [BackendProductController::class, 'createProduct'])->name('create.product');
Route::post('/store-product', [BackendProductController::class, 'storeProduct'])->name('product.store');
Route::get('/edit-product/{id}', [BackendProductController::class, 'editProduct'])->name('edit.product');
Route::post('/update-product/{id}', [BackendProductController::class, 'updateProduct'])->name('update.product');
Route::post('/delete-product/{id}', [BackendProductController::class, 'deleteProduct'])->name('delete.product');





