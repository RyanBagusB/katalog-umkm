<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Merchant\MerchantProfileController;

Route::prefix('/')->controller(\App\Http\Controllers\GuestController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/umkm/{merchant}', 'show')->name('merchants.show');
    Route::get('/umkm/{merchant}/produk', 'allProducts')->name('merchants.products');
    Route::get('/umkm/{merchant}/kontak', 'contact')->name('merchants.contact');
});

Route::get('/tentang', function () {
    return view('landing.about');
});

Route::get('/umkm', function () {
    return view('landing.merchants');
});

Route::get('/artikel', function () {
    return view('landing.articles');
});

Route::get('/kontak', function () {
    return view('landing.contact');
});

// Detail Artikel / Berita
Route::get('/artikel/{slug}', function ($slug) {
    return view('landing.detail-article', [
        'slug' => $slug,
        'judul' => 'Creating a Cozy Living Room: Tips and Tricks',
        'isi' => 'Pelatihan ini ditujukan untuk membantu pelaku UMKM go online dan memperluas pasar mereka.',
        'gambar' => 'images/auth-image.jpg',
        'tanggal' => '2025-07-08',
    ]);
})->name('artikel.show');

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

        Route::resource('news', NewsController::class)->name('news', 'admin.news');
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

    Route::post('/notification/mark-all-read', [\App\Http\Controllers\NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::post('/notification/{notification}/mark-read', [\App\Http\Controllers\NotificationController::class, 'markRead'])->name('notifications.markRead');
    Route::delete('/notification/{notification}', [\App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.delete');
});
