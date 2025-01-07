<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the applications.
     */
    public function index()
    {
        $applications = Application::with(['job', 'user'])->where('user_id', Auth::id())->get();

        return view('applications.index', compact('applications'));
    }
    public function apply(Request $request, $jobId)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to apply for a job.');
        }
    
        $user = Auth::user(); // Get the authenticated user
    
        // Handle file uploads
        $cvPath = $request->file('cv')->store('cvs', 'public');
        $coverLetterPath = $request->file('cover_letter')->store('cover_letters', 'public');
    
        // Create a new application
        Application::create([
            'user_id' => $user->id,
            'job_id' => $jobId,
            'cv_path' => $cvPath,
            'cover_letter_path' => $coverLetterPath,
        ]);
    
        return redirect()->route('applications.index')->with('success', 'Your application has been submitted successfully!');
    }
    
}
