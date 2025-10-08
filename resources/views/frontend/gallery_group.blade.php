@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->

    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Gallery', 'url' => 'null'], // optional
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))



    <!-- Departments -->
    <section class="service-details-section section-padding pb-0">
        <div class="container">
            <div class="row">
                @foreach ($gallery_groups as $group)
                    <div class="col-lg-3">
                        <a href="{{ route('gallery',$group->slug) }}">
                            <div class="card rounded-4">
                                <img src="{{ $group->main_image_url }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-text fw-bold">{{ $group->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
