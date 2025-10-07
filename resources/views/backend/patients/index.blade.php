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
                / Patients List
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.patients.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Patient
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patients as $patient)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $patient->full_name }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->dob }}</td>
                            <td>{{ ucfirst($patient->gender) }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">

                                      <a href="{{ route('admin.patients.show', $patient->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                    <a href="{{ route('admin.patients.edit', $patient->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.patients.destroy', $patient->id) }}"
                                        id="form_{{ $patient->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $patient->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


            <div class="mt-3">
                {{ $patients->links() }}
            </div>
        </div>
    </div>
@endsection
