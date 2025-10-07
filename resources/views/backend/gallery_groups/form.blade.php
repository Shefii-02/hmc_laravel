@extends('layouts.backend-app')

@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.gallery_groups.index') }}">/ Gallery Groups /</a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($galleryGroup) ? 'Edit Gallery Group' : 'Add New Gallery Group' }}
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
                        <form
                            action="{{ isset($galleryGroup) ? route('admin.gallery_groups.update', $galleryGroup->id) : route('admin.gallery_groups.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($galleryGroup))
                                @method('PUT')
                            @endif

                            <div class="row gx-4">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ old('title', $galleryGroup->title ?? '') }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Main Image</label>
                                        <input type="file" name="main_image" class="form-control" id="mainImage">
                                        @if (isset($galleryGroup))
                                            <img id="preview" src="{{ $galleryGroup->main_image_url }}" width="150"
                                                class="mt-2 rounded border">
                                        @else
                                            <img id="preview" width="150" class="mt-2 rounded border"
                                                style="display:none;">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Order</label>
                                        <input type="number" name="order" class="form-control"
                                            value="{{ old('order', $galleryGroup->order ?? 0) }}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-check form-switch mt-4">
                                        <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                            {{ old('is_active', $galleryGroup->is_active ?? 1) ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-end">
                                    <button
                                        class="btn btn-primary">{{ isset($galleryGroup) ? 'Update' : 'Create' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#mainImage').change(function() {
            const [file] = this.files;
            if (file) $('#preview').attr('src', URL.createObjectURL(file)).show();
        });
    </script>
@endsection
