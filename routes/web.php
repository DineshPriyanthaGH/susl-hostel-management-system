<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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
    Route::get('/admin/student-details/verified', [StudentDetailController::class, 'verified'])
        ->name('student.details.verified');
    Route::post('/admin/student-details/clear-session', [StudentDetailController::class, 'clearSession'])
        ->name('student.details.clear-session');
    
    // Student Search and Management Routes
    Route::get('/admin/student-details', [StudentDetailController::class, 'index'])
        ->name('student.details.index');
    Route::get('/admin/student-details/data', [StudentDetailController::class, 'getData'])
        ->name('student.details.data');
    Route::get('/admin/student-details/search', [StudentDetailController::class, 'search'])
        ->name('student.details.search');
    Route::get('/admin/student-details/export-pdf', [StudentDetailController::class, 'exportPDF'])
        ->name('student.details.export.pdf');
    Route::get('/admin/student-details/pdf-export-page', function() {
        return view('pdf_export');
    })->name('student.details.pdf.page');
    Route::post('/admin/student-details/find', [StudentDetailController::class, 'findStudent'])
        ->name('student.details.find');
    Route::get('/admin/student-details/{id}/edit', [StudentDetailController::class, 'edit'])
        ->name('student.details.edit');
    Route::get('/admin/student-details/{id}', [StudentDetailController::class, 'show'])
        ->name('student.details.show');
    Route::put('/admin/student-details/{id}', [StudentDetailController::class, 'update'])
        ->name('student.details.update');
    Route::delete('/admin/student-details/{id}', [StudentDetailController::class, 'destroy'])
        ->name('student.details.destroy');
    
    // PDF Export Routes
    Route::get('/admin/api/hostel-options', [StudentDetailController::class, 'getHostelOptions'])
        ->name('api.hostel.options');
});

// Contact Us Route
Route::get('/contact-us', function() {
    return view('contact'); // You'll need to create this view
})->name('contact.us');

// Redirect /home to admin login for compatibility
Route::get('/home', function() {
    return redirect()->route('admin.login');
});

// Test PDF route (temporary)
Route::get('/test-pdf', function() {
    return view('test_pdf');
})->name('test.pdf');

// Debug PDF route (temporary)
Route::get('/debug-pdf', function() {
    return view('debug_pdf');
})->name('debug.pdf');

// Test route for debugging
Route::get('/test-routes', function() {
    return response()->json([
        'message' => 'Routes are working!',
        'timestamp' => now(),
        'routes' => [
            'student.details.index' => route('student.details.index'),
            'student.details.pdf.page' => route('student.details.pdf.page'),
        ]
    ]);
})->name('test.routes');