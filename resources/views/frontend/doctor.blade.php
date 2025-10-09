@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Our Doctors', 'url' => '/our-doctors'],
            ['title' => $doctor->name, 'url' => null],
        ];

        // Group availability by day (Monday, Tuesday, etc.)
        $groupedAvailabilities = $doctor->availabilities->select('day', 'start_time', 'end_time')->groupBy('day');

        $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    <section class="py-5">
        <div class="container">

            {{-- Doctor Details --}}
            <div class="card rounded-3 shadow-lg mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <h4>{{ $doctor->name }}</h4>
                            <h6>Department: {{ implode(',', $doctor->doctor_department->pluck('name')->toArray()) }}</h6>
                            <h6>Qualification: {{ $doctor->designation }}</h6>

                            <h6 class="mt-3">Availability:</h6>
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-light">
                                    <tr>
                                        @foreach ($weekDays as $day)
                                            <th>{{ $day }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($weekDays as $day)
                                            <td>
                                                @if (isset($groupedAvailabilities[$day]))
                                                    @foreach ($groupedAvailabilities[$day] as $slot)
                                                        <div>
                                                            {{ \Carbon\Carbon::parse($slot['start_time'])->format('g:i A') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($slot['end_time'])->format('g:i A') }}
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">Not Available</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 text-center">
                            <img src="{{ $doctor->photo_url }}" class="img-fluid rounded" alt="Doctor Image">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Appointment Form --}}
            <div class="card rounded-3 shadow-lg">
                <div class="card-body">
                    <h3 class="malabarh3 mb-4">Book an Appointment</h3>

                    <form method="POST" action="{{ route('doctor.appointment', $doctor->slug) }}">
                        @csrf
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Name*</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Email*</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Phone Number*</label>
                                <input type="tel" name="phone" class="form-control" required pattern="[789][0-9]{9}">
                            </div>
                            {{-- 📝 Notes --}}
                        <div class="col-md-12 mb-3">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="3">{{ old('notes', '') }}</textarea>
                            </div>
                        </div>

                        {{-- Day Selection --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">Select Appointment Date*</label>
                            <div id="dayButtons" class="d-flex flex-wrap gap-2"></div>
                        </div>

                        {{-- Time Slot Selection --}}
                        <div id="slotContainer" class="mb-4" style="display:none;">
                            <label class="form-label fw-bold">Select Time Slot*</label>
                            <div id="slotButtons" class="d-flex flex-wrap gap-2"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const groupedAvailabilities = @json($groupedAvailabilities);
            const dayButtons = document.getElementById('dayButtons');
            const slotContainer = document.getElementById('slotContainer');
            const slotButtons = document.getElementById('slotButtons');

            // Render next 30 days based on available weekdays
            const today = new Date();
            const nextMonth = new Date();
            nextMonth.setMonth(nextMonth.getMonth() + 1);

            for (let d = new Date(today); d <= nextMonth; d.setDate(d.getDate() + 1)) {
                const dayName = d.toLocaleDateString('en-US', {
                    weekday: 'long'
                });
                if (groupedAvailabilities[dayName]) {
                    const formattedDate = d.toISOString().split('T')[0];
                    const labelText = `${dayName}, ${d.getDate()} ${d.toLocaleString('en-US', { month: 'short' })}`;

                    const wrapper = document.createElement('div');
                    wrapper.className = 'form-check form-check-inline';

                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'appointment_date';
                    radio.value = formattedDate;
                    radio.className = 'form-check-input';
                    radio.id = `date-${formattedDate}`;

                    const label = document.createElement('label');
                    label.className = 'form-check-label';
                    label.htmlFor = `date-${formattedDate}`;
                    label.textContent = labelText;

                    radio.addEventListener('change', function() {
                        showSlots(dayName);
                    });

                    wrapper.appendChild(radio);
                    wrapper.appendChild(label);
                    dayButtons.appendChild(wrapper);
                }
            }

            function showSlots(dayName) {
                slotButtons.innerHTML = '';
                slotContainer.style.display = 'block';

                const slots = groupedAvailabilities[dayName];
                if (slots && slots.length > 0) {
                    slots.forEach(slot => {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'form-check form-check-inline';

                        const radio = document.createElement('input');
                        radio.type = 'radio';
                        radio.name = 'appointment_time';
                        radio.value = `${slot.start_time}-${slot.end_time}`;
                        radio.className = 'form-check-input';
                        radio.id = `slot-${slot.start_time}-${slot.end_time}`;

                        const label = document.createElement('label');
                        label.className = 'form-check-label';
                        label.htmlFor = radio.id;
                        label.textContent = `${slot.start_time} - ${slot.end_time}`;

                        wrapper.appendChild(radio);
                        wrapper.appendChild(label);
                        slotButtons.appendChild(wrapper);
                    });
                } else {
                    slotButtons.innerHTML = '<p class="text-muted">No available slots for this day</p>';
                }
            }
        });
    </script>
@endpush
