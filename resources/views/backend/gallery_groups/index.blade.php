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
                / Gallery Group List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.gallery_groups.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Group
            </a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <!-- Table starts -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Main Image</th>
                        <th>Images Count</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleryGroups ?? [] as $group)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $group->title }}</td>
                            <td>

                                @if ($group->main_image_url)
                                    <img src="{{ $group->main_image_url }}" alt="" width="100"
                                        class="rounded">
                                @endif
                            </td>
                            <td>
                                {{ $group->items->count() }}
                            </td>
                            <td>
                                <span class="badge {{ $group->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $group->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $group->order }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                     <a href="{{ route('admin.gallery_items.create') }}?group={{ $group->id }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-add-fill"></i>
                                    </a>

                                    <a href="{{ route('admin.gallery_groups.edit', $group->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.gallery_groups.destroy', $group->id) }}"
                                        id="form_{{ $group->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $group->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No gallery groups found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $galleryGroups->links() }}
            </div>
        </div>
    </div>
@endsection
