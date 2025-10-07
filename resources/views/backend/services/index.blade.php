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
                / Services List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Service
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
                        <th>Thumbnail</th>
                        <th>Main Image</th>
                        <th>Title</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if ($service->thumbnail_url)
                                    <img src="{{ $service->thumbnail_url }}" width="80">
                                @endif
                            </td>
                            <td>
                                @if ($service->main_image_url)
                                    <img src="{{ $service->main_image_url }}" width="80">
                                @endif
                            </td>
                            <td>{{ $service->title }}</td>

                            <td>{{ $service->order }}</td>
                            <td>
                                <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                 <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                        class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit Staff Member">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service->id) }}"
                                        id="form_{{ $service->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $service->id }})">
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
                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection
