<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home Route
Route::get('/', [JobPortalController::class, 'index'])->name('home');
Route::get('/job-listings', [JobPortalController::class, 'jobListings'])->name('job-listings');
Route::get('/about',[JobPortalController::class,'about']);
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
// Job Routes
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // View 
Route::get('/job/{job}', [JobController::class, 'show'])->name('jobs.show'); // View single
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create'); // Create job
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store'); // Store job
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit'); // Edit job
Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update'); // Update job
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy'); // Delete job

// Job Application Routes (Only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/job/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobApplications.apply'); // Apply for a job
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile
    Route::get('/applications', [JobApplicationController::class, 'index'])->name('applications.index'); // View job applications
});

Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index'); // View all categories
    Route::get('/create', [CategoryController::class, 'create'])->name('create'); // Create a new category form
    Route::post('/', [CategoryController::class, 'store'])->name('store'); // Store a new category
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit'); // Edit a category form
    Route::patch('/{category}', [CategoryController::class, 'update'])->name('update'); // Update a category
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy'); // Delete a category
});

// About Us Route (Accessible by everyone)
Route::get('/about', [JobPortalController::class, 'about'])->name('about');

// Auth Routes
require __DIR__.'/auth.php';
