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
                / Appointments
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary mb-3">
                <i class="ri-add-line"></i> Add Appointment
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
                        <th>Doctor</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appointment->patient->full_name }} - {{ $appointment->patient->phone }}</td>
                            <td>{{ $appointment->doctor->name }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>

                                <span
                                    class="badge {{ match ($appointment->status) {
                                        'pending' => 'bg-secondary',
                                        'confirmed' => 'bg-info',
                                        'completed' => 'bg-success',
                                        'cancelled' => 'bg-danger',
                                        default => 'bg-light',
                                    } }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>

                            </td>
                            <td>{{ $appointment->notes }}</td>
                            <td>
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.appointments.edit', $appointment->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.appointments.destroy', $appointment->id) }}"
                                        id="form_{{ $appointment->id }}" method="POST" class="d-inline-block  w-full">
                                        @csrf @method('DELETE')
                                        <a role="button" href="javascript:;" class="btn btn-outline-danger btn-sm"
                                            onclick="confirmDelete({{ $appointment->id }})">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $appointments->links() }}
        </div>
    </div>
@endsection
