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
                <a href="{{ route('admin.banners.index') }}">
                    / Banners List /
                </a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($banner) ? 'Edit Banner' : 'Add New Banner' }}
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <!-- Sales stats starts -->
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.banners.index') }}" class="btn btn-primary mb-3">Back</a>
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
                            action="{{ isset($banner) ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}"
                            method="POST" enctype="multipart/form-data">

                            @csrf
                            @if (isset($banner))
                                @method('PUT')
                            @endif

                            <!-- Row starts -->
                            <div class="row2 gx-4">
                                <div class="col-sm-12">
                                    <div class="bg-light rounded-2 px-3 py-2 mb-3">
                                        <h6 class="m-0">Banner Details</h6>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-lg-3 col-sm-12">


                                    <div class="mb-3">
                                        <label class="form-label">Image<small>Size:1360*1020 px</small></label>

                                        <div class="mb-2">
                                            <img id="imgPreview" width="150"
                                                src="{{ old('avatar', isset($banner) ? $banner->image_url : '' ?? '') }}"
                                                class="rounded border">
                                        </div>
                                        <input type="file" name="image" id="imgSelect" class="form-control">
                                        @error('image')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6 d-none">
                                    <div class="mb-3">
                                        <label class="form-label" for="a1">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ old('title', $banner->title ?? '') }}" placeholder="Enter title">
                                        @error('title')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6 d-none">
                                    <div class="mb-3">
                                        <label class="form-label" for="a2">Sub title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                            value="{{ old('subtitle', $banner->subtitle ?? '') }}"
                                            placeholder="Enter subtitle">
                                        @error('subtitle')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xxl-3 col-lg-4 col-sm-6 d-none">
                                    <div class="mb-3">
                                        <label class="form-label" for="a3">Redirection Link<span
                                                class="text-danger"></span></label>
                                        <input type="email" class="form-control" name="link" id="link"
                                            value="{{ old('link', $banner->link ?? '') }}"
                                            placeholder="Enter Redirection Link">
                                        @error('link')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="a7">Display Order <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="order" id="order"
                                            value="{{ old('order', $banner->order ?? 0) }}" placeholder="Display Order">
                                        @error('order')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-lg-12 col-sm-12">
                                    <div class="form-check form-switch mb-3">
                                        <input type="checkbox" class="form-check-input" value="1" name="status"
                                            id="status" {{ old('status', $banner->status ?? 1) ? 'checked' : '' }}>
                                        <label for="status" class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex gap-2 justify-content-end">

                                        <button class="btn btn-primary">
                                            {{ isset($banner) ? 'Update' : 'Create' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Row ends -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

