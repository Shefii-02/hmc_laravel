@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.blogs.articles.index') }}">/ Article List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($article) ? 'Edit Article' : 'Add Article' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.blogs.articles.index') }}" class="btn btn-primary mb-3">Back</a>
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
                            action="{{ isset($article) ? route('admin.blogs.articles.update', $article->id) : route('admin.blogs.articles.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @if (isset($article))
                                @method('PUT')
                            @endif
                             <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                @if (isset($article) && $article->image_url)
                                    <img id="imgPreview" src="{{ $article->image_url }}" width="200"
                                        class="rounded border mb-2">
                                @else
                                    <img id="imgPreview" src="" width="200" class="rounded border mb-2"
                                        style="display:none;">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Image <small>Size:304*306 px</small> </label>
                                <input type="file" name="image" id="imgSelect" class="form-control">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $article->title ?? '') }}" required>
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea name="content" class="form-control" rows="6">{{ old('content', $article->content ?? '') }}</textarea>
                                @error('content')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" name="status" value="published" class="form-check-input"
                                    id="status"
                                    {{ old('status', $article->status ?? 'draft') == 'published' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Published</label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $article->order ?? 0) }}">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($article) ? 'Update' : 'Create' }}</button>
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
