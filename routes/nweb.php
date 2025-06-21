<?php
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController; // ✅ NEW import

// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('landing');
    })->name('home');
});

Route::get('/imageslider', function () {
    return view('landing/imageslider');
})->name('slider');

// Authenticated routes
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Maps
    Route::get('/googlemaps', function () {
        return view('landing/map');
    })->name('maps');

    // 🟡 NEW: Admin-only routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
        // Optional: destroy
        // Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');

        Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
            Route::get('/make-admin', [AdminController::class, 'makeAdmin'])->name('make');
            // Add other admin routes here
        });
    });

    // ... other app routes
});

// Password reset route (guest only)
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');


