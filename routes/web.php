<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

// just for landing page testing
Route::get('/navbar', function () {
    return view('landing/navbar');
})->name('home');

Route::get('/footer', function () {
    return view('landing/footer');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
