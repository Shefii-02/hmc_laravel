@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<div class="breadcroumb-area bread-bg py-5 text-white" style="background: linear-gradient(rgb(75 185 233 / 89%), rgb(142 199 66)), url('{{ $department['image'] }}') center / cover no-repeat;">
    <div class="container">
        <h1>{{ $department['title'] }}</h1>
        <h6><a href="/" class="text-white text-decoration-none">Home</a> / {{ $department['title'] }}</h6>
    </div>
</div>

<!-- Department Details -->
<section class="service-details-section section-padding pb-0">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="single-service">
                    <img src="{{ $department['image'] }}" alt="{{ $department['title'] }}" class="img-fluid mb-3">
                    <h2>{{ $department['title'] }}</h2>
                    <p>{{ $department['description'] }}</p>
                    <hr>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="service-list">
                    <h5>Department List</h5>
                    @foreach($deptList ?? [] as $d)
                        <a href="{{ route('department.show', $d['slug']) }}" class="{{ $slug == $d['slug'] ? 'active' : '' }}">
                            {{ $d['title'] }} <span><i class="las la-arrow-right"></i></span>
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
            @foreach($doctors ?? [] as $doctor)


                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team-member card border-0 shadow-sm">
                        <div class="team-member-bg" style="background-image: url('{{ $doctor['doct_img'] }}'); height:300px; background-size:cover; background-position:center;"></div>
                        <div class="team-content text-center p-3">
                            <h5>Dr: {{ $doctor['doct_name'] }}</h5>
                            <p>{{ $doctor['doct_qulify'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
