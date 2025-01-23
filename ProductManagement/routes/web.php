<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Public Dashboard Route (accessible without login)
Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');

// Protected Routes (require login)
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Dashboard: CRUD Operations
    Route::resource('products', ProductController::class)->except(['show']);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Product Details Route (accessible without login)
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
