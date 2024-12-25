<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#applyModal">
    Apply Now
</button>

<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Upload CV and Cover Letter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jobApplications.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV</label>
                        <input type="file" class="form-control" id="cv" name="cv" required>
                    </div>
                    <div class="mb-3">
                        <label for="cover_letter" class="form-label">Upload Cover Letter</label>
                        <input type="file" class="form-control" id="cover_letter" name="cover_letter">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
