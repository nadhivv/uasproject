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

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');


Route::get('/register', [UserController::class, 'registerview']);
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/', [UserController::class, 'loginview']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// User management
Route::get('/admin/user', [AdminController::class, 'list']);
Route::post('/admin/user/add', [AdminController::class, 'store'])->name('store.users');
Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])->name('edit.users');
Route::put('/admin/user/{id}', [AdminController::class, 'update'])->name('update.users');
Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('delete.users');

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

