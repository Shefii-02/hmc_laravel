@extends('layouts.backend-app')

@section('breadcrumb')
<div class="app-hero-header d-flex align-items-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><i class="ri-home-3-line"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.departments.index') }}">/ Departments List /</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            {{ isset($department) ? 'Edit Department' : 'Add New Department' }}
        </li>
    </ol>
    <div class="ms-auto d-lg-flex d-none flex-row">
        <a href="{{ route('admin.departments.index') }}" class="btn btn-primary mb-3">Back</a>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row gx-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ isset($department) ? route('admin.departments.update', $department->id) : route('admin.departments.store') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($department))
                            @method('PUT')
                        @endif

                        <div class="row gx-4">
                            <div class="col-sm-12">
                                <div class="bg-light rounded-2 px-3 py-2 mb-3">
                                    <h6 class="m-0">Department Details</h6>
                                </div>
                            </div>

                            {{-- Thumbnail Image --}}
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <label class="form-label">Thumbnail Image (Icon)</label>
                                <div class="mb-2">
                                    <img id="thumbPreview" width="150"
                                         src="{{ old('thumbnail_file', isset($department) && $department->thumb_image_url ? $department->thumb_image_url : asset('images/no-image.png')) }}"
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
                                         src="{{ old('main_image_file', isset($department) && $department->main_image_url ? $department->main_image_url : asset('images/no-image.png')) }}"
                                         class="rounded border">
                                </div>
                                <input type="file" name="main_image_file" id="mainSelect" class="form-control">
                                @error('main_image_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Name --}}
                            <div class="col-12 mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name', $department->name ?? '') }}" placeholder="Enter name">
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="col-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3"
                                          placeholder="Enter description">{{ old('description', $department->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Order --}}
                            <div class="col-lg-3 col-sm-6 mb-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control"
                                       value="{{ old('order', $department->order ?? 0) }}" placeholder="Order">
                                @error('order')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="col-12 mb-3">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="is_active" class="form-check-input" value="1" id="is_active"
                                           {{ old('is_active', $department->is_active ?? 1) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="d-flex gap-2 justify-content-end">
                                    <button class="btn btn-primary">
                                        {{ isset($department) ? 'Update' : 'Create' }}
                                    </button>
                                </div>
                            </div>
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
