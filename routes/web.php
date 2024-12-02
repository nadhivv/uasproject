<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Show the login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Handle login submission
Route::post('/login', [UserController::class, 'login']);

// Show the registration form
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

// Handle registration submission
Route::post('/register', [UserController::class, 'register']);

// Protected routes - only accessible by authenticated users
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });
});

// Admin route
Route::get('/admin', [AdminController::class, 'index']);

// User home route
// Route::get('/', [UserController::class, 'index']);


