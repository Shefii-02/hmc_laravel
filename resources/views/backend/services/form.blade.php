@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">

        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item ">
                <a href="#">
                    <i class="ri-home-3-line"></i>
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.services.index') }}">
                    / Services List /
                </a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($banner) ? 'Edit Service' : 'Add New Service' }}
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <!-- Sales stats starts -->
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.services.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
        <!-- Sales stats ends -->
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
                            action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}"
                            method="POST" class="row" enctype="multipart/form-data">
                            @csrf
                            @if (isset($service))
                                @method('PUT')
                            @endif

                            {{-- Thumbnail Image --}}
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label class="form-label">Thumbnail Image (Icon)</label>
                                <div class="mb-2">
                                    <img id="thumbPreview" width="150"
                                        src="{{ old('thumbnail_file', isset($service) && $service->thumbnail_url ? $service->thumbnail_url : asset('images/no-image.png')) }}"
                                        class="rounded border">
                                </div>
                                <input type="file" name="thumbnail_file" id="thumbSelect" class="form-control">
                                @error('thumbnail_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- Main Image --}}
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label class="form-label">Main Image</label>
                                <div class="mb-2">
                                    <img id="mainPreview" width="150"
                                        src="{{ old('main_image_file', isset($service) && $service->main_image_url ? $service->main_image_url : asset('images/no-image.png')) }}"
                                        class="rounded border">
                                </div>
                                <input type="file" name="main_image_file" id="mainSelect" class="form-control">
                                @error('main_image_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $service->title ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $service->description ?? '') }}</textarea>
                            </div>


                            <div class="col-md-3 mb-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $doctor->order ?? 0) }}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                        {{ old('is_active', $service->is_active ?? 1) ? 'checked' : '' }}>
                                    <label class="form-check-label">Active</label>
                                </div>
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button class="btn btn-primary">{{ isset($service) ? 'Update' : 'Create' }}</button>
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
        $(document).ready(function() {
            // Thumbnail preview
            $("#thumbSelect").change(function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Main image preview
            $("#mainSelect").change(function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#mainPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endpush
