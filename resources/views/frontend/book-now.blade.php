@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Appointment Book Now', 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('book-now.store') }}" method="POST">
                        @csrf
                        <div class="card rounded-5 shadow-lg p-3">
                            <div class="card-body">
                                <div id="patientDetails">
                                    <h5>Patient Information</h5>
                                    <input type="hidden" name="patient_id" id="patient_id">
                                    <div class="mb-3">
                                        <label class="form-label">Patient Name</label>
                                        <input type="text" name="full_name" id="full_name" required class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" name="phone" id="phone" required class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" id="email" required class="form-control">
                                    </div>
                                </div>
                                {{-- Appointment Section --}}
                                <div id="appointmentSection">
                                    <h5>Appointment Details</h5>

                                    {{-- 👨‍⚕️ Doctor --}}
                                    <div class="mb-4">
                                        <label class="form-label">Select Doctor</label>
                                        <select id="doctorSelect" name="doctor_id" class="form-select" required>
                                            <option value="">-- Choose Doctor --</option>
                                            @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- 📅 Available Days (Next 30 Days) --}}
                                    <div id="dayContainer" class="mb-4" style="display:none;">
                                        <h5 class="mb-2">Available Dates</h5>
                                        <div id="dayButtons" class="d-flex flex-wrap gap-2"></div>
                                    </div>

                                    {{-- ⏰ Available Time Slots --}}
                                    <div id="slotContainer" class="mb-4" style="display:none;">
                                        <h5 class="mb-2">Available Time Slots</h5>
                                        <div id="slotButtons" class="d-flex flex-wrap gap-2"></div>
                                    </div>

                                    {{-- 📝 Notes --}}
                                    <div class="mb-3">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="3">{{ old('notes', '') }}</textarea>
                                    </div>

                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection



@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('patientSearch');
            const resultsBox = document.getElementById('searchResults');
            const patientDetails = document.getElementById('patientDetails');
            const newPatientForm = document.getElementById('newPatientForm');
            const appointmentSection = document.getElementById('appointmentSection');
            const doctorSelect = document.getElementById('doctorSelect');
            const dateInput = document.getElementById('appointment_date');
            const timeSlotSelect = document.getElementById('time_slot');

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
                                    item.classList.add('list-group-item',
                                        'list-group-item-action');
                                    item.textContent =
                                        `${patient.full_name} (${patient.phone})`;
                                    item.addEventListener('click', () => selectPatient(
                                        patient));
                                    resultsBox.appendChild(item);
                                });
                                resultsBox.style.display = 'block';
                            } else {
                                resultsBox.innerHTML =
                                    '<div class="list-group-item text-muted">No patient found. <a href="#" id="addNewPatient">Add New</a></div>';
                                resultsBox.style.display = 'block';
                                document.getElementById('addNewPatient').addEventListener(
                                    'click', showNewPatientForm);
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

                resultsBox.style.display = 'none';
                newPatientForm.style.display = 'none';
                appointmentSection.style.display = 'block';
                patientDetails.style.display = 'block';
            }

            // ✅ Show Add New Patient form
            function showNewPatientForm() {
                patientDetails.style.display = 'none';
                resultsBox.style.display = 'none';
                searchInput.value = '';
                newPatientForm.style.display = 'block';
                appointmentSection.style.display = 'block';
            }

            // 🕐 Fetch Doctor Available Slots
            function fetchSlots() {
                const doctorId = doctorSelect.value;
                const date = dateInput.value;
                if (!doctorId || !date) return;

                fetch(`/doctors/${doctorId}/available-slots?date=${date}`)
                    .then(res => res.json())
                    .then(data => {
                        timeSlotSelect.innerHTML = '<option value="">Select Time</option>';
                        if (data.length === 0) {
                            timeSlotSelect.innerHTML = '<option value="">No slots available</option>';
                        } else {
                            data.forEach(slot => {
                                const opt = document.createElement('option');
                                opt.value = slot;
                                opt.textContent = slot;
                                timeSlotSelect.appendChild(opt);
                            });
                        }
                    });
            }

            doctorSelect.addEventListener('change', fetchSlots);
            dateInput.addEventListener('change', fetchSlots);
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const doctorSelect = document.getElementById('doctorSelect');
            const dayContainer = document.getElementById('dayContainer');
            const dayButtons = document.getElementById('dayButtons');
            const slotContainer = document.getElementById('slotContainer');
            const slotButtons = document.getElementById('slotButtons');

            let selectedDoctor = null;
            let selectedDate = null;

            doctorSelect.addEventListener('change', function() {
                selectedDoctor = this.value;
                selectedDate = null;
                slotContainer.style.display = 'none';
                dayButtons.innerHTML = '';
                slotButtons.innerHTML = '';

                if (selectedDoctor) {
                    fetch(`/doctor/${selectedDoctor}/days`)
                        .then(res => res.json())
                        .then(days => {
                            if (days.length > 0) {
                                const availableDays = days.map(d => d.toLowerCase());
                                renderUpcomingDates(availableDays);
                            } else {
                                showEmptyMessage(dayButtons, 'No available days for this doctor.');
                                dayContainer.style.display = 'block';
                            }
                        })
                        .catch(() => showEmptyMessage(dayButtons, 'Error fetching available days.'));
                } else {
                    dayContainer.style.display = 'none';
                }
            });

            function renderUpcomingDates(availableDays) {
                const today = new Date();
                const nextMonth = new Date();
                nextMonth.setMonth(nextMonth.getMonth() + 1);

                dayContainer.style.display = 'block';
                dayButtons.innerHTML = '';

                let hasAvailable = false;

                for (let d = new Date(today); d <= nextMonth; d.setDate(d.getDate() + 1)) {
                    const dayName = d.toLocaleDateString('en-US', {
                        weekday: 'long'
                    }).toLowerCase();

                    if (availableDays.includes(dayName)) {
                        hasAvailable = true;
                        const formattedDate = d.toISOString().split('T')[0];
                        const label =
                            `${dayName.charAt(0).toUpperCase() + dayName.slice(1)}, ${d.getDate()} ${d.toLocaleString('en-US', { month: 'short' })}`;

                        const wrapper = document.createElement('div');
                        wrapper.className = 'form-check form-check-inline';

                        const checkbox = document.createElement('input');
                        checkbox.type = 'radio';
                        checkbox.name = 'appointment_date';
                        checkbox.className = 'form-check-input';
                        checkbox.value = formattedDate;
                        checkbox.id = `date-${formattedDate}`;
                        checkbox.addEventListener('change', () => selectDate(formattedDate));

                        const labelEl = document.createElement('label');
                        labelEl.className = 'form-check-label';
                        labelEl.htmlFor = `date-${formattedDate}`;
                        labelEl.textContent = label;

                        wrapper.appendChild(checkbox);
                        wrapper.appendChild(labelEl);
                        dayButtons.appendChild(wrapper);
                    }
                }

                if (!hasAvailable) {
                    showEmptyMessage(dayButtons, 'No available dates for this doctor in the next 30 days.');
                }
            }

            function selectDate(date) {
                selectedDate = date;
                slotButtons.innerHTML = '';

                fetch(`/doctor/${selectedDoctor}/day/${date}`)
                    .then(res => res.json())
                    .then(slots => {
                        slotContainer.style.display = 'block';
                        slotButtons.innerHTML = '';

                        if (slots.length > 0) {
                            slots.forEach(slot => {
                                const wrapper = document.createElement('div');
                                wrapper.className = 'form-check form-check-inline';

                                const checkbox = document.createElement('input');
                                checkbox.type = 'radio';
                                checkbox.name = 'appointment_time';
                                checkbox.className = 'form-check-input';
                                checkbox.value = `${slot.start_time}-${slot.end_time}`;
                                checkbox.id = `slot-${slot.start_time}-${slot.end_time}`;

                                const labelEl = document.createElement('label');
                                labelEl.className = 'form-check-label';
                                labelEl.htmlFor = `slot-${slot.start_time}-${slot.end_time}`;
                                labelEl.textContent = `${slot.start_time} - ${slot.end_time}`;

                                wrapper.appendChild(checkbox);
                                wrapper.appendChild(labelEl);
                                slotButtons.appendChild(wrapper);
                            });
                        } else {
                            showEmptyMessage(slotButtons, 'No available time slots for this date.');
                        }
                    })
                    .catch(() => showEmptyMessage(slotButtons, 'Error fetching slots.'));
            }

            function showEmptyMessage(container, text) {
                container.innerHTML = `<p class="text-muted">${text}</p>`;
            }
        });
    </script>
@endpush
