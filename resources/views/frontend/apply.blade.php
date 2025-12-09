<div class="text-center my-2">
    <h6>Application for {{  $career->title }}</h6>
</div>
<form id="applyForm" action="{{ route('career.apply.store', $career->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Your Name *</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email *</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone *</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Message (Optional)</label>
        <textarea name="message" rows="4" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload CV (PDF / DOC / DOCX)</label>
        <input type="file" name="cv" class="form-control" required>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit Application</button>
    </div>
</form>
