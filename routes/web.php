<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;

Route::get('/', function () {
    // Get all active sections from database
    $sections = \App\Models\LandingPageSection::where('is_active', true)
        ->orderBy('display_order')
        ->get()
        ->keyBy('section_key');
    
    return view('landing', compact('sections'));
});

Route::get('/enroll', [EnrollmentController::class, 'showForm'])->name('enroll');
Route::post('/enroll/step/{step}', [EnrollmentController::class, 'submitStep'])->name('enroll.step');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/applications', [AdminController::class, 'index'])->name('applications');
        Route::get('/applications/{id}', [AdminController::class, 'show'])->name('show');
        Route::post('/applications/{id}/status', [AdminController::class, 'updateStatus'])->name('updateStatus');
        Route::delete('/applications/{id}', [AdminController::class, 'delete'])->name('delete');
        
        // Landing Page Content Management
        Route::prefix('landing-page')->name('landing-page.')->group(function () {
            Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\LandingPageController::class, 'create'])->name('create');
            Route::post('/store', [\App\Http\Controllers\LandingPageController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [\App\Http\Controllers\LandingPageController::class, 'edit'])->name('edit');
            Route::put('/{id}', [\App\Http\Controllers\LandingPageController::class, 'update'])->name('update');
        });
    });
});

