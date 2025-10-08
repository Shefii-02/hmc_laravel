@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->

    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Departments', 'url' => 'null'], // optional
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))



    <!-- Departments -->
    <section class="service-details-section section-padding pb-0">
        <div class="container">
            <div class="row">
                @foreach ($departments as $department)
                    <div class="col-lg-3">
                        <a href="{{ route('department.single',$department->slug) }}">
                            <div class="card rounded-4">
                                <img src="{{ $department->main_image_url }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-text fw-bold">{{ $department->name }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
