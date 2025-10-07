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
                / Doctors List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Doctor
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
                        <th width="5%">#</th>
                        <th width="10%">Photo</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th width="15%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $index => $doctor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ $doctor->photo_url }}" width="60" class="rounded border">
                            </td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->departments ? implode(',', $doctor->departments) : '--' }}</td>
                            <td>{{ $doctor->designation ?? '-' }}</td>
                            <td>{{ $doctor->qualification ?? '-' }}</td>
                            <td>{{ $doctor->experience_years ? $doctor->experience_years . ' yrs' : '--' }}</td>

                            <td>{{ $doctor->order ?? 0 }}</td>
                            <td>
                                @if ($doctor->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-start">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}"
                                        id="form_{{ $doctor->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $doctor->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">No doctors found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
