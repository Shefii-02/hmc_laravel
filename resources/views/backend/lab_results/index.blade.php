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
                / Lab Results
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.lab-results.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Lab Result
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
                    <th>Patient</th>
                    <th>Test Name</th>
                    <th>Test Date</th>
                    <th>Result File</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($labResults as $result)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $result->patient->full_name }} - {{ $result->patient->phone }}</td>
                        <td>{{ $result->test_name }}</td>
                        <td>{{ $result->test_date }}</td>
                        <td>
                            @if($result->file)
                                <a href="{{ asset('storage/'.$result->file->file_path) }}" target="_blank">View</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $result->remarks }}</td>
                        <td>
                            <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.lab-results.edit', $result->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.lab-results.destroy', $result->id) }}"
                                        id="form_{{ $result->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $result->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No lab results found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $labResults->links() }}
    </div>
</div>
@endsection
