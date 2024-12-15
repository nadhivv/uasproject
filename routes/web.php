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
    Route::get('/makanan', [MakananController::class, 'index'])->name('admin.makanan.index');
    Route::get('/makanan/create', [MakananController::class, 'create'])->name('admin.makanan.create');
    Route::post('/makanan/store', [MakananController::class, 'store'])->name('admin.makanan.store');
    Route::get('/makanan/edit/{id}', [MakananController::class, 'edit'])->name('admin.makanan.edit');
    Route::delete('/makanan/{makananId}', [MakananController::class, 'destroy'])->name('admin.makanan.destroy');
    Route::put('/admin/makanan/{makananId}', [MakananController::class, 'update'])->name('admin.makanan.update');


    Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry.index');


    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order/makanan', [OrderController::class, 'storeFoodOrder'])->name('order.makanan.store');
    Route::post('/order/laundry', [OrderController::class, 'storeLaundryOrder'])->name('order.laundry.store');
});
