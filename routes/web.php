<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
