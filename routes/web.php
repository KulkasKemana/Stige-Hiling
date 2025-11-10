<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
    Route::post('/forgot-password/send', [AuthController::class, 'sendResetOTP'])->name('forgot-password.send');
    Route::get('/otp/verify', [AuthController::class, 'showOTPForm'])->name('otp.verify');
    Route::post('/otp/verify', [AuthController::class, 'verifyOTP'])->name('otp.verify.submit');
    Route::post('/otp/resend', [AuthController::class, 'resendOTP'])->name('otp.resend');
    Route::get('/password/reset', [AuthController::class, 'showResetPasswordForm'])->name('password.reset.form');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::prefix('bookmark')->name('bookmark.')->group(function () {
        Route::get('/', [BookmarkController::class, 'index'])->name('index');
        Route::post('/toggle/{destination}', [BookmarkController::class, 'toggle'])->name('toggle');
        Route::get('/check/{destination}', [BookmarkController::class, 'check'])->name('check');
        Route::delete('/{destination}', [BookmarkController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [CartController::class, 'update'])->name('update');
        Route::delete('/remove/{id}', [CartController::class, 'destroy'])->name('destroy');
        Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    });
    
    Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
    
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/checkout', [BookingController::class, 'checkout'])->name('checkout');
        Route::post('/checkout/process', [BookingController::class, 'processCheckout'])->name('checkout.process');
        Route::get('/create/{id}', [BookingController::class, 'show'])->name('create');
        Route::post('/store', [BookingController::class, 'store'])->name('store');
        Route::get('/{bookingCode}', [BookingController::class, 'detail'])->name('show');
    });
    
    Route::prefix('payment')->name('payment.')->group(function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::post('/process', [PaymentController::class, 'process'])->name('process');
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
        Route::get('/failed', [PaymentController::class, 'failed'])->name('failed');
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::prefix('destinations')->name('destinations.')->group(function () {
        Route::get('/', [AdminController::class, 'destinations'])->name('index');
        Route::get('/create', [AdminController::class, 'createDestination'])->name('create');
        Route::post('/store', [AdminController::class, 'storeDestination'])->name('store');
        Route::get('/{id}/edit', [AdminController::class, 'editDestination'])->name('edit');
        Route::put('/{id}', [AdminController::class, 'updateDestination'])->name('update');
        Route::delete('/{id}', [AdminController::class, 'deleteDestination'])->name('destroy');
    });
    
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminController::class, 'users'])->name('index');
        Route::get('/{id}/edit', [AdminController::class, 'editUser'])->name('edit');
        Route::put('/{id}', [AdminController::class, 'updateUser'])->name('update');
        Route::delete('/{id}', [AdminController::class, 'deleteUser'])->name('destroy');
    });
    
    Route::prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', [AdminController::class, 'bookings'])->name('index');
        Route::patch('/{booking}/status', [AdminController::class, 'updateBookingStatus'])->name('update-status');
    });
    
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
});