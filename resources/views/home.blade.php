@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 400px;">
            <img src="{{ asset('Images/WOrk wise.png') }}" alt="Job Portal Logo" style="width: 600px; height: 400px;">
            <a class="btn btn-primary btn-lg mt-3" href="{{ route('job-listings') }}" role="button">View Job Listings</a>
        </div>
    </div>

    <div class="featured-jobs mt-5">
    <h3 class="text-center mb-4">Featured Jobs</h3>
    <div class="row">
     
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('Images/image.png') }}" class="card-img-top" alt="software engineering jobs">
                <div class="card-body">
                    <h5 class="card-title">Software Engineer</h5>
                    <p class="card-text">Join a top tech company and work on innovative projects.</p>
                    <a href="{{ route('job-listings') }}" class="btn btn-primary">View Job</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('Images/image copy.png') }}" class="card-img-top" alt="web development">
                <div class="card-body">
                    <h5 class="card-title">Web Development</h5>
                    <p class="card-text">Join a top tech company and work on innovative projects.</p>
                    <a href="{{ route('job-listings') }}" class="btn btn-primary">View Job</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('Images/image copy 2.png') }}" class="card-img-top" alt="cyber securety">
                <div class="card-body">
                    <h5 class="card-title">Cyber Security</h5>
                    <p class="card-text">Join a top tech company and work on innovative projects.</p>
                    <a href="{{ route('job-listings') }}" class="btn btn-primary">View Job</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
