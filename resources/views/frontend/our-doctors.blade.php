@extends('layouts.app')

{{-- Optional Hover Animation --}}
<style>
    .team-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }
</style>

@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            // ['title' => 'Services', 'url' => '/services'], // optional
            ['title' => 'Our Doctors', 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    {{-- About / Intro --}}
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Meet Our Expert Doctors</h2>
            <p class="text-muted mb-0">
                Our team of experienced and dedicated doctors ensures you receive world-class healthcare services across all
                specialties.
            </p>
        </div>
    </section>

    {{-- Doctors Grid --}}
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                @foreach ($doctors as $doctor)
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm text-center p-3 h-100 team-card">
                            <img src="{{ $doctor['photo_url'] }}" class="rounded mx-auto mb-3" alt="{{ $doctor['name'] }}">
                            <h5 class="fw-bold mb-1">{{ $doctor['name'] }}</h5>
                            <small class="text-muted d-block mb-1">{{ $doctor['designation'] }}</small>
                            <div class="col-lg-12 text-center">
                                <a href="#" class="text-light btn-sm btn btn-theme2 w-25 text-center">Book</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
