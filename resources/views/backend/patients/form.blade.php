@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">/ Patient List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($patient) ? 'Edit Patient' : 'Add Patient' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.patients.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection
@section('content')
<div class="container py-4">


    <form action="{{ isset($patient) ? route('admin.patients.update', $patient->id) : route('admin.patients.store') }}" method="POST">
        @csrf
        @if(isset($patient)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $patient->full_name ?? '') }}" required>
            @error('full_name') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $patient->email ?? '') }}">
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone ?? '') }}">
            @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob', isset($patient->dob) ? $patient->dob : '') }}">
            @error('dob') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', $patient->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $patient->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $patient->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="3">{{ old('address', $patient->address ?? '') }}</textarea>
            @error('address') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">{{ isset($patient) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>
@endsection
