@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->

   @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'Services', 'url' => '/services'], // optional
            ['title' => $service['title'], 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))


<!-- Service Details -->
<section class="service-details-section section-padding pb-0">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="single-service">
                    <img src="{{ $service['image'] }}" alt="{{ $service['name'] }}" class="img-fluid mb-3">
                    <h2>{{ $service['title'] }}</h2>
                    <p>{{ $service['description'] }}</p>
                    <hr>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-list">
                    <h5>Services List</h5>
                    @foreach($serviceList ?? [] as $s)

                        <a href="{{ route('service.single',$s->slug) }}" class="{{ $service->slug == $s->slug ? 'active' : '' }}">
                            {{ $s->title }} <span><i class="las la-arrow-right"></i></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
