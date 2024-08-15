<?php

use App\Http\Controllers\backend\BackendProductController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\FrontendProductController;
use Illuminate\Support\Facades\Route;


// Front End 
Route::get('/', [FrontendProductController::class, 'index'])->name('all.product');





// Back End 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/create-product', [BackendProductController::class, 'createProduct'])->name('create.product');

