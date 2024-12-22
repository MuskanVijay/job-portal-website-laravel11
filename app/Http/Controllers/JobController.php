<?php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Index method to list all jobs with search functionality
    // In JobController.php
    public function index(Request $request)
    {
        $query = $request->input('search');
        $jobs = Job::query();
    
        // Check if there is a search query and filter jobs accordingly
        if ($query) {
            $jobs = $jobs->where('title', 'like', '%' . $query . '%')
                         ->orWhere('location', 'like', '%' . $query . '%');
        }
    
        // Paginate or fetch all results
        $jobs = $jobs->paginate(5);
    
        return view('jobs.index', compact('jobs', 'query'));
    }
    
    // Method to show the create job form
    public function create()
    {
        // Get all categories to display in the dropdown
        $categories = Category::all();
        return view('jobs.create', compact('categories'));
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
}
