@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">/ Testimonials List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($testimonial) ? 'Edit Testimonial' : 'Add New Testimonial' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary mb-3">Back</a>
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
                            action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($testimonial))
                                @method('PUT')
                            @endif
                            <div class=" mb-3">
                                <label class="form-label">Photo <small>Size:100*100 px</small></label>
                                <div class="mb-2">
                                    <img id="imgPreview" width="150"
                                        src="{{ old('photo', isset($testimonial) ? $testimonial->image_url : '') }}"
                                        class="rounded border">
                                </div>


                                <input type="file" name="image" id="imgSelect" class="form-control">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $testimonial->name ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control"
                                    value="{{ old('designation', $testimonial->designation ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" rows="4">{{ old('message', $testimonial->message ?? '') }}</textarea>
                            </div>


                            <div class="col-md-3 mb-3">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control"
                                    value="{{ old('order', $doctor->order ?? 0) }}">
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" name="is_active" value="1" class="form-check-input"
                                    {{ old('is_active', $testimonial->is_active ?? 1) ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>

                            <button type="submit"
                                class="btn btn-primary">{{ isset($testimonial) ? 'Update' : 'Save' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
