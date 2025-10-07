@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.patients.index') }}">/ Patient List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
              Patient Details
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.patients.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection
@section('content')
<div class="container py-4">
    <h4>Patient Details</h4>

    <div class="card mb-4">
        <div class="card-body">
            <h5>{{ $patient->name }}</h5>
            <p><strong>Email:</strong> {{ $patient->email }}</p>
            <p><strong>Phone:</strong> {{ $patient->phone }}</p>
            <p><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</p>
        </div>
    </div>

    <ul class="nav nav-tabs" id="patientTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="appointments-tab" data-bs-toggle="tab" data-bs-target="#appointments_"
                type="button" role="tab">Appointments</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="labresults-tab" data-bs-toggle="tab" data-bs-target="#labresults"
                type="button" role="tab">Lab Results</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="patientTabsContent">
        <!-- Appointments -->
        <div class="tab-pane fade show active" id="appointments_" role="tabpanel">
            @if ($patient->appointments->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Doctor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient->appointments as $appt)
                            <tr>
                                <td>{{ $appt->appointment_time }}</td>
                                <td>{{ $appt->doctor->name ?? 'N/A' }}</td>
                                <td>{{ ucfirst($appt->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No appointments found.</p>
            @endif
        </div>

        <!-- Lab Results -->
        <div class="tab-pane fade" id="labresults" role="tabpanel">
            @if ($patient->labResults->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Date</th>
                            <th>Remarks</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patient->labResults as $result)
                            <tr>
                                <td>{{ $result->test_name }}</td>
                                <td>{{ $result->test_date?->format('d M Y') }}</td>
                                <td>{{ $result->remarks ?? '-' }}</td>
                                <td>
                                    @if ($result->resultFile)
                                        <a href="{{ asset('storage/' . $result->resultFile->file_path) }}" target="_blank" class="btn btn-sm btn-success">
                                            View PDF
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No lab results found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
