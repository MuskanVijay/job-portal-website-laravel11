<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Validate the file uploads
        $request->validate([
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Get the current authenticated user's profile or create a new one if it doesn't exist
        $profile = Auth::user()->profile ?? new Profile();
        
        // Assign the user_id if it's a new profile or updating an existing one
        $profile->user_id = Auth::id(); // Ensure user_id is set

        // Handle CV upload
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('uploads/cv', 'public');
            $profile->cv = $cvPath;
        }

        // Handle Cover Letter upload
        if ($request->hasFile('cover_letter')) {
            $coverLetterPath = $request->file('cover_letter')->store('uploads/cover_letters', 'public');
            $profile->cover_letter = $coverLetterPath;
        }

        // Save the profile updates
        $profile->save();

        // Redirect back with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
    public function show($id)
    {
        $profile = Profile::where('user_id', $id)->first();
    
        if (!$profile) {
            abort(404, 'Profile not found');
        }
    
        return view('profile.show', compact('profile'));
    }
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        // Validate the file uploads and other profile data
        $request->validate([
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Get the current user
        $user = Auth::user();

        // Store the CV and cover letter
        $cvPath = $request->file('cv')->store('uploads/cvs', 'public');
        $coverLetterPath = $request->file('cover_letter') ? $request->file('cover_letter')->store('uploads/cover_letters', 'public') : null;

        // Create or update the profile
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'cv' => $cvPath,
                'cover_letter' => $coverLetterPath,
            ]
        );

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile created successfully!');
    }
    public function index()
    {
        // Add your logic here, e.g., fetching user profiles.
        return view('profile.index'); // Return the appropriate view.
    }
}