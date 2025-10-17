<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ==================== PUBLIC ROUTES ====================

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

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
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // ==================== PROFILE ROUTES ====================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    // ==================== BOOKMARK ROUTES ====================
    Route::prefix('bookmark')->name('bookmark.')->group(function () {
        Route::get('/', [BookmarkController::class, 'index'])->name('index');
        Route::post('/toggle/{destination}', [BookmarkController::class, 'toggle'])->name('toggle');
        Route::get('/check/{destination}', [BookmarkController::class, 'check'])->name('check');
        Route::delete('/{destination}', [BookmarkController::class, 'destroy'])->name('destroy');
    });
    
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
    
    // ==================== BOOKING ROUTES ====================
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout'); // ← TAMBAHKAN INI
        Route::get('/create/{id}', [BookingController::class, 'show'])->name('create');
        Route::post('/store', [BookingController::class, 'store'])->name('store');
        Route::get('/{bookingCode}', [BookingController::class, 'detail'])->name('show');
    });
    
    // ==================== PAYMENT ROUTES ====================
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::post('/process', [PaymentController::class, 'process'])->name('process');
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
        Route::get('/failed', [PaymentController::class, 'failed'])->name('failed');
    });
});