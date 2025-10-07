@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    <i class="ri-home-3-line"></i>
                </a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                / Testimonial List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Testimonial
            </a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <!-- Table starts -->
        <div class="table-responsive">
            <table id="scrollVertical" class="table m-0 align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $key => $testimonial)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if ($testimonial->image_url)
                                    <img src="{{ $testimonial->image_url }}" width="80" class="rounded-circle">
                                @endif
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->designation ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                 <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                        id="form_{{ $testimonial->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $testimonial->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
@endsection
