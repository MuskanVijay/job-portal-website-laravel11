@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Create Your Profile</h2>

    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="cv">Upload Your CV</label>
            <input type="file" name="cv" id="cv" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cover_letter">Upload Your Cover Letter (optional)</label>
            <input type="file" name="cover_letter" id="cover_letter" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Profile</button>
    </form>
</div>
@endsection