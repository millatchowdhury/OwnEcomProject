<?php

use App\Http\Controllers\backend\BackendCategoryController;
use App\Http\Controllers\backend\BackendProductController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\FrontendProductController;
use Illuminate\Support\Facades\Route;


// Front End 
Route::get('/', [FrontendProductController::class, 'index'])->name('all.product');





// Back End 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => '/admin'], function(){
    Route::group(['prefix' => '/product'], function(){
        Route::get('/manage-product', [BackendProductController::class, 'manageProduct'])->name('manage.product');
        Route::get('/create-product', [BackendProductController::class, 'createProduct'])->name('create.product');
        Route::post('/store-product', [BackendProductController::class, 'storeProduct'])->name('product.store');
        Route::get('/edit-product/{id}', [BackendProductController::class, 'editProduct'])->name('edit.product');
        Route::post('/update-product/{id}', [BackendProductController::class, 'updateProduct'])->name('update.product');
        Route::post('/delete-product/{id}', [BackendProductController::class, 'deleteProduct'])->name('delete.product');
    });
    Route::group(['prefix' => '/category'], function(){
        Route::get('/manage-category', [BackendCategoryController::class, 'manageCategory'])->name('manage.category');
        Route::get('/create-category', [BackendCategoryController::class, 'createCategory'])->name('create.category');
        Route::post('/store-category', [BackendCategoryController::class, 'storeCategory'])->name('store.category');
        Route::get('/edit-category{id}', [BackendCategoryController::class, 'editCategory'])->name('edit.category');
        Route::post('/update-category/{id}', [BackendCategoryController::class, 'updateCategory'])->name('update.category');
        Route::get('/delete-category/{id}', [BackendCategoryController::class, 'deleteCategory'])->name('delete.category');
    });
});






