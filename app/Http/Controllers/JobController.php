<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function search(Request $request)
{
    $query = $request->get('query');
    if ($query) {
        // Search jobs by title or location
        $jobs = Job::where('title', 'LIKE', '%' . $query . '%')
                   ->orWhere('location', 'LIKE', '%' . $query . '%')
                   ->get();
                  ;
    return view('jobs.partials.search_results', compact('jobs'));
}
}

    public function index()
    {
        $jobs = Job::all(); // Retrieves all jobs
        return view('jobs.index', compact('jobs'));
    }
    

    // Method to store a new job
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create a new job with the validated data
        Job::create($request->all());

        // Redirect to the jobs index page with success message
        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    // Method to show the edit form for an existing job
    public function edit(Job $job)
    {
        // Get all categories to display in the dropdown
        $categories = Category::all();
        return view('jobs.edit', compact('job', 'categories'));
    }

    // Method to update the job details
    public function update(Request $request, Job $job)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update the job with the new data
        $job->update($request->all());

        // Redirect to the jobs index page with success message
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    // Method to delete a job
    public function destroy(Job $job)
    {
        // Delete the job
        $job->delete();

        // Redirect to the jobs index page with success message
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }
    public function show(Job $job)
    {
        // Get all jobs to create the numbered list
        $jobs = Job::all();
    
        return view('jobs.show', compact('job', 'jobs'));
    }
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('jobs.create', compact('categories'));
    }
}
