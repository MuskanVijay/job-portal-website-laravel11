<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    public function apply(Request $request, Job $job)
{
    $user = Auth::user();

    // Check if the user has a profile with CV uploaded
    if (!$user->profile || !$user->profile->cv) {
        return redirect()->route('profile.create')->with('warning', 'Please create your profile and upload your CV first.');
    }

    // Validate the request for file uploads
    $request->validate([
        'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Handle file uploads (if applicable)
    $cvPath = $request->file('cv') ? $request->file('cv')->store('uploads/cvs', 'public') : $user->profile->cv;
    $coverLetterPath = $request->file('cover_letter') ? $request->file('cover_letter')->store('uploads/cover_letters', 'public') : null;

    // Create the job application
    $application = new JobApplication();
    $application->user_id = $user->id;
    $application->job_id = $job->id;
    $application->cv_path = $cvPath;
    $application->cover_letter_path = $coverLetterPath;

    // Save the application
    $application->save();

    return redirect()->route('jobs.index')->with('success', 'Application submitted successfully!');
}
public function showForm()
{
    return view('apply');
}

/**
 * Handle the application submission.
 */
public function submitApplication(Request $request)
{
    // Validate the uploaded files
    $request->validate([
        'cv' => 'required|mimes:pdf,doc,docx|max:10240', // Max size 10MB
        'cover_letter' => 'required|mimes:pdf,doc,docx|max:10240', // Max size 10MB
    ]);

    // Store the uploaded files
    $cvPath = $request->file('cv')->store('uploads/cvs');
    $coverLetterPath = $request->file('cover_letter')->store('uploads/cover_letters');

    // You can save the paths in the database if needed for future use
    // For now, we just show a success message.

    Session::flash('success', 'Your application has been submitted successfully!');

    return redirect()->route('apply.form');
}

}