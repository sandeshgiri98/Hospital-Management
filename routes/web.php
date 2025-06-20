<?php
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return view('landing');
// })->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('landing');  // or your landing page
    })->name('home');
});

Route::get('/imageslider', function () {
    return view('landing/imageslider');
})->name('slider');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Resetting the password

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

//maps
Route::get('/googlemaps', function () {
    return view('landing/map');
})->name('maps');

Route::post('/user/{user}/assign-role', [UserRoleController::class, 'assignRole']);
Route::post('/user/{user}/give-permission', [UserRoleController::class, 'givePermission']);
Route::post('/role/assign-permissions', [UserRoleController::class, 'assignPermissionToRole']);

