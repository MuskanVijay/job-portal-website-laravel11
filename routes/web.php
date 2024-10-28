<?php

// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPortalController;

Route::get('/', [JobPortalController::class, 'index'])->name('home');
Route::get('/job-listings', [JobPortalController::class, 'jobListings'])->name('job-listings');
Route::get('/about', [JobPortalController::class, 'about'])->name('about');

