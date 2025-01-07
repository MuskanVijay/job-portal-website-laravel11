<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\JobApplicationController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\ProfileController;

// Public route for sign up
Route::post('/signup', [AuthController::class, 'signup']);

// Public route for login
Route::post('/login', [AuthController::class, 'login']);

// Public route for logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Category Routes
Route::middleware('auth:sanctum')->name('category.')->prefix('category')->group(function() {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Job Routes
Route::middleware('auth:sanctum')->name('jobs.')->prefix('jobs')->group(function() {
    Route::get('/', [JobController::class, 'index'])->name('jobs.index');
    Route::post('/', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/{id}', [JobController::class, 'show'])->name('jobs.show');
    Route::put('/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
});
