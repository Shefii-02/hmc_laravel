@extends('layouts.backend-app')
@section('breadcrumb')
    <div class="app-hero-header d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="ri-home-3-line"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.appointments.index') }}">/ Appointment List /</a></li>
            <li class="breadcrumb-item text-primary" aria-current="page">
                {{ isset($appointment) ? 'Edit Appointment' : 'Add Appointment' }}
            </li>
        </ol>
        <div class="ms-auto d-lg-flex d-none flex-row">
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary mb-3">Back</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container py-4">
        <form id="appointmentForm"
            action="{{ isset($appointment) ? route('admin.appointments.update', $appointment->id) : route('admin.appointments.store') }}"
            method="POST">
            @csrf
            @if (isset($appointment))
                @method('PUT')
            @endif

            {{-- 🔍 Patient Search --}}
            <div class="mb-3">
                <label class="form-label">Search Patient (Name / Mobile / Email)</label>
                <input type="text" id="patientSearch" class="form-control" placeholder="Enter name, mobile, or email">
                <div id="searchResults" class="list-group mt-2" style="display:none; max-height:200px; overflow-y:auto;">
                </div>
            </div>

            {{-- 👤 Patient Details Section --}}
            <div id="patientDetails" style="display:none;">
                <h5>Patient Information</h5>
                <input type="hidden" name="patient_id" id="patient_id">
                <div class="mb-3">
                    <label class="form-label">Patient Name</label>
                    <input type="text" name="full_name" id="patient_name" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="phone" id="patient_mobile" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="patient_email" class="form-control" readonly>
                </div>
            </div>

            {{-- ➕ New Patient Form --}}
            <div id="newPatientForm" style="display:none;">
                <h5>Patient Information</h5>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="new_name" id="new_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="new_mobile" id="new_mobile" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="new_email" id="new_email" class="form-control">
                </div>
            </div>

            <hr>

            {{-- Appointment Details --}}
            <div id="appointmentSection" style="display:none;">
                <div class="mb-3">
                    <label class="form-label">Doctor</label>
                    <select name="doctor_id" class="form-select" required>
                        <option value="">Select Doctor</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}"
                                {{ old('doctor_id', $appointment->doctor_id ?? '') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Appointment Date & Time</label>
                    <input type="datetime-local" name="appointment_time" class="form-control"
                        value="{{ old('appointment_time', isset($appointment->appointment_time) ? $appointment->appointment_time : '') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        @foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status', $appointment->status ?? '') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" class="form-control" rows="3">{{ old('notes', $appointment->notes ?? '') }}</textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">{{ isset($appointment) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('patientSearch');
    const resultsBox = document.getElementById('searchResults');
    const patientDetails = document.getElementById('patientDetails');
    const newPatientForm = document.getElementById('newPatientForm');
    const appointmentSection = document.getElementById('appointmentSection');

    const newName = document.getElementById('new_name');
    const newMobile = document.getElementById('new_mobile');
    const newEmail = document.getElementById('new_email');

    let searchTimeout;

    // 🔍 Search as you type
    searchInput.addEventListener('keyup', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        if (query.length < 2) {
            resultsBox.style.display = 'none';
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/admin/patients/search?q=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    resultsBox.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(patient => {
                            const item = document.createElement('a');
                            item.href = 'javascript:void(0)';
                            item.classList.add('list-group-item', 'list-group-item-action');
                            item.textContent = `${patient.full_name} (${patient.phone})`;
                            item.addEventListener('click', () => selectPatient(patient));
                            resultsBox.appendChild(item);
                        });
                        resultsBox.style.display = 'block';
                    } else {
                        resultsBox.innerHTML =
                            '<div class="list-group-item text-muted">No patient found. <a href="#" id="addNewPatient">Add New</a></div>';
                        resultsBox.style.display = 'block';
                        document.getElementById('addNewPatient').addEventListener('click', showNewPatientForm);
                    }
                });
        }, 400);
    });

    // ✅ Select an existing patient
    function selectPatient(patient) {
        document.getElementById('patient_id').value = patient.id;
        document.getElementById('patient_name').value = patient.full_name;
        document.getElementById('patient_mobile').value = patient.phone;
        document.getElementById('patient_email').value = patient.email;

        // Hide search and new form
        resultsBox.style.display = 'none';
        newPatientForm.style.display = 'none';
        appointmentSection.style.display = 'block';
        patientDetails.style.display = 'block';

        // Clear new patient form fields
        clearNewPatientFields();
    }

    // ✅ Show Add New Patient form
    function showNewPatientForm() {
        // Hide other sections
        patientDetails.style.display = 'none';
        resultsBox.style.display = 'none';

        // Clear search and old patient data
        searchInput.value = '';
        clearExistingPatientFields();

        // Clear and show new patient form
        clearNewPatientFields();
        newPatientForm.style.display = 'block';
        appointmentSection.style.display = 'block';
    }

    // ✅ Clear new patient form fields
    function clearNewPatientFields() {
        newName.value = '';
        newMobile.value = '';
        newEmail.value = '';
    }

    // ✅ Clear existing patient details fields
    function clearExistingPatientFields() {
        document.getElementById('patient_id').value = '';
        document.getElementById('patient_name').value = '';
        document.getElementById('patient_mobile').value = '';
        document.getElementById('patient_email').value = '';
    }

    // ✅ (Optional) Handle AJAX save for new patient
    // const saveNewPatientBtn = document.getElementById('saveNewPatient');
    // if (saveNewPatientBtn) {
    //     saveNewPatientBtn.addEventListener('click', function() {
    //         const payload = {
    //             name: newName.value,
    //             mobile: newMobile.value,
    //             email: newEmail.value,
    //             _token: '{{ csrf_token() }}'
    //         };
    //         fetch(`/admin/patients/store-ajax`, {
    //             method: 'POST',
    //             headers: { 'Content-Type': 'application/json' },
    //             body: JSON.stringify(payload)
    //         })
    //             .then(res => res.json())
    //             .then(patient => selectPatient(patient));
    //     });
    // }
});
</script>
@endpush
