<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->location }}</td>
            <td>
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
