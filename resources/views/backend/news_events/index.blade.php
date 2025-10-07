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
                / News & Events
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.blogs.news-events.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add New
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <!-- Table starts -->
        <div class="table-responsive">
            <table id="scrollVertical" class="table m-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Published At</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($newsEvents as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->image_url)
                                    <img src="{{ $item->image_url }}" width="100" class="rounded">
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>{{ $item->published_at ?? '-' }}</td>
                            <td>{{ $item->order }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.blogs.news-events.edit', $item->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.blogs.news-events.destroy', $item->id) }}"
                                        id="form_{{ $item->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $item->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No news/events found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $newsEvents->links() }}
        </div>
    </div>
@endsection
