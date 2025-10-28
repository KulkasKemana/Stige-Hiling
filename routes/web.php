<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Healing Tour and Travel
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ==================== PUBLIC ROUTES ====================
// Routes that can be accessed without authentication

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// Destinations (public access - anyone can view)
Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

// ==================== GUEST ROUTES ====================
// Routes that can only be accessed by guests (not logged in)

Route::middleware(['guest'])->group(function () {
    
    // ==================== LOGIN ROUTES ====================
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // ==================== REGISTER ROUTES ====================
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    // ==================== FORGOT PASSWORD FLOW ====================
    // Step 1: Enter Email
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password/send', [AuthController::class, 'sendResetOTP'])->name('forgot-password.send');
    
    // Step 2: OTP Verification
    Route::get('/otp/verify', [AuthController::class, 'showOTPForm'])->name('otp.verify');
    Route::post('/otp/verify', [AuthController::class, 'verifyOTP'])->name('otp.verify.submit');
    Route::post('/otp/resend', [AuthController::class, 'resendOTP'])->name('otp.resend');
    
    // Step 3: Reset Password
    Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.reset.form');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset.submit');
    
});

// ==================== AUTHENTICATED ROUTES ====================
// Routes that require user to be logged in

Route::middleware(['auth'])->group(function () {
    
    // ==================== LOGOUT ====================
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
    
    // Alias route untuk backward compatibility
    Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
    
    // ==================== BOOKING ROUTES ====================
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');
        Route::post('/checkout/process', [BookingController::class, 'processCheckout'])->name('checkout.process'); // ← TAMBAH INI
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