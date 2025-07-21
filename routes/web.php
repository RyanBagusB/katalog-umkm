<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Merchant\MerchantProfileController;

Route::prefix('/')->controller(\App\Http\Controllers\GuestController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/umkm', 'listMerchants')->name('merchants.list');
    Route::get('/umkm/{merchant}', 'show')->name('merchants.show');
    Route::get('/umkm/{merchant}/produk', 'allProducts')->name('merchants.products');
    Route::get('/umkm/{merchant}/kontak', 'contact')->name('merchants.contact');
    Route::get('/berita', 'listNews')->name('news.index');
    Route::get('/berita/{slug}', 'showNews')->name('news.show');
});

Route::view('/tentang', 'landing.about')->name('about');
Route::view('/kontak', 'landing.contact')->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('merchants', \App\Http\Controllers\Admin\MerchantController::class);
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)->name('news', 'admin.news');
    });

    Route::middleware(['role:merchant'])->prefix('merchant')->name('merchant.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Merchant\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', \App\Http\Controllers\Merchant\ProductController::class);
    });

    Route::middleware(['auth:sanctum', 'verified', 'role:merchant'])
    ->prefix('merchant')
    ->name('merchant.')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Merchant\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', \App\Http\Controllers\Merchant\ProductController::class);
        Route::get('/profile/edit', [MerchantProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [MerchantProfileController::class, 'update'])->name('profile.update');
    });
});
