@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h2 class="text-center mb-4">Job Listings</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search for jobs...">
        </div>

        <div class="col-md-3">
            <select class="form-control">
                <option value="">Category</option>
                <option value="IT">IT</option>
                <option value="Marketing">Marketing</option>
                <option value="Finance">Finance</option>
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control">
                <option value="">Location</option>
                <option value="New York">Dubai</option>
                <option value="San Francisco">Pakistan</option>
                <option value="Chicago">China</option>
                <option value="Chicago">France</option>
            </select>
        </div>
    </div>

 
    <div class="row">
       
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
