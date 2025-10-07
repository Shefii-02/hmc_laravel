@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">

        <!-- Breadcrumb starts -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item first">
                <a href="{{ route('admin.index') }}">
                    <i class="ri-home-3-line"></i>
                </a>
            </li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                Dashboard
            </li>
        </ol>
        <!-- Breadcrumb ends -->

        <!-- Sales stats starts -->
        {{-- <div class="ms-auto d-lg-flex d-none flex-row">
            <div class="input-group">
                <span class="input-group-text bg-primary-lighten">
                    <i class="ri-calendar-2-line text-primary"></i>
                </span>
                <input type="text" id="abc" class="form-control custom-daterange">
            </div>
        </div> --}}
        <!-- Sales stats ends -->

    </div>
@endsection

@section('content')
    <!-- Row starts -->
    <div class="row gx-4">
        <div class="col-sm-12">
            <div class="card mb-4">
                <!-- Week tabs starts -->
                <ul class="nav justify-content-center gap-1 flex-wrap week-days-btn-group" id="weekTab" role="tablist">
                    @foreach ($weekDays as $key => $day)
                        <li class="nav-item" role="presentation">
                            <a class="btn {{ $key === 0 ? 'btn-primary active' : 'btn-light' }}"
                                id="day-tab-{{ $key }}" data-bs-toggle="tab" href="#day{{ $key }}"
                                role="tab" aria-controls="day{{ $key }}"
                                aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                {{ $day['dayName'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- Week tabs ends -->

                <div class="card-body">
                    <h5 class="text-center my-4">Upcoming Appointments</h5>

                    <div class="tab-content mt-4" id="weekTabContent">
                        @foreach ($weekDays as $key => $day)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="day{{ $key }}"
                                role="tabpanel" aria-labelledby="day-tab-{{ $key }}">

                                <div class="row g-2 justify-content-center">
                                    @forelse ($day['appointments'] as $appointment)
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <a href="{{ route('admin.patients.show', $appointment->patient->id ?? 0) }}"
                                                class="d-flex align-items-center gap-3 appointment-card">
                                                <img src="{{ $appointment->patient->image_url ?? $appointment->patient->gender ? asset('assets/images/avatar-1.png') : asset('assets/images/avatar-2.png')  }}"
                                                    class="img-3x rounded-5" alt="Patient Image">
                                                <div class="d-flex flex-column flex-fill">
                                                    <div class="fw-semibold text-truncate">
                                                        {{ $appointment->patient->full_name ?? 'Unknown' }}
                                                    </div>
                                                    <div class="text-muted small">
                                                        {{ $appointment->doctor->name ?? 'General' }}
                                                    </div>
                                                </div>

                                                @php
                                                    $badgeColor = match ($appointment->status) {
                                                        'pending' => 'bg-secondary',
                                                        'confirmed' => 'bg-info',
                                                        'completed' => 'bg-success',
                                                        'cancelled' => 'bg-danger',
                                                        default => 'bg-light text-dark',
                                                    };
                                                @endphp

                                                <span class="badge {{ $badgeColor }}">
                                                    {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i a') }}
                                                </span>
                                            </a>
                                        </div>
                                    @empty
                                        <p class="text-center text-muted mt-3">
                                            No appointments on {{ $day['dayName'] }}
                                        </p>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row ends -->

    <!-- Row starts -->
    <div class="row gx-4">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-body mh-190">
                    <h5 class="card-title mb-4">Available Departments</h5>
                    <div class="d-flex justify-content-center gap-4 flex-wrap">
                        @forelse ($departments as $dept)
                            <a href="{{ route('admin.departments.show', $dept->id) }}" class="text-center">
                                <div class="icon-box xl primary rounded-3 mb-1">
                                    <img src="{{ $dept->icon ?? asset('assets/backend/images/icons/infusion.svg') }}"
                                        class="img-2x" alt="{{ $dept->name }}">
                                </div>
                                {{ $dept->name }}
                            </a>
                        @empty
                            <p class="text-muted">No departments available</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->

    <!-- Row starts -->
    <div class="row gx-4">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Statistics</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-4">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                                <div class="me-2">
                                    <div id="sparkline1"></div>
                                </div>
                                <div class="m-0">
                                    <h4 class="m-0 fw-bold">{{ $totalPatients }}</h4>
                                    <small>Patients</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                                <div class="me-2">
                                    <div id="sparkline2"></div>
                                </div>
                                <div class="m-0">
                                    <div class="fs-4 fw-bold">{{ $totalAppointments }}</div>
                                    <small>Appointments</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                                <div class="me-2">
                                    <div id="sparkline3"></div>
                                </div>
                                <div class="m-0">
                                    <div class="fs-4 fw-bold">{{ $totalDoctors }}</div>
                                    <small>Doctors</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                                <div class="me-2">
                                    <div id="sparkline4"></div>
                                </div>
                                <div class="m-0">
                                    <div class="fs-4 fw-bold">{{ $totalDepartments }}</div>
                                    <small>Departments</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Row ends -->
@endsection
