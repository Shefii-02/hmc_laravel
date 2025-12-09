@extends('layouts.backend-app')

@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="ri-home-3-line"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.career.index') }}">/ Career List /</a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($career) ? 'Edit Career Post' : 'Add New Career Post' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.career.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row gx-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ isset($career) ? route('admin.career.update', $career->id) : route('admin.career.store')  }}" method="POST">
                            @csrf
                            @if(isset($career))
                            @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Job Title *</label>
                                <input type="text" name="title" value="{{ isset($career) ? $career->title : '' }}" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" value="{{ isset($career) ? $career->location : '' }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Job Type</label>
                                <input type="text" name="type" value="{{ isset($career) ? $career->type : '' }}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="5" class="form-control">{{ isset($career) ? $career->description : '' }}</textarea>
                            </div>

                            <button class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.career.index') }}" class="btn btn-secondary">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
