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
                / Banners List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <!-- Sales stats starts -->
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Add New Banner</a>
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
                        <th>Image</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banners ?? [] as $key => $banner)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>

                                @if ($banner->image_url)
                                    <img src="{{ $banner->image_url }}" width="80">
                                @endif
                            </td>
                            <td>{{ $banner->order }}</td>
                            <td><span
                                    class="badge {{ $banner->is_active ? 'bg-info' : 'bg-danger' }}">{{ $banner->is_active ? 'Active' : 'Inactive' }}</span>
                            </td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.banners.edit', $banner) }}"
                                        class="btn btn-outline-success btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit Staff Member">
                                        <i class="ri-edit-box-line"></i>
                                    </a>
                                    <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                        id="form_{{ $banner->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $banner->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <span class="my-4 fw-bold">No Data Found....</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Table ends -->



        {{ $banners->links() }}
    </div>
@endsection
