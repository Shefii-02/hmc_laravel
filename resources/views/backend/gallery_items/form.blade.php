@extends('layouts.backend-app')

@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.gallery_groups.index') }}">/ Gallery Groups /</a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                Manage Gallery Images — {{ $galleryGroup->title }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.gallery_groups.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <!-- Row starts -->
        <div class="row gx-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container py-4">


                            <input type="hidden" id="gallery_group_id" value="{{ $galleryGroup->id }}">

                            <!-- Upload Zone -->
                            <div id="drop-zone" class="border border-primary rounded p-5 text-center bg-light"
                                style="cursor:pointer;">
                                <p class="mb-2">Drag & Drop images here or click to select <small>Size:304*306 px</small></p>
                                <input type="file" id="images" name="images[]" multiple accept="image/*"
                                    class="d-none">
                            </div>

                            <!-- Upload Progress -->
                            <div id="upload-progress" class="mt-4" style="display:none;">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%">
                                    </div>
                                </div>
                                <small class="text-muted">Uploading...</small>
                            </div>

                            <!-- Gallery Preview -->
                            <div class="row mt-4" id="gallery-preview">
                                @foreach ($galleryItems as $item)
                                    <div class="col-md-3 mb-3 gallery-item" id="image-{{ $item->id }}">
                                        <div class="position-relative">
                                            <img src="{{ $item->Image_url }}" class="img-fluid rounded border"
                                                style="height: 160px; object-fit:cover;">
                                            <button type="button"
                                                class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-existing"
                                                data-id="{{ $item->id }}">
                                                &times;
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('images');
            const progressSection = document.getElementById('upload-progress');
            const progressBar = progressSection.querySelector('.progress-bar');
            const galleryPreview = document.getElementById('gallery-preview');
            const galleryGroupId = document.getElementById('gallery_group_id').value;

            // Click to select
            dropZone.addEventListener('click', () => fileInput.click());

            // Drag and drop highlight
            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropZone.classList.add('bg-primary-subtle');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    dropZone.classList.remove('bg-primary-subtle');
                }, false);
            });

            // Drop handler
            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                const files = Array.from(e.dataTransfer.files);
                files.forEach(uploadImage);
            });

            // File select handler
            fileInput.addEventListener('change', function(e) {
                const files = Array.from(e.target.files);
                files.forEach(uploadImage);
                fileInput.value = ''; // reset input
            });

            // Upload function
            function uploadImage(file) {
                const formData = new FormData();
                formData.append('gallery_group_id', galleryGroupId);
                formData.append('images[]', file);
                formData.append('_token', '{{ csrf_token() }}');

                progressSection.style.display = 'block';
                progressBar.style.width = '0%';

                fetch("{{ route('admin.gallery_items.store') }}", {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        progressBar.style.width = '100%';

                        if (data.success && data.item) {

                            appendImageToGallery(data.item);
                        }
                        setTimeout(() => progressSection.style.display = 'none', 500);
                    })
                    .catch(err => {
                        alert('Upload failed: ' + err.message);
                        progressSection.style.display = 'none';
                    });
            }

            // Append image dynamically
            function appendImageToGallery(item) {
                console.log(item);
                const col = document.createElement('div');
                col.className = 'col-md-3 mb-3 gallery-item';
                col.id = 'image-' + item.id;
                col.innerHTML = `
            <div class="position-relative">
                <img src="${item.image_url}" class="img-fluid rounded border" style="height:160px;object-fit:cover;">
                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-existing" data-id="${item.id}">&times;</button>
            </div>
        `;
                galleryPreview.prepend(col);
            }

            // Remove existing image
            galleryPreview.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-existing')) {
                    const imageId = e.target.dataset.id;
                    if (confirm('Are you sure you want to delete this image?')) {
                        fetch(`/admin/gallery/${imageId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('image-' + imageId).remove();
                                    toastr.success("Successfully Deleted", "Success");
                                } else {
                                    toastr.error('Delete failed', "Error");
                                }
                            });
                    }
                }
            });
        });
    </script>
@endpush
