@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Job Listings</h1>

    <!-- Search Bar -->
    <div class="d-flex flex-row-reverse p-2">
        <input type="text" class="form-control" id="title-search" name="title-search" placeholder="Search by title or location">
    </div>

    <div id="title-results" class="row mt-0">
        <!-- Results will be displayed here dynamically -->
    </div>

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

@push('scripts')
<script>
     $(document).ready(function() {
       $('#title-search').on('keyup', function() {
           let query = $(this).val(); // Get the value of the input

           if (query.length > 0) {
               $.ajax({
                   url: '{{ route('jobs.search') }}', // URL for the search route
                   method: 'GET',
                   data: { query: query }, // Pass the query as data
                   success: function(response) {
                       $('#title-results').html(response); // Update the results section
                   },
                   error: function(xhr, status, error) {
                       console.error('Error:', error);
                       $('#title-results').html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
                   }
               });
           } else {
               $('#title-results').empty(); // Clear results when input is empty
           }
       });
   });
</script>
@endpush
@endsection
