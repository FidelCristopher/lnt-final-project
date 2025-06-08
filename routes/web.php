<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OverviewController;



Route::get('/', function () {
    return view('home');
})->name('home');

// Register routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Admin dashboard routes
Route::middleware(['auth', AdminOnly::class])->group(function () {
    Route::get('/admin/product', function () {
        return view('admin.product');
    })->name('admin.product');
});

Route::get('/admin/product', function () {
    return view('admin.product');
})->middleware(['auth'])->name('product');

Route::get('/admin/overview', function () {
    return view('admin.overview');
})->name('overview');

Route::redirect('/products', '/admin/products');

Route::resource('products', ProductController::class);


Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::prefix('admin')->group(function () {
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

// Group route dengan middleware auth untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
