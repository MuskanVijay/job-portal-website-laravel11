<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home Route (Accessible by everyone)
Route::get('/', [JobPortalController::class, 'index'])->name('home');

// Job Listings Route (Accessible by everyone)
Route::get('/job-listings', [JobPortalController::class, 'jobListings'])->name('job-listings');

// About Us Route (Accessible by everyone)
Route::get('/about', [JobPortalController::class, 'about'])->name('about');

// Job Routes (Accessible by everyone for viewing, authenticated users for applying)
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // View job listings
Route::get('/job/{job}', [JobController::class, 'show'])->name('jobs.show'); // View single job details
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

// Authenticated Job Application Routes (Only for authenticated users)
Route::middleware('auth')->group(function () {
    Route::post('/job/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply'); // Apply for a job
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile
});

// Category Routes (For managing job categories)
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index'); // View all categories
    Route::get('/create', [CategoryController::class, 'create'])->name('create'); // Create a new category
    Route::post('/', [CategoryController::class, 'store'])->name('store'); // Store a new category
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit'); // Edit a category
    Route::patch('/{category}', [CategoryController::class, 'update'])->name('update'); // Update a category
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy'); // Delete a category
});
Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobApplications.apply');
Route::get('/apply', [JobApplicationController::class, 'showForm'])->name('apply.form');
Route::post('/apply', [JobApplicationController::class, 'submitApplication'])->name('apply.submit');
require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
