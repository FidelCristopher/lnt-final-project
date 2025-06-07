<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;


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


// Group route dengan middleware auth untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
