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
                                <input type="text" id="patient_name" class="form-control"
                                    value="{{ $appointment->patient->full_name }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Mobile</label>
                                <input type="text" id="patient_mobile" class="form-control"
                                    value="{{ $appointment->patient->phone }}" readonly>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Email</label>
                                <input type="text" id="patient_email" class="form-control"
                                    value="{{ $appointment->patient->email }}" readonly>
                            </div>
                        </div>
                    </div>

                    {{-- Search/Select New Patient --}}
                    <div id="patientSearchSection" style="display:none;">
                        <div class="mb-3">
                            <label class="form-label">Search Patient (Name / Mobile / Email)</label>
                            <input type="text" id="patientSearch" class="form-control"
                                placeholder="Enter name, mobile, or email">
                            <div id="searchResults" class="list-group mt-2"
                                style="display:none; max-height:200px; overflow-y:auto;"></div>
                        </div>
                        <div id="newPatientForm" style="display:none;">
                            <h6>Add New Patient</h6>
                            <div class="mb-2"><input type="text" id="new_name" class="form-control"
                                    placeholder="Full Name"></div>
                            <div class="mb-2"><input type="text" id="new_mobile" class="form-control"
                                    placeholder="Mobile"></div>
                            <div class="mb-2"><input type="email" id="new_email" class="form-control"
                                    placeholder="Email (optional)"></div>
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

                    {{-- Doctor --}}
                    <div class="mb-3">
                        <label class="form-label">Doctor</label>
                        <select id="doctorSelect" name="doctor_id" class="form-select" required>
                            <option value="">Select Doctor</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}"
                                    {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Available Dates --}}
                    <div id="dayContainer" class="mb-3">
                        <h6>Available Dates</h6>
                        <div id="dayButtons" class="d-flex flex-wrap gap-2"></div>
                    </div>

                    {{-- Available Time Slots --}}
                    <div id="slotContainer" class="mb-3">
                        <h6>Available Time Slots</h6>
                        <div id="slotButtons" class="d-flex flex-wrap gap-2"></div>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            @foreach (['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}"
                                    {{ $appointment->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Notes --}}
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
        document.addEventListener("DOMContentLoaded", () => {

            const changeBtn = document.getElementById('changePatientBtn');
            const currentSection = document.getElementById('currentPatient');
            const searchSection = document.getElementById('patientSearchSection');
            const searchInput = document.getElementById('patientSearch');
            const searchResults = document.getElementById('searchResults');
            const newPatientForm = document.getElementById('newPatientForm');
            const cancelBtn = document.getElementById('cancelChange');

            let searchTimer;

            changeBtn.addEventListener('click', () => {
                currentSection.style.display = 'none';
                searchSection.style.display = 'block';
                searchInput.focus();
            });

            cancelBtn.addEventListener('click', () => {
                currentSection.style.display = 'block';
                searchSection.style.display = 'none';
            });

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
                                    const a = document.createElement('a');
                                    a.href = 'javascript:void(0)';
                                    a.classList.add('list-group-item',
                                        'list-group-item-action');
                                    a.textContent =
                                        `${patient.full_name} (${patient.phone})`;
                                    a.addEventListener('click', () => selectPatient(
                                        patient));
                                    searchResults.appendChild(a);
                                });
                                searchResults.style.display = 'block';
                            } else {
                                searchResults.innerHTML =
                                    '<div class="list-group-item text-muted">No patient found. <a href="#" id="addNewPatient">Add New</a></div>';
                                searchResults.style.display = 'block';
                                document.getElementById('addNewPatient').addEventListener(
                                    'click', showNewPatientForm);
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
                newPatientForm.style.display = 'none';
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
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(payload)
                    }).then(res => res.json())
                    .then(patient => selectPatient(patient));
            });


        });

        // ------------------------------
        // Doctor/Date/Time dynamic logic
        // ------------------------------

        // document.addEventListener("DOMContentLoaded", () => {

        //     const doctorSelect = document.getElementById('doctorSelect');
        //     const dayContainer = document.getElementById('dayContainer');
        //     const dayButtons = document.getElementById('dayButtons');
        //     const slotContainer = document.getElementById('slotContainer');
        //     const slotButtons = document.getElementById('slotButtons');

        //     // Existing appointment data
        //     let selectedDoctor = "{{ $appointment->doctor_id }}";
        //     let selectedDate = "{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('Y-m-d') }}";
        //     let selectedTime = "{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }}";

        //     // Render time slots and pre-select existing time
        //     function renderSlots(slots) {
        //         slotButtons.innerHTML = '';
        //         slotContainer.style.display = 'block';
        //         if (slots.length > 0) {
        //             slots.forEach(slot => {
        //                 const wrapper = document.createElement('div');
        //                 wrapper.className = 'form-check form-check-inline';

        //                 const input = document.createElement('input');
        //                 input.type = 'radio';
        //                 input.name = 'appointment_time';
        //                 input.value = `${slot.start_time}-${slot.end_time}`;
        //                 input.className = 'form-check-input';
        //                 // Check if this slot matches existing appointment time
        //                 if (slot.start_time == selectedTime) input.checked = true;

        //                 const label = document.createElement('label');
        //                 label.className = 'form-check-label';
        //                 label.textContent = `${slot.start_time} - ${slot.end_time}`;

        //                 wrapper.appendChild(input);
        //                 wrapper.appendChild(label);
        //                 slotButtons.appendChild(wrapper);
        //             });
        //         } else slotButtons.innerHTML = '<p class="text-muted">No available slots</p>';
        //     }

        //     // Fetch time slots for selected date
        //     function fetchSlots(date) {
        //         if (!selectedDoctor || !date) return;
        //         fetch(`/admin/doctor/${selectedDoctor}/day/${date}`)
        //             .then(res => res.json())
        //             .then(slots => renderSlots(slots));
        //     }

        //     // Render upcoming dates and pre-select existing date
        //     function renderUpcomingDates(availableDays) {
        //         const today = new Date();
        //         const nextMonth = new Date();
        //         nextMonth.setMonth(nextMonth.getMonth() + 1);
        //         dayButtons.innerHTML = '';
        //         let hasAvailable = false;
        //         for (let d = new Date(today); d <= nextMonth; d.setDate(d.getDate() + 1)) {
        //             const dayName = d.toLocaleDateString('en-US', {
        //                 weekday: 'long'
        //             }).toLowerCase();
        //             if (availableDays.includes(dayName)) {
        //                 hasAvailable = true;
        //                 const formattedDate = d.toISOString().split('T')[0];

        //                 const wrapper = document.createElement('div');
        //                 wrapper.className = 'form-check form-check-inline';

        //                 const radio = document.createElement('input');
        //                 radio.type = 'radio';
        //                 radio.name = 'appointment_date';
        //                 radio.value = formattedDate;
        //                 radio.className = 'form-check-input';
        //                 radio.id = `date-${formattedDate}`;
        //                 if (formattedDate == selectedDate) radio.checked = true; // Pre-select existing date

        //                 radio.addEventListener('change', () => {
        //                     selectedDate = formattedDate;
        //                     fetchSlots(selectedDate);
        //                 });

        //                 const label = document.createElement('label');
        //                 label.className = 'form-check-label';
        //                 label.htmlFor = `date-${formattedDate}`;
        //                 label.textContent =
        //                     `${dayName.charAt(0).toUpperCase()+dayName.slice(1)}, ${d.getDate()} ${d.toLocaleString('en-US',{month:'short'})}`;

        //                 wrapper.appendChild(radio);
        //                 wrapper.appendChild(label);
        //                 dayButtons.appendChild(wrapper);
        //             }
        //         }
        //         dayContainer.style.display = 'block';
        //         if (hasAvailable) fetchSlots(selectedDate);
        //         else dayButtons.innerHTML = '<p class="text-muted">No available dates in next 30 days</p>';
        //     }

        //     // Load dates when doctor changes
        //     doctorSelect.addEventListener('change', function() {
        //         selectedDoctor = this.value;
        //         fetch(`/admin/doctor/${selectedDoctor}/days`).then(res => res.json())
        //             .then(days => renderUpcomingDates(days.map(d => d.toLowerCase())));
        //     });

        //     // Trigger initial load for edit
        //     if (selectedDoctor) doctorSelect.dispatchEvent(new Event('change'));

        // });
    </script>
    <script>
        $(document).ready(function() {

            const $doctorSelect = $('#doctorSelect');
            const $dayContainer = $('#dayContainer');
            const $dayButtons = $('#dayButtons');
            const $slotContainer = $('#slotContainer');
            const $slotButtons = $('#slotButtons');

            // 🩺 Existing appointment data (from Blade)
            let selectedDoctor = "{{ $appointment->doctor_id ?? '' }}";
            let selectedDate =
                "{{ isset($appointment->appointment_date) ? \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') : '' }}";
            let selectedTime =
                "{{ isset($appointment->appointment_time) ? $appointment->appointment_time : '' }}";

            // 🕒 Render time slots and pre-select existing time
            function renderSlots(slots) {
                $slotButtons.empty().show();
                if (slots.length > 0) {
                    $.each(slots, function(_, slot) {
                        const checked = (slot.start_time +'-'+ slot.end_time === selectedTime) ? 'checked' : '';

                        const html = `
                    <div class="form-check form-check-inline">
                        <input type="radio" name="appointment_time" value="${slot.start_time}-${slot.end_time}" class="form-check-input" ${checked}>
                        <label class="form-check-label">${slot.start_time} - ${slot.end_time}</label>
                    </div>`;
                        $slotButtons.append(html);
                    });

                } else {
                    $slotButtons.html('<p class="text-muted">No available slots</p>');
                }
            }

            // 📅 Fetch slots for selected date
            function fetchSlots(date) {
                if (!selectedDoctor || !date) return;
                $.getJSON(`/admin/doctor/${selectedDoctor}/day/${date}`, function(slots) {
                    renderSlots(slots);
                });
            }

            // 📆 Render available upcoming dates and pre-select if editing
            function renderUpcomingDates(availableDays) {
                const today = new Date();
                const nextMonth = new Date();
                nextMonth.setMonth(nextMonth.getMonth() + 1);
                $dayButtons.empty();
                let hasAvailable = false;

                for (let d = new Date(today); d <= nextMonth; d.setDate(d.getDate() + 1)) {
                    const dayName = d.toLocaleDateString('en-US', {
                        weekday: 'long'
                    }).toLowerCase();
                    if (availableDays.includes(dayName)) {
                        hasAvailable = true;
                        const formattedDate = d.toISOString().split('T')[0];
                        const checked = (formattedDate === selectedDate) ? 'checked' : '';

                        const html = `
                    <div class="form-check form-check-inline">
                        <input type="radio" name="appointment_date" value="${formattedDate}" class="form-check-input" id="date-${formattedDate}" ${checked}>
                        <label class="form-check-label" for="date-${formattedDate}">
                            ${dayName.charAt(0).toUpperCase() + dayName.slice(1)}, ${d.getDate()} ${d.toLocaleString('en-US',{month:'short'})}
                        </label>
                    </div>`;

                        $dayButtons.append(html);
                    }
                }

                $dayContainer.show();


                if (hasAvailable) {
                    fetchSlots(selectedDate);

                    // Event listener for date change
                    $('input[name="appointment_date"]').on('change', function() {
                        selectedDate = $(this).val();
                        fetchSlots(selectedDate);
                    });
                } else {
                    $dayButtons.html('<p class="text-muted">No available dates in next 30 days</p>');
                }
            }

            // 👨‍⚕️ When doctor changes, load available days
            $doctorSelect.on('change', function() {
                selectedDoctor = $(this).val();
                if (!selectedDoctor) return;

                $.getJSON(`/admin/doctor/${selectedDoctor}/days`, function(days) {
                    const availableDays = days.map(d => d.toLowerCase());
                    renderUpcomingDates(availableDays);
                });
            });

            // 🔄 Auto-load for edit page
            if (selectedDoctor) {
                $doctorSelect.trigger('change');
            }

        });
    </script>
@endpush
