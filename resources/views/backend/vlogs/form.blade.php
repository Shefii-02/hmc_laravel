@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.blogs.vlogs.index') }}">/ Vlog List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($vlog) ? 'Edit Vlog' : 'Add Vlog' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.blogs.vlogs.index') }}" class="btn btn-primary mb-3">Back</a>
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
                            action="{{ isset($vlog) ? route('admin.blogs.vlogs.update', $vlog->id) : route('admin.blogs.vlogs.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @if (isset($vlog))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $vlog->title ?? '') }}" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">YouTube Video URL</label>
                                <input type="url" name="video_url" class="form-control"
                                    value="{{ old('video_url', isset($vlog) && $vlog->video_url ? 'https://youtu.be/' . $vlog->video_url : '') }}">

                                @error('video_url')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                @if (isset($vlog) && $vlog->video_url)
                                    <div class="mt-2">
                                        <iframe width="300" height="170"
                                            src="https://www.youtube.com/embed/{{ $vlog->video_url }}" frameborder="0"
                                            allowfullscreen></iframe>
                                    </div>
                                @endif
                            </div>

                            {{-- <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description', $vlog->description ?? '') }}</textarea>
                                    @error('description')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                            {{-- <div class="mb-3">
                                    <label class="form-label">Thumbnail</label><br>
                                    @if (isset($vlog) && $vlog->thumbnail_url)
                                        <img id="imgPreview" src="{{ $vlog->thumbnail_url }}" width="200" class="rounded border mb-2">
                                    @else
                                        <img id="imgPreview" src="" width="200" class="rounded border mb-2" style="display:none;">
                                    @endif
                                    <input type="file" name="thumbnail" id="imgSelect" class="form-control">
                                    @error('thumbnail')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div> --}}


                            <div class="mb-3 col-lg-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $vlog->order ?? 0) }}">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" name="status" value="published" class="form-check-input"
                                    id="status"
                                    {{ old('status', $vlog->status ?? 'draft') == 'published' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Published</label>
                            </div>

                            {{-- <div class="mb-3">
                                <label class="form-label">Published Date</label>
                                <input type="datetime-local" name="published_at" class="form-control"
                                    value="{{ old('published_at', isset($vlog->published_at) ? $vlog->published_at->format('Y-m-d\TH:i') : '') }}">
                            </div> --}}

                            <div class="d-flex gap-2 justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($vlog) ? 'Update' : 'Create' }}</button>
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
