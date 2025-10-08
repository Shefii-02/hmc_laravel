@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->

    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Services', 'url' => 'null'], // optional
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))



    <!-- Departments -->
    <section class="service-details-section section-padding pb-0">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-3">
                        <a href="{{ route('service.single',$service->slug) }}">
                            <div class="card rounded-4">
                                <img src="{{ $service->main_image_url }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-text fw-bold">{{ $service->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
