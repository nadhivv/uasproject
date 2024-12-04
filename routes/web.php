<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\MakananController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Show the login form
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

// Show the registration form
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

// Logout
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Protected routes - only accessible by authenticated users
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

// Admin route
Route::get('/admin', [AdminController::class, 'index']);

// User home route
// Route::get('/', [UserController::class, 'index']);


// Orders Makanan
Route::middleware('auth')->group(function () {
    Route::get('/makanan', [MakananController::class, 'index'])->name('makanan.index');
    Route::get('/reservasi/{reservasiId}/makanan/create', [MakananController::class, 'create'])->name('makanan.create');
    Route::post('/reservasi/{reservasiId}/makanan', [MakananController::class, 'store'])->name('makanan.store');

    Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry.index');
    Route::get('/reservasi/{reservasiId}/laundry/create', [LaundryController::class, 'create'])->name('laundry.create');
    Route::post('/reservasi/{reservasiId}/laundry', [LaundryController::class, 'store'])->name('laundry.store');

    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order/makanan', [OrderController::class, 'storeFoodOrder'])->name('order.makanan.store');
    Route::post('/order/laundry', [OrderController::class, 'storeLaundryOrder'])->name('order.laundry.store');
});

