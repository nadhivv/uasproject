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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::post('/pesan/{id}', [OrderController::class, 'pesan'])->name('pesan');
    Route::get('/menu-makanan', function () {
        return view('user.menu_makanan');
    })->name('menu.makanan');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // pemesanan makanan
    Route::get('/pesan/{id}', [UserController::class, 'showDetailPesanan'])->name('pesan');
    Route::post('/pesan', [UserController::class, 'storePesanan'])->name('pesanan.store');

    Route::get('/pembayaran/{orderId}', [UserController::class, 'showPembayaran'])->name('pembayaran');
    Route::post('/pembayaran/proses/{orderId}', [UserController::class, 'prosesPembayaran'])->name('pembayaran.proses');
    Route::get('/pembayaran/sukses/{orderId}', [UserController::class, 'showPembayaranSukses'])->name('pembayaran.sukses');



    // pemesanan laundry
    // Menyimpan pesanan laundry
    Route::get('/pesanan/detail/{orderId}', [LaundryController::class, 'detail'])->name('detail_pesanan2');
    Route::post('/pesanlaundry', [LaundryController::class, 'storelaundry'])->name('store.pesanan');
    Route::get('/pesanan/create', [LaundryController::class, 'create'])->name('pesanan.create');


    // Menampilkan halaman pembayaran untuk pesanan
    // Route::get('/pembayaran/laundry/{orderId}', [LaundryController::class, 'showPembayaranlaundry'])->name('pembayaran2');
    // // Proses pembayaran
    // Route::post('/pembayaran/laundry/{orderId}', [LaundryController::class, 'prosesPembayaranlaundry'])->name('pembayaran.proses2');
    // // Halaman sukses pembayaran
    // Route::get('/pembayaran-sukses/{orderId}', [LaundryController::class, 'showPembayaranSukseslaundry'])->name('pembayaran.sukses2');

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
