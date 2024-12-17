<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JenisUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PencarianController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');


Route::get('/register', [UserController::class, 'registerview']);
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'loginview']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


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

// User management
Route::get('/admin/user', [AdminController::class, 'list']);
Route::post('/admin/user/add', [AdminController::class, 'store'])->name('store.users');
Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])->name('edit.users');
Route::put('/admin/user/{id}', [AdminController::class, 'update'])->name('update.users');
Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('delete.users');

// Menu management
Route::get('/admin/menu', [MenuController::class, 'index']);
Route::post('/admin/menu/add', [MenuController::class, 'store'])->name('store.menu');
Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('edit.menu');
Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('update.menu');
Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('delete.menu');

// Role management
Route::get('/admin/role', [JenisUserController::class, 'index']);
Route::post('/admin/role/add', [JenisUserController::class, 'store'])->name('store.role');
Route::get('/admin/role/{id}/edit', [JenisUserController::class, 'edit'])->name('edit.role');
Route::put('/admin/role/{id}', [JenisUserController::class, 'update'])->name('update.role');
Route::delete('/admin/role/{id}', [JenisUserController::class, 'destroy'])->name('delete.role');

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

    // Route::get('/lokasi/cari', [LokasiController::class, 'cariLokasi'])->name('lokasi.cari');

});
