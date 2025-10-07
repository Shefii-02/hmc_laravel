@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.appointments.index') }}">/ Appointment List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
               Edit Appointment
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection
@section('content')
<div class="container py-4">
    <form id="appointmentForm" action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- 🔍 Patient Section --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Patient Details</strong>
                <button type="button" class="btn btn-sm btn-outline-primary" id="changePatientBtn">
                    Change Patient
                </button>
            </div>

            <div class="card-body">
                {{-- Current Patient Info --}}
                <div id="currentPatient">
                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $appointment->patient->id }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" id="patient_name" class="form-control" value="{{ $appointment->patient->full_name }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mobile</label>
                            <input type="text" id="patient_mobile" class="form-control" value="{{ $appointment->patient->phone }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="text" id="patient_email" class="form-control" value="{{ $appointment->patient->email }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Search/Select New Patient --}}
                <div id="patientSearchSection" style="display:none;">
                    <div class="mb-3">
                        <label class="form-label">Search Patient (Name / Mobile / Email)</label>
                        <input type="text" id="patientSearch" class="form-control" placeholder="Enter name, mobile, or email">
                        <div id="searchResults" class="list-group mt-2" style="display:none; max-height:200px; overflow-y:auto;"></div>
                    </div>
                    <div id="newPatientForm" style="display:none;">
                        <h6>Add New Patient</h6>
                        <div class="mb-2"><input type="text" id="new_name" class="form-control" placeholder="Full Name"></div>
                        <div class="mb-2"><input type="text" id="new_mobile" class="form-control" placeholder="Mobile"></div>
                        <div class="mb-2"><input type="email" id="new_email" class="form-control" placeholder="Email (optional)"></div>
                        <button type="button" id="saveNewPatient" class="btn btn-success btn-sm">Save & Select</button>
                        <button type="button" id="cancelChange" class="btn btn-secondary btn-sm ms-2">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 🗓 Appointment Info --}}
        <div class="card">
            <div class="card-header"><strong>Appointment Details</strong></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Doctor</label>
                    <select name="doctor_id" class="form-select" required>
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Appointment Date & Time</label>
                    <input type="datetime-local" name="appointment_time" class="form-control"
                        value="{{ $appointment->appointment_time }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        @foreach(['pending','confirmed','completed','cancelled'] as $status)
                            <option value="{{ $status }}" {{ $appointment->status == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="3">{{ $appointment->notes }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const changeBtn = document.getElementById('changePatientBtn');
    const currentSection = document.getElementById('currentPatient');
    const searchSection = document.getElementById('patientSearchSection');
    const searchInput = document.getElementById('patientSearch');
    const searchResults = document.getElementById('searchResults');
    const newPatientForm = document.getElementById('newPatientForm');
    const cancelBtn = document.getElementById('cancelChange');

    let searchTimer;

    // 🔄 Toggle Search Mode
    changeBtn.addEventListener('click', () => {
        currentSection.style.display = 'none';
        searchSection.style.display = 'block';
        searchInput.focus();
    });

    cancelBtn.addEventListener('click', () => {
        currentSection.style.display = 'block';
        searchSection.style.display = 'none';
    });

    // 🔍 Search as you type
    searchInput.addEventListener('keyup', function() {
        clearTimeout(searchTimer);
        const query = this.value.trim();
        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        searchTimer = setTimeout(() => {
            fetch(`/admin/patients/search?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    searchResults.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(patient => {
                            const item = document.createElement('a');
                            item.href = 'javascript:void(0)';
                            item.classList.add('list-group-item', 'list-group-item-action');
                            item.textContent = `${patient.full_name} (${patient.phone})`;
                            item.addEventListener('click', () => selectPatient(patient));
                            searchResults.appendChild(item);
                        });
                        searchResults.style.display = 'block';
                    } else {
                        searchResults.innerHTML = '<div class="list-group-item text-muted">No patient found. <a href="#" id="addNewPatient">Add New</a></div>';
                        searchResults.style.display = 'block';
                        document.getElementById('addNewPatient').addEventListener('click', showNewPatientForm);
                    }
                });
        }, 400);
    });

    function selectPatient(patient) {
        document.getElementById('patient_id').value = patient.id;
        document.getElementById('patient_name').value = patient.full_name;
        document.getElementById('patient_mobile').value = patient.mobile;
        document.getElementById('patient_email').value = patient.email;

        currentSection.style.display = 'block';
        searchSection.style.display = 'none';
    }

    function showNewPatientForm() {
        searchResults.style.display = 'none';
        newPatientForm.style.display = 'block';
    }

    document.getElementById('saveNewPatient').addEventListener('click', function() {
        const payload = {
            name: document.getElementById('new_name').value,
            mobile: document.getElementById('new_mobile').value,
            email: document.getElementById('new_email').value,
            _token: '{{ csrf_token() }}'
        };
        fetch(`/admin/patients/store-ajax`, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(patient => selectPatient(patient));
    });
});
</script>
@endpush
