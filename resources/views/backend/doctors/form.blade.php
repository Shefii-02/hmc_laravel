@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.doctors.index') }}">/ Doctor List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($doctor) ? 'Edit Doctor' : 'Add New Doctor' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-primary mb-3">Back</a>
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
                            action="{{ isset($doctor) ? route('admin.doctors.update', $doctor->id) : route('admin.doctors.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($doctor))
                                @method('PUT')
                            @endif

                            <div class="row gx-4">
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Photo</label>
                                    <div class="mb-2">
                                        <img id="imgPreview" width="150"
                                            src="{{ old('photo', isset($doctor) ? $doctor->photo_url : '') }}"
                                            class="rounded border">
                                    </div>


                                    <input type="file" name="photo" id="imgSelect" class="form-control">
                                    @error('photo')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $doctor->name ?? '') }}" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        value="{{ old('designation', $doctor->designation ?? '') }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Department</label>
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($departments as $key => $dept)
                                                <div class="form-check form-switch col-4">

                                                    <input class="form-check-input" {{ isset($doctor) && in_array($dept->name,$doctor->departments) ? 'checked' : '' }} value="{{ $dept->id }}" name="department_ids[]" type="checkbox"
                                                        id="dept_{{ $key }}">
                                                    <label class="form-check-label"
                                                        for="dept_{{ $key }}">{{ $dept->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>



                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control"
                                        value="{{ old('qualification', $doctor->qualification ?? '') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Experience (Years)</label>
                                    <input type="number" name="experience_years" class="form-control"
                                        value="{{ old('experience_years', $doctor->experience_years ?? '') }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="bio" class="form-control" rows="3">{{ old('bio', $doctor->bio ?? '') }}</textarea>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Display Order</label>
                                    <input type="number" name="order" class="form-control"
                                        value="{{ old('order', $doctor->order ?? 0) }}">
                                </div>

                                <div class="col-md-12 mb-3 d-flex align-items-center">
                                    <div class="form-check form-switch mt-4">
                                        <input type="checkbox" class="form-check-input" name="status" value="1"
                                            id="status" {{ old('status', $doctor->status ?? 1) ? 'checked' : '' }}>
                                        <label for="status" class="form-check-label">Active</label>
                                    </div>
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button class="btn btn-primary">{{ isset($doctor) ? 'Update' : 'Create' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
