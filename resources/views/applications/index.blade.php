@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Job Applications</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($applications->isEmpty())
        <p>You have not applied for any jobs yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Job Title</th>
                    <th>CV</th>
                    <th>Cover Letter</th>
                    <th>Applied On</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $application->job->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank">View CV</a>
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $application->cover_letter_path) }}" target="_blank">View Cover Letter</a>
                        </td>
                        <td>{{ $application->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
