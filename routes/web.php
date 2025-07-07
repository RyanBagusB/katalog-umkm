<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('merchants', \App\Http\Controllers\Admin\MerchantController::class);

        Route::get('/products', [\App\Http\Controllers\Admin\ProductApprovalController::class, 'index'])->name('products.index');
        Route::get('/products/{product}', [\App\Http\Controllers\Admin\ProductApprovalController::class, 'show'])->name('products.show');
        Route::post('/products/{product}/approve', [\App\Http\Controllers\Admin\ProductApprovalController::class, 'approve'])->name('products.approve');
        Route::post('/products/{product}/reject', [\App\Http\Controllers\Admin\ProductApprovalController::class, 'reject'])->name('products.reject');

        Route::resource('product-revisions', \App\Http\Controllers\Admin\ProductRevisionApprovalController::class)
            ->only(['index', 'show']);
        Route::post('product-revisions/{revision}/approve', [\App\Http\Controllers\Admin\ProductRevisionApprovalController::class, 'approve'])
            ->name('product-revisions.approve');
        Route::post('product-revisions/{revision}/reject', [\App\Http\Controllers\Admin\ProductRevisionApprovalController::class, 'reject'])
            ->name('product-revisions.reject');
    });

    Route::middleware(['role:merchant'])->prefix('merchant')->name('merchant.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Merchant\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', \App\Http\Controllers\Merchant\ProductController::class);
    });

    Route::post('/notification/mark-all-read', [\App\Http\Controllers\NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::post('/notification/{notification}/mark-read', [\App\Http\Controllers\NotificationController::class, 'markRead'])->name('notifications.markRead');
    Route::delete('/notification/{notification}', [\App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.delete');
});

Route::get('/welcome', function () {
    return view('user.pages.index');
})->name('welcome');
