<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StudentDetailController;

// Landing Page Route
Route::get('/', function() {
    return view('landing');
})->name('landing');

// Admin Authentication Routes
Route::get('/admin/login', function() {
    return view('auth.admin_login');
})->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

// Student Details Routes (Protected)
Route::middleware(['web'])->group(function () {
    Route::get('/admin/student-details/create', [StudentDetailController::class, 'create'])
        ->name('student.details.create');
    Route::post('/admin/student-details/store', [StudentDetailController::class, 'store'])
        ->name('student.details.store');

        // Student detail management routes
    Route::get('/admin/student-details/{student}', [StudentDetailController::class, 'show'])
    ->name('student.details.show');
    Route::get('/admin/student-details/{student}/edit', [StudentDetailController::class, 'edit'])
    ->name('student.details.edit');
    Route::put('/admin/student-details/{student}', [StudentDetailController::class, 'update'])
    ->name('student.details.update');
});

// Contact Us Route
Route::get('views/contact_us', function() {
    return view('contact_us'); // You'll need to create this view
})->name('contact.us');

// Redirect /home to admin login for compatibility
Route::get('/home', function() {
    return redirect()->route('admin.login');
});