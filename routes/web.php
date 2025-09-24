<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

// Basic Routes
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');

Route::get('/payment', function () {
        return view('payment');
    })->name('payment');

Route::get('/ps', function () {
        return view('ps');
    })->name('ps');

    Route::get('/pf', function () {
        return view('pf');
    })->name('pf');

// Auth Routes (Guest only)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', function () {
        return view('forgot-password');
    })->name('forgot-password');
    Route::get('/otp', function () {
        return view('otp');
    })->name('otp');
});

// Logout (Auth only)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Public Routes (dapat diakses tanpa login)
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/book/{id}', [BookingController::class, 'show'])->name('book.show');

// Booking Routes (butuh authentication)
Route::middleware(['auth'])->group(function () {
    Route::post('/book', [BookingController::class, 'store'])->name('book.store');
    
    // Cart Routes
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/keranjang/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    
    // Protected User Routes
    Route::get('/bookmark', function () {
        return view('bookmark');
    })->name('bookmark');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
});