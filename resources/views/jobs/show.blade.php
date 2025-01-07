@extends('layouts.app')

@section('content')
<div class="container">
    <div class="job-details-card mx-auto">
        <!-- Job Title -->
        <h1 class="text-center mb-4 job-title">{{ $job->title }}</h1>
        <hr>

        <!-- Job Information -->
        <p><strong>Title:</strong> {{ $job->title }}</p>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Salary:</strong> ${{ number_format($job->salary, 2) }}</p>
        <p><strong>Description:</strong> {{ $job->description }}</p>
        <p><strong>Category:</strong> {{ $job->category->name }}</p>

        <!-- Apply Now Form -->
        <div class="text-center mt-4">
            <form action="{{ route('jobApplications.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="cv">Upload CV (PDF/DOC):</label>
                    <input type="file" name="cv" id="cv" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cover_letter">Upload Cover Letter (PDF/DOC):</label>
                    <input type="file" name="cover_letter" id="cover_letter" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success btn-lg mt-3">Apply Now</button>
            </form>
        </div>

        <!-- Numbered List of Jobs -->
        <div class="mt-4">
            <h4 class="text-center">Other Job Listings:</h4>
            <div class="numbered-list-box">
                @foreach ($jobs as $index => $otherJob)
                    <div class="job-number">
                        <a href="{{ route('jobs.show', $otherJob->id) }}">
                            {{ $index + 1 }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Back to Job Listings -->
    <div class="text-center mt-3">
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Back to Job Listings</a>
    </div>
</div>
<style>
    .numbered-list-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .job-number {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        background-color: #f0f8ff; /* Light blue color */
        color: #333; /* Text color */
        font-size: 18px;
        font-weight: bold;
        border-radius: 5px; /* Rounded corners */
        border: 1px solid #ccc; /* Optional border */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow */
        transition: transform 0.2s, background-color 0.2s;
    }

    .job-number:hover {
        background-color:rgb(72, 148, 229); /* Blue on hover */
        color: #fff; /* White text on hover */
        transform: scale(1.1); /* Slightly enlarge on hover */
    }

    .job-number a {
        text-decoration: none;
        color: inherit; /* Use the same color as parent */
    }
</style>
@endsection
