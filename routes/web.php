<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIC ROUTES ====================

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/schedule', function () {
    return view('schedule.schedule');
})->name('schedule.index');

Route::get('/schedule/ticket', function () {
    return view('schedule.ticket');
})->name('schedule.ticket');

// Destinations (public access)
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

// ==================== GUEST ROUTES ====================

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('forgot-password');
    
    Route::get('/otp', function () {
        return view('auth.otp');
    })->name('otp');
});

// ==================== AUTHENTICATED ROUTES ====================

Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    Route::get('/bookmark', function () {
        return view('bookmark');
    })->name('bookmark');
    
    // ==================== CART ROUTES ====================
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [CartController::class, 'update'])->name('update');
        Route::delete('/remove/{id}', [CartController::class, 'destroy'])->name('destroy');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });
    
    // Alias untuk backward compatibility
    Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
    
    // ==================== CHECKOUT ROUTES ====================
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
    
    // ==================== PAYMENT ROUTES ====================
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::post('/process', [PaymentController::class, 'process'])->name('process');
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
        Route::get('/failed', [PaymentController::class, 'failed'])->name('failed');
    });
    
    // ==================== BOOKING ROUTES ====================
    Route::prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/{bookingCode}', [BookingController::class, 'detail'])->name('show');
    });
    
    // Backward compatibility
    Route::get('/book/{id}', [BookingController::class, 'show'])->name('book.show');
    Route::post('/book', [BookingController::class, 'store'])->name('book.store');
});