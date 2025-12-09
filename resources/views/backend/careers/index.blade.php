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
                / Career List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <!-- Sales stats starts -->
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.career.create') }}" class="btn btn-primary mb-3">Add New Career</a>
        </div>
        <!-- Sales stats ends -->
    </div>
@endsection
@section('content')
    <div class="container py-4">
        <!-- Table starts -->
        <div class="table-responsive">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($careers as $career)
                        <tr>
                            <td>{{ $career->title }}</td>
                            <td>{{ $career->location }}</td>
                            <td>{{ $career->type }}</td>
                            <td>{{ Str::limit($career->description, 60) }}</td>
                            <td>
                                <a href="{{ route('admin.career.edit', $career->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.career.destroy', $career->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No data found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $careers->links() }}
        </div>
    </div>
@endsection
