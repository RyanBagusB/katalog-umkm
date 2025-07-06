<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('merchants', App\Http\Controllers\Admin\MerchantController::class);
    });

    Route::middleware(['role:merchant'])->prefix('merchant')->name('merchant.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Merchant\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', \App\Http\Controllers\Merchant\ProductController::class);
    });
});
