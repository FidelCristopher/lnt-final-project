<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OverviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Manual register routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Manual login routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    // Halaman notice "Please verify your email"
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    // Verifikasi link yang diklik user di email
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/'); // Redirect sesudah verifikasi berhasil
    })->middleware(['signed'])->name('verification.verify');

    // Kirim ulang email verifikasi
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.resend');
});

// Admin routes dengan middleware auth dan AdminOnly
Route::middleware(['auth', AdminOnly::class])->group(function () {
    Route::get('/admin/product', function () {
        return view('admin.product');
    })->name('admin.product');

    Route::get('/admin/overview', [OverviewController::class, 'index'])->name('overview');

    Route::prefix('admin')->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    });
});

// Redirect /products ke /admin/products
Route::redirect('/products', '/admin/products');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Product resource routes
Route::resource('products', ProductController::class)->middleware('auth');

// Additional product routes (edit, update, destroy) sudah ter-handle di resource, tapi kalau kamu mau define manual juga, bisa tetap dipakai
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware('auth');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');

// Group route dengan middleware auth untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
