<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');


// Show the login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Show the registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

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

