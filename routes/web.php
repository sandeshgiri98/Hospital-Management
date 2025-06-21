<?php
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController; // Assuming this is used elsewhere
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Assuming this is used elsewhere
use App\Http\Controllers\Admin\AdminController; // This seems to be for makeAdmin, assuming you want it.
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\AdminRoleController; // ✅ NEW import for AdminRoleController

// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('landing');
    })->name('home');

    Route::get('/imageslider', function () {
        return view('landing/imageslider');
    })->name('slider');

    // Password reset route (guest only)
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
});


// Authenticated routes
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Maps
    Route::get('/googlemaps', function () {
        return view('landing/map');
    })->name('maps');


    // Admin-only routes (consolidated and corrected)
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {

        // User Management Routes
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
        // Optional: delete
        // Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');

        // Role & Permission Management Routes ✅ NEW
        Route::get('/roles', [AdminRoleController::class, 'index'])->name('roles.index');
        // Add more role management routes here if needed (e.g., create, edit, sync permissions to role)
        // Route::get('/roles/create', [AdminRoleController::class, 'create'])->name('roles.create');
        // Route::post('/roles', [AdminRoleController::class, 'store'])->name('roles.store');
        // Route::get('/roles/{role}/edit', [AdminRoleController::class, 'edit'])->name('roles.edit');
        // Route::put('/roles/{role}', [AdminRoleController::class, 'update'])->name('roles.update');


        // Other Admin Specific Routes (if AdminController handles general admin tasks)
        // This line seems to be the only one from your original inner admin group,
        // so I'm moving it out and keeping the 'make' name.
        Route::get('/make-admin', [AdminController::class, 'makeAdmin'])->name('make');
        // Add other general admin routes here, if any.
    });

    // --- Add other authenticated non-admin specific routes here ---
    // Example: Doctor Routes (assuming you have a DoctorController)
    // Route::middleware(['role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    //     Route::get('/patients', [DoctorController::class, 'patients'])->name('patients');
    //     Route::get('/medical-records/{patient}', [DoctorController::class, 'viewMedicalRecords'])->name('medical-records');
    //     // ...
    // });

    // Example: Patient Routes (assuming you have a PatientController)
    // Route::middleware(['role:patient'])->prefix('patient')->name('patient.')->group(function () {
    //     Route::get('/my-records', [PatientController::class, 'myRecords'])->name('my-records');
    //     Route::get('/appointments', [PatientController::class, 'appointments'])->name('appointments');
    //     // ...
    // });

    // Example: Staff Routes (assuming you have a StaffController)
    // Route::middleware(['role:staff'])->prefix('staff')->name('staff.')->group(function () {
    //     Route::get('/patients', [StaffController::class, 'patients'])->name('patients');
    //     Route::get('/appointments', [StaffController::class, 'appointments'])->name('appointments');
    //     // ...
    // });

});