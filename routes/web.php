<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::get('/create-account', function () {
    return view('create-account');
})->name('create-accountr');
Route::get('/otp', function () {
    return view('otp');
})->name('otp');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/bookmark', function () {
    return view('bookmark');
})->name('bookmark');

