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
})->name('home');

// Schedule Routes
Route::get('/schedule', function () {
    return view('schedule.schedule');
})->name('schedule.index');

Route::get('/schedule/ticket', function () {
    return view('schedule.ticket');
})->name('schedule.ticket');

// Payment Routes
Route::get('/payment', function () {
    return view('payment.payment');
})->name('payment.index');

Route::get('/payment/failed', function () {
    return view('payment.pf');
})->name('payment.failed');

Route::get('/payment/success', function () {
    return view('payment.ps');
})->name('payment.success');

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

// Public Routes (dapat diakses tanpa login)
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

// Booking page (public)
Route::get('/book/{id}', [BookingController::class, 'show'])->name('book.show');

// Protected Routes (butuh authentication)
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Booking
    Route::post('/book', [BookingController::class, 'store'])->name('book.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('book.index');
    
    Route::middleware(['auth'])->group(function () {
    // Cart Routes
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store'); // TAMBAHAN
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/keranjang/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    });
    
    // User Pages
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