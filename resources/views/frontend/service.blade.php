@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<div class="breadcroumb-area bread-bg py-5 text-white" style="background: linear-gradient(rgb(75 185 233 / 89%), rgb(142 199 66)), url('{{ $service['image'] }}') center / cover no-repeat;">
    <div class="container">
        <h1>{{ $service['title'] }}</h1>
        <h6><a href="/" class="text-white text-decoration-none">Home</a> / {{ $service['title'] }}</h6>
    </div>
</div>

<!-- Service Details -->
<section class="service-details-section section-padding pb-0">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="single-service">
                    <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" class="img-fluid mb-3">
                    <h2>{{ $service['title'] }}</h2>
                    <p>{{ $service['description'] }}</p>
                    <hr>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-list">
                    <h5>Services List</h5>
                    @foreach($serviceList as $s)
                        <a href="{{ url('service/' . $s['slug']) }}" class="{{ $slug == $s['slug'] ? 'active' : '' }}">
                            {{ $s['title'] }} <span><i class="las la-arrow-right"></i></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
