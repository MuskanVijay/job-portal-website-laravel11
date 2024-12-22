@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Job Listings</h1>

    <!-- Search Bar -->
    <form action="{{ route('jobs.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Search by job title or location" 
                           value="{{ old('search', $query ?? '') }}">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
   

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Job Table -->
    <div id="jobTable">
        @include('jobs.partials.job_table', ['jobs' => $jobs])
    </div>

    <a href="{{ route('jobs.create') }}" class="btn btn-primary mt-3">Add Job</a>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // When user types in the search bar
        $('#jobSearch').on('keyup', function () {
            let query = $(this).val();  // Get the query typed by user
            $.ajax({
                url: "{{ route('jobs.index') }}",  // Make a GET request to the jobs index route
                type: "GET",
                data: { search: query },  // Send the search query
                success: function (data) {
                    $('#jobTable').html(data);  // Update the job table with the new filtered data
                },
                error: function () {
                    alert('Error occurred while searching jobs');
                }
            });
        });
    });
</script>
@endsection
