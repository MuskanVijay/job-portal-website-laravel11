@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h2 class="text-center mb-4">Job Listings</h2>

    <!-- Button to Add New Job -->
    <div class="mb-4  d-flex" style="gap: 10px;">
        <!-- Add Job Button -->
        <a href="{{ route('jobs.create') }}" class="btn btn-success">Add Job</a>
        
        <!-- View All Jobs Button -->
        <a href="{{ route('jobs.index') }}" class="btn btn-primary">View All Jobs</a>
    </div>

    <div class="row">
        <!-- Job Listings (cards) -->
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="Images/image copy 3.png" class="card-img-top" alt="google company">
                <div class="card-body">
                    <h5 class="card-title">Software Developer</h5>
                    <p class="card-text">GOOGLE</p>
                    <p class="text-muted mb-1">Location: Amphitheatre Parkway in Mountain View, California.</p>
                    <p class="text-muted">Salary: $80,000 - $100,000</p>
                    <a href="#" class="btn btn-primary">Apply Now</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="Images/image copy 4.png" class="card-img-top" alt="microsofy">
                <div class="card-body">
                    <h5 class="card-title">Web Designer</h5>
                    <p class="card-text">MICROSOFT</p>
                    <p class="text-muted mb-1">Location: Redmond, Washington, United States</p>
                    <p class="text-muted">Salary: $70,000 - $90,000</p>
                    <a href="#" class="btn btn-primary">Apply Now</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img src="Images/image copy 5.png" class="card-img-top" alt="amazon">
                <div class="card-body">
                    <h5 class="card-title">Project Manager</h5>
                    <p class="card-text">AMAZON</p>
                    <p class="text-muted mb-1">Location: Bellevue, Washington</p>
                    <p class="text-muted">Salary: $90,000 - $110,000</p>
                    <a href="#" class="btn btn-primary">Apply Now</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
