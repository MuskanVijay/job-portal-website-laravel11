@if($jobs->isEmpty())
    <p>No jobs found.</p>
@else
    <ul class="list-group">
        @foreach($jobs as $job)
            <li class="list-group-item">
                <a href="{{ route('jobs.show', $job->id) }}">
                    <strong>{{ $job->title }}</strong>
                </a> 
                ({{ $job->location }})
            </li>
        @endforeach
    </ul>
@endif
