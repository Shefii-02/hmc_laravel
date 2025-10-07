@extends('layouts.backend-app')
@section('content')
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
                / Vlogs
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.blogs.vlogs.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add New Vlog
            </a>
        </div>
    </div>
@endsection


<div class="container">
    <!-- Table starts -->
    <div class="table-responsive">
        <table id="scrollVertical" class="table m-0 align-middle">

            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Video</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vlogs as $vlog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $vlog->title }}</td>
                        <td>

                            <img src="https://img.youtube.com/vi/{{ $vlog->video_url }}/0.jpg" width="100"
                                class="rounded">

                        </td>
                        <td>
                            @if ($vlog->video_url)
                                <iframe width="150" height="80"
                                    src="https://www.youtube.com/embed/{{ $vlog->video_url }}" frameborder="0"
                                    allowfullscreen></iframe>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $vlog->status == 'published' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($vlog->status) }}
                            </span>
                        </td>
                        <td>{{ $vlog->order }}</td>
                        <td>{{ $vlog->created_at?->format('d-m-Y H:i') }}</td>

                        <td>
                            <div class="d-inline-flex gap-1">
                                <a href="{{ route('admin.blogs.vlogs.edit', $vlog->id) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="{{ route('admin.blogs.vlogs.destroy', $vlog->id) }}"
                                    id="form_{{ $vlog->id }}" method="POST" class="d-inline-block  w-full">
                                    @csrf @method('DELETE')
                                    <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                        onclick="confirmDelete({{ $vlog->id }})">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No vlogs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <div class="mt-3">
        {{ $vlogs->links() }}
    </div>
</div>
@endsection
