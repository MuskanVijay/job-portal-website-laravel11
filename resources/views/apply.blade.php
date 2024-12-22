<!-- Apply Form -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Apply for Job</h1>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('apply.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="cv" class="form-label">Upload CV</label>
            <input type="file" class="form-control" name="cv" id="cv" required>
        </div>

        <div class="mb-3">
            <label for="cover_letter" class="form-label">Upload Cover Letter</label>
            <input type="file" class="form-control" name="cover_letter" id="cover_letter" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
