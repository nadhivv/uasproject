<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\ReviewController;

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

    Route::get('/user/sample', [PenginapanController::class, 'search'])->name('cari.penginapan');
    Route::get('/penginapan/results', [PenginapanController::class, 'results'])->name('hasil.penginapan');

    Route::get('/reviews/{penginapan_id}', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');



});


Route::middleware(['auth'])->group(function () {

    Route::get('/pesanan/{makananId}', [UserController::class, 'showDetailPesanan'])->name('pesan');
    Route::post('/user/pesanan', [UserController::class, 'storePesanan'])->name('pesanan.store');

    // Pembayaran
    Route::get('/user/pembayaran/{orderId}', [UserController::class, 'showPembayaran'])->name('pembayaran');
    Route::post('/user/pembayaran/{orderId}', [UserController::class, 'prosesPembayaran'])->name('pembayaran.proses');

    // Pembayaran Sukses
    Route::get('/user/pembayaran/sukses/{orderId}', [UserController::class, 'showPembayaranSukses'])->name('pembayaran.sukses');
});

Route::post('create-payment', [PaymentController::class, 'createPayment']);
Route::post('payment-callback', [PaymentController::class, 'paymentCallback']);

// Room
// Route::middleware(['auth'])->group(function () {
//     Route::get('/usdr')
// });

// Route::get('/user/order_room', function () {
//     return view('user.order_room');
// });

// Route::get('/user/sample', function () {
//     return view('user.sample');
// });
