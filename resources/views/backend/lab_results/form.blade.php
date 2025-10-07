@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.lab-results.index') }}">/ Doctor List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($newsEvent) ? 'Edit News and Event' : 'Add News and Event' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.lab-results.index') }}" class="btn btn-primary mb-3">Back</a>
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
                            action="{{ isset($labResult) ? route('admin.lab-results.update', $labResult->id) : route('admin.lab-results.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($labResult))
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Patient <span class="text-danger">*</span></label>
                                <select name="patient_id" class="form-select" required>
                                    <option value="">Select Patient</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ old('patient_id', $labResult->patient_id ?? '') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->full_name }} {{ $patient->phone }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('patient_id')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Test Name <span class="text-danger">*</span></label>
                                <input type="text" name="test_name" class="form-control"
                                    value="{{ old('test_name', $labResult->test_name ?? '') }}" required>
                                @error('test_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Result File</label>
                                @if (isset($labResult) && $labResult->file)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $labResult->file->file_path) }}"
                                            target="_blank">Current File</a>
                                    </div>
                                @endif
                                <input type="file" name="result_file" class="form-control">
                                @error('result_file')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Test Date</label>
                                <input type="date" name="test_date" class="form-control"
                                    value="{{ old('test_date', isset($labResult->test_date) ? $labResult->test_date : '') }}">
                                @error('test_date')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <textarea name="remarks" class="form-control" rows="3">{{ old('remarks', $labResult->remarks ?? '') }}</textarea>
                                @error('remarks')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($labResult) ? 'Update' : 'Create' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
