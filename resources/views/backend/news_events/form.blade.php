@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.blogs.news-events.index') }}">/ Doctor List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($newsEvent) ? 'Edit News and Event' : 'Add News and Event' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.blogs.news-events.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row gx-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form
                            action="{{ isset($newsEvent) ? route('admin.blogs.news-events.update', $newsEvent->id) : route('admin.blogs.news-events.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @if (isset($newsEvent))
                                @method('PUT')
                            @endif
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Image<small>Size:304*306 px</small></label>
                                <div class="mb-2">
                                    <img id="imgPreview" width="150"
                                        src="{{ old('image_file', isset($newsEvent) ? $newsEvent->image_url : '') }}"
                                        class="rounded border">
                                </div>
                                <input type="file" name="image_file" id="imgSelect" class="form-control">
                                @error('image_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $newsEvent->title ?? '') }}" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="5">{{ old('description', $newsEvent->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Published Date</label>
                                <input type="datetime-local" name="published_at" class="form-control"
                                    value="{{ old('published_at', isset($newsEvent->published_at) ? $newsEvent->published_at : '') }}">
                                @error('published_at')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" name="status" value="published" class="form-check-input"
                                    id="status"
                                    {{ old('status', $newsEvent->status ?? 'draft') == 'published' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Published</label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $newsEvent->order ?? 0) }}">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($newsEvent) ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imgSelect = document.getElementById('imgSelect');
            const imgPreview = document.getElementById('imgPreview');

            imgSelect.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imgPreview.src = e.target.result;
                        imgPreview.style.display = 'block';
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
