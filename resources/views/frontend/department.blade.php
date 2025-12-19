@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->

    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Departments', 'url' => '/departments'], // optional
            ['title' => $department['name'], 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))


    <!-- Department Details -->
    <section class="service-details-section section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="single-service">
                        <img src="{{ $department['main_image_url'] }}" alt="{{ $department['title'] }}" class="img-fluid mb-3">
                        <h2>{{ $department['title'] }}</h2>
                        <p>{{ $department['description'] }}</p>
                        <hr>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="service-list">
                        <h5>Department List</h5>
                        @foreach ($deptList ?? [] as $d)
                            <a href="{{ route('department-single', $d->slug) }}"
                                class="{{ $department->slug == $d->slug ? 'active' : '' }}">
                                {{ $d->name }} <span><i class="las la-arrow-right"></i></span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="team-page" class="team-area gray-bg section-padding pad-top-50">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h6>{{ $department['title'] }} Doctors</h6>
                        <h2><b>Meet Our Best Experts</b></h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($department->doctors ?? [] as $doctor)
                    <div class="col-md-3 col-lg-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100 team-card">
                            <img src="{{ $doctor['photo_url'] }}" class="rounded mx-auto mb-3" alt="{{ $doctor['name'] }}">
                            <h5 class="fw-bold mb-1">{{ $doctor['name'] }}</h5>
                            <small class="text-muted d-block mb-1">{{ $doctor['designation'] }}</small>
                            <div class="col-lg-12 text-center">
                                <a href="{{ route('doctor.single', $doctor->slug) }}"
                                    class="text-light btn-sm btn btn-theme2 w-25 text-center">Book</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
