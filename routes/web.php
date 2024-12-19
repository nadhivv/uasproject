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
Route::get('/StayNest', function () {
    return view('user.layout.landing');
})->name('landing');


// Route::get('/', function () {
//     return view('transactions.payment');
// });

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
    Route::get('/daftarmakanan', [MakananController::class, 'index'])->name('admin.makanan.index');
    Route::get('/makanan/create', [MakananController::class, 'create'])->name('admin.makanan.create');
    Route::post('/makanan/store', [MakananController::class, 'store'])->name('admin.makanan.store');
    Route::get('/makanan/edit/{id}', [MakananController::class, 'edit'])->name('admin.makanan.edit');
    Route::delete('/makanan/{makananId}', [MakananController::class, 'destroy'])->name('admin.makanan.destroy');
    Route::put('/admin/makanan/{makananId}', [MakananController::class, 'update'])->name('admin.makanan.update');


    Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry.index');

    // Route::get('/lokasi/cari', [LokasiController::class, 'cariLokasi'])->name('lokasi.cari');

    Route::get('/user/sample', [PenginapanController::class, 'search'])->name('cari.penginapan');
    Route::get('/penginapan/results', [PenginapanController::class, 'results'])->name('hasil.penginapan');

    Route::get('/reviews/{penginapan_id}', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');



});



// detail makanan
Route::middleware(['auth'])->group(function () {
    Route::get('/pesan/{makananId}', [UserController::class, 'showDetailPesanan'])->name('pesan');
});

// pembayaran midtrans
Route::middleware(['auth'])->group(function () {
    Route::get('/transactions', [PaymentController::class, 'index'])->name('transactions.index');
    Route::post('/transactions/process', [PaymentController::class, 'process'])->name('transactions.process');
    // Route::get('/transactions/checkout/{transaction}', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/transactions/callback', [PaymentController::class, 'callback'])->name('transactions.callback');
    Route::post('/transactions/update-payment-status', [PaymentController::class, 'updatePaymentStatus'])->name('transactions.updatePaymentStatus');


    Route::post('/laundry/store', [LaundryController::class, 'store'])->name('laundry.store');
    Route::get('/laundry/detail/{laundryId}', [LaundryController::class, 'detail'])->name('laundry.detail');
    Route::post('/laundry/payment/{transactionId}', [LaundryController::class, 'payment'])->name('laundry.payment');
    Route::post('/laundry/callback', [LaundryController::class, 'callback'])->name('laundry.callback');
    Route::get('/laundry/history', [LaundryController::class, 'laundryhistory'])->name('laundry.history');
    Route::get('/laundry/detail-pesanan/{laundryId}', [LaundryController::class, 'DetailPesanan'])->name('laundry.detail.pesanan');
    Route::get('/laundry/payment/success', [LaundryController::class, 'paymentSuccess'])->name('laundry.payment.success');
    Route::get('/laundry/payment/failed', [LaundryController::class, 'paymentFailed'])->name('laundry.payment.failed');

});

Route::get('/penginapan/{name}', [PenginapanController::class, 'show'])->name('penginapan.show');

// Route::get('/booking', [PenginapanController::class, 'index'])->name('booking.index');
Route::post('/penginapan/{name}', [PenginapanController::class, 'booking'])->name('penginapan.booking');
