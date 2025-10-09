@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            // ['title' => 'Services', 'url' => '/services'], // optional
            ['title' => 'About Us', 'url' => null], // current page
        ];
    @endphp

    @include('frontend.breadcrumb', compact('breadcrumbs'))

    <!-- . About Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="info-content-area">
                        <div class="section-title">
                            <h6>About Us</h6>
                            <h2 class="text-black">We're take care of your <b>healthy health</b></h2>
                        </div>
                        <p>&nbsp;&nbsp;
                            HAYATH MEDICARE Super Speciality Hospital and Diagnostic Centre was established in the year 2020
                            by HAYATH MEDICARE LLP near Tirur road in Kuttippuram. We have evolved as a centre of excellence
                            in medicine by delivering high-quality healthcare services at affordable cost to the poor in
                            particular and the society at large.
                        </p>
                        <p>&nbsp;&nbsp;
                            Today, we are a leading healthcare provider in Kuttippuram, equipped with quality facilities to
                            deliver the best of services and thereby fulfilling its commitment to the society. This super
                            speciality clinic, with the expertise of senior consultants, high quality nursing staff, up to
                            date diagnostic facilities and a committed management has taken giant leaps in its growth to a
                            multi-specialty centre of excellence.
                        </p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    {{-- <div class="info-img">
                        <img src="assets/img/about/about-men.png" alt="">
                    </div> --}}
                    <div class="about-bg-wrapper position-relative">
                        <img class="rounded shadow-lg" src="/assets/images/hayath-about.webp">
                        <div class="player-wrapper position-absolute">
                            <div class="player-icon">
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- About Section-->

    <div id="about-3" class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="about-bg">
                        <img src="assets/images/hayath-about2.webp" class="rounded" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="info-content-area">
                        <div class="section-title">
                            <h6>Let's to Know Us</h6>
                            <h2 class="text-black"><b>Medicine made with care.</b></h2>
                        </div>
                        <div class="info-content-area">
                            <p class="highlight">Currently we have an excellent crew consisting of 8 Doctors,</p>
                            <p class="highlight">12 Nursing and Paramedical staffs and other supportive staffs.</p>
                            <p class="highlight">In near future we are planning to start new departments including Eye care,
                                Dental care, X-ray, Operation Theatre, Casualty, Trauma Care, Ambulance services and other
                                clinical departments including Gastro enterology, Dermatology, Neurology, Nephrology,
                                Urology, Psychiatry, Gynaecology and General Surgery.</p>
                            <p>&nbsp;&nbsp;
                                We believe that each individual is special and deserves best care possible. We are able to
                                successfully enrich the lives of our patients by providing high quality, yet affordable
                                healthcare.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Meet Our Dedicated Team</h2>

            <div class="row g-4">

                <!-- Team Member 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <img src="/assets/img/team/team_22_01_13_03_23_11.jpeg" class="rounded mx-auto mb-3"
                            alt="Mohammed Nasif K">
                        <h5 class="fw-bold mb-1">Mohammed Nasif K</h5>
                        <small class="text-muted d-block mb-1">Managing Director</small>

                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <img src="/assets/img/team/team_22_01_13_03_25_04.jpeg" class="rounded mx-auto mb-3"
                            alt="Shahul Hameed">
                        <h5 class="fw-bold mb-1">Shahul Hameed</h5>
                        <small class="text-muted d-block mb-1">Director</small>

                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <img src="/assets/img/team/team_22_01_13_03_24_30.jpeg" class="rounded mx-auto mb-3"
                            alt="Salih Hameed">
                        <h5 class="fw-bold mb-1">Salih Hameed</h5>
                        <small class="text-muted d-block mb-1">Director</small>

                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm text-center p-3 h-100">
                        <img src="/assets/img/team/team_22_01_13_03_23_58.jpeg" class="rounded mx-auto mb-3"
                            alt="Mohammed Saleeem">
                        <h5 class="fw-bold mb-1">Mohammed Saleeem</h5>
                        <small class="text-muted d-block mb-1">Director</small>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
