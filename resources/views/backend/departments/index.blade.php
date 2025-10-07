@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">

        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item first">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="ri-home-3-line"></i>
                </a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
               / Departments List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <!-- Sales stats starts -->
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.departments.create') }}" class="btn btn-primary mb-3">Add New Department</a>
        </div>
        <!-- Sales stats ends -->
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
                        <th>Thumbnail Image</th>
                        <th>Main Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments ?? [] as $key => $department)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>
                                @if ($department->thumb_image_url)
                                    <img src="{{ $department->thumb_image_url }}" width="80">
                                @endif
                            </td>
                             <td>
                                @if ($department->main_image_url)
                                    <img src="{{ $department->main_image_url }}" width="80">
                                @endif
                            </td>
                            <td>
                                {{ $department->name }}
                            </td>
                            <td>{{ $department->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $department->order }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.departments.edit', $department) }}"
                                        class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit department">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    <form action="{{ route('admin.departments.destroy', $department->id) }}"
                                        id="form_{{ $department->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $department->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                <span class="my-4 fw-bold">No Data Found....</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Table ends -->

        {{ $departments->links() }}
    </div>
@endsection
