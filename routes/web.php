<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{id}', [DestinationController::class, 'show'])->name('destinations.show');

// Basic Routes
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});
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

// Logout (Auth only)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Public Destinations (langsung bisa diakses frontend)
Route::get('/destinations', function () {
    $destinations = [
        [
            'id' => 1,
            'name' => 'Kyoto',
            'price' => 2500000,
            'duration' => '5 Days',
            'image' => 'assets/destinations/kyoto.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Bali',
            'price' => 1500000,
            'duration' => '3 Days',
            'image' => 'assets/destinations/bali.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Rome',
            'price' => 4000000,
            'duration' => '7 Days',
            'image' => 'assets/destinations/rome.jpg'
        ],
    ];
    return view('destinations', compact('destinations'));
})->name('destinations.index');

// Booking Routes
Route::get('/book/{id}', [BookingController::class, 'show'])->name('book.show');

Route::middleware(['auth'])->group(function () {
    // proses simpan booking
    Route::post('/book', [BookingController::class, 'store'])->name('book.store');

    // lihat semua booking user
    Route::get('/bookings', [BookingController::class, 'index'])->name('book.index');

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
