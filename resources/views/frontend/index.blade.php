@extends('layouts.app')
@push('styles')
    <style>
        /* Define custom colors based on the image */
        :root {
            --bs-dark-blue: #2d416a;
            /* Closest match to the dark blue in the image */
            --bs-light-bg: #c6edff;
            /* Closest match to the light background/off-white */
            --bs-text-color: #ffffff;
            /* White text for dark backgrounds */
            --bs-text-color-dark: #2d416a;
            /* Dark text for light backgrounds */

            /* Define custom colors */
            --bs-dark-background: #1c2a41;
            /* Dark blue background from the image */
            --bs-light-text: #ffffff;
            /* White text */
            --bs-subtitle-color: #f0f0f0;
            /* Slightly off-white for body text */
            --bs-accent-color: #8c9daf;
            /* Light color for the dots/line (if needed) */
            --bs-primary-blue: #2d416a;
            /* Used for the main heading text */
            --bs-heading-color: #31518d;
            /* A slightly lighter blue for the main title */
            --bs-text-dark: #444;
            --bs-light-bg: #f9fbfd;
            /* Very light background for the section */

            /* Card specific colors (approximating the soft hues) */
            --bs-card-bg-light: #fff;
            --bs-card-bg-blue: #f3f8fd;
            /* Lightest blue for Antenatal */
            --bs-card-bg-white: #fcfcfc;
            /* Off-white for the others */

            /* Accent colors for text/icons */
            --bs-accent-pink: #d8488e;
            --bs-accent-green: #68b330;
            --bs-accent-blue: #3d88bd;
        }


        .dark-tile {
            background-color: var(--bs-dark-blue);
            color: var(--bs-text-color) !important;
        }

        .dark-tile p,
        .large-stat-tile p {
            color: var(--bs-text-color) !important;
        }

        .light-tile {
            background-color: var(--bs-light-bg);
            color: var(--bs-text-color-dark);
        }

        .light-tile p {
            --bs-text-color-dark: var(--bs-dark-blue) !important;
        }



        /* Styling for the numbers and text */
        .stat-number {
            font-size: 2.5rem;
            /* Large font size for the count */
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 0.5rem;
        }

        .stat-description {
            font-size: 1.2rem;
            /* Smaller font for description */
            font-weight: 400;
        }

        /* Ensure all tiles have consistent height and spacing */
        .stat-tile {
            height: 100%;
            /* Important for equal height columns */
            padding: 2rem;
            border-radius: 0.5rem;
            /* Optional: adds a slight rounded edge */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Custom style for the large middle tile (3,50,000) */
        .large-stat-tile {
            background-color: #5578ad;
            /* Slightly different blue for contrast */
            color: var(--bs-text-color);
        }

        /* Adjustments for the large number to be prominent */
        .large-stat-tile .stat-number {
            font-size: 3.5rem;
        }

        /* Ensure the entire section has some padding */
        .achievements-section {
            padding: 3rem 0;
            background-color: #ffffff;
            /* Or a surrounding color */
        }


        .timeline-section {
            background-color: var(--bs-dark-background);
            color: var(--bs-light-text);
            padding: 4rem 0;
            overflow: hidden;
            /* Prevent horizontal scroll from absolute positioning */
        }

        .timeline-header {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
        }

        /* --- Timeline Item Styling (Simplified Structure) --- */
        .timeline-item {
            position: relative;
            padding-bottom: 40px;
            /* Space below each item */
        }

        .timeline-year {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--bs-light-text);
            margin-bottom: 0.5rem;
        }

        .timeline-title {
            font-size: 1.25rem;
            font-weight: 500;
            color: var(--bs-light-text);
            margin-bottom: 0.5rem;
        }

        .timeline-text {
            color: var(--bs-subtitle-color);
            font-size: 0.95rem;
        }

        /* --- Custom Graphic/Line Placeholder (Simplified) --- */
        /* Note: Replicating the exact curve is complex and often requires an SVG or a complex CSS pseudo-element setup.
                                                                       This solution focuses on the content placement and basic vertical layout. */

        /* The overall width of the column is split between the text and a visual divider.
                                                                       Using a column split like col-lg-5 and col-lg-7 helps keep text readable. */

        /* Special styling for left-aligned items (2019, 2021, 2025-2030) */
        .timeline-left {
            text-align: right;
            padding-right: 2rem;
        }

        /* Special styling for right-aligned items (2020, 2022, 2023-2025) */
        .timeline-right {
            text-align: left;
            padding-left: 2rem;
        }

        /* The vertical "backbone" line */
        .timeline-line-spacer {
            position: absolute;
            left: 50%;
            width: 2px;
            background-color: var(--bs-accent-color);
            height: 100%;
            transform: translateX(-50%);
            display: none;
            /* Hide on small screens */
        }

        /* Show line on larger screens */
        @media (min-width: 992px) {
            .timeline-line-spacer {
                display: block;
            }
        }

        /* Define custom colors */


        .services-section,
        .doctors-section {
            background-color: var(--bs-light-bg) !important;
            padding: 4rem 0;
        }

        /* Main Heading Styling */
        .main-heading {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--bs-heading-color);
            margin-bottom: 0.5rem;
        }

        .subtitle {
            font-size: 1.1rem;
            color: var(--bs-text-dark);
            max-width: 800px;
            margin: 0 auto 3rem;
        }

        /* Card Styling */
        .service-card {
            /* min-height: 280px; */
            /* Ensure visual height consistency */
            padding: 2.5rem;
            border: none;
            border-radius: 1rem;
            /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            /* Soft shadow */
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-5px);
            /* Subtle lift on hover */
        }

        /* Styling for the first card (Antenatal) - light blue background */
        .card-antenatal {
            background-color: var(--bs-card-bg-blue);
        }

        /* Styling for the other cards - light gray/off-white background */
        .card-default {
            background-color: var(--bs-card-bg-white);
        }

        /* Card Content Header */
        .card-header-content {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-icon-container {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-right: 15px;
            font-size: 1.5rem;
        }

        .icon-antenatal {
            color: var(--bs-accent-pink);
        }

        .icon-home-care {
            color: var(--bs-accent-green);
        }

        .icon-health-card {
            color: var(--bs-accent-pink);
        }

        /* Using pink/purple like the image */
        .icon-students {
            color: var(--bs-accent-blue);
        }

        .service-title {
            line-height: 1.2;
            font-size: 1.4rem;
            font-weight: 600;
            margin: 0;
            color: var(--bs-text-dark);
        }

        /* Specific color for the 'ANTENATAL PACKAGE' text */
        .text-antenatal {
            color: var(--bs-accent-pink);
        }

        .text-home-care {
            color: var(--bs-accent-green);
        }

        .text-health-card {
            color: var(--bs-accent-pink);
        }

        .text-students {
            color: var(--bs-accent-blue);
        }

        .service-description {
            font-size: 0.95rem;
            color: var(--bs-text-dark);
            opacity: 0.8;
        }

        .doctors-section {
            padding-top: 6rem !important;
        }
    </style>
@endpush
@section('content')
    {{-- //banner sliders --}}
    <section class="banner-slides">
        <!-- Slider main container -->
        <div class="swiper mySwiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($banners ?? [] as $item)
                    <div class="swiper-slide">
                        <img src="{{ $item->image_url }}" class="w-100">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <section class="about-section">
        <div class=" section-padding">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5">
                        <div class="about-bg-wrapper position-relative">
                            <img class="rounded shadow-lg" src="/assets/images/about-img-1.webp">
                            <div class="player-wrapper position-absolute">
                                <div class="player-icon">
                                    <div class="triangle"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 p-4">
                        <div class="" data-wow-delay=".4s">
                            <div class="section-title">

                                <!--<h6>About Us</h6>-->
                                <h1 class="text-uppercase text-dark font-monospace">We're the Top <b>Health care </b> in
                                    Situation</h1>
                            </div>
                            <p>&nbsp;&nbsp;Hayath Medicare LLP, a proud member of the Hayath Medicare Group of Companies,
                                was established in 2020 with a clear mission — to redefine healthcare delivery in rural
                                Kerala and make advanced medical care accessible to every community. What began as a modest
                                2,000 sq. ft. super-specialty clinic in Kuttippuram, Malappuram, with just five departments
                                and nine dedicated employees, has today transformed into one of the region’s most trusted
                                healthcare institutions. Guided by the principles of compassion, commitment, and excellence,
                                Hayath Medicare LLP has rapidly evolved into a 25,000 sq. ft., 50-bedded Super Specialty
                                Hospital, symbolizing progress and dedication to community wellness.</p><br>
                            <p>&nbsp;&nbsp;Over the past five years, the hospital has grown into a multi-disciplinary
                                healthcare hub, now featuring 19 super-specialty departments and a team of over 100 skilled
                                professionals, including 30+ experienced doctors. Our state-of-the-art medical
                                infrastructure is designed to deliver comprehensive, affordable, and patient-centered
                                healthcare, ensuring every individual receives the best possible care close to home. </p>
                            <a class='float-right' href="about-us">Read More..</a>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="department-section">
        <div class="my-5">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="">
                                <h1 class="title  text-uppercase font-monospace">Our Departments</h1>
                                <p>
                                    Hayath Medicare Hospital is surely the best private hospital in Kerala with high-quality
                                    services and specialised in General Medicine,
                                    Orthopaedics, Pediatrics, ENT, Diabetes, Gastroenterogy, Dermatology, Pulmonology,
                                    Gynecology, General Surgery, Dental, Ophthalmology, Nephrology, Urology, Cardiac,
                                    Psychiatry, Homeopathy, Ayurvedic, Neurology.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="swiper mySwiperDepartment">
                                <div class="swiper-wrapper  pb-5">
                                    @foreach ($departments ?? [] as $department)
                                        <div class="swiper-slide">
                                            <a href="{{ route('department-single', $department->slug) }}"
                                                class="bg-lightblue">
                                                <img class="rounded" src="{{ $department->thumb_image_url }}">
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="achievements-section container">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="stat-tile light-tile">
                    <p class="stat-number">33+</p>
                    <p class="stat-description">Qualified Doctors</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile dark-tile">
                    <p class="stat-number">10,000+</p>
                    <p class="stat-description">Home Care Services Completed</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile light-tile">
                    <p class="stat-number">100+</p>
                    <p class="stat-description">Major and Minor Surgeries Completed</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile dark-tile">
                    <p class="stat-number">5,000+</p>
                    <p class="stat-description">Student Health Cards Provided</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-tile dark-tile">
                    <p class="stat-number">1,000+</p>
                    <p class="stat-description">Health Cards Provided</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile light-tile">
                    <p class="stat-number">130+</p>
                    <p class="stat-description">Employment Opportunities Created</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-tile large-stat-tile">
                    <p class="stat-number">3,50,000+</p>
                    <p class="stat-description">Patients Treated in 5 Years</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-tile dark-tile">
                    <p class="stat-number">10+</p>
                    <p class="stat-description">Normal Deliveries Completed in 6 Months</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile light-tile">
                    <p class="stat-number">5,000+ Free</p>
                    <p class="stat-description">Medical Camps Conducted</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-tile light-tile">
                    <p class="stat-number">20+</p>
                    <p class="stat-description">Departments</p>
                </div>
            </div>

        </div>
    </section>

    <section class="emergency-section">
        <div class="section-padding bg-emergency">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 ">
                            <div class="wrapper">
                                <div class ="quote">


                                    <h1 class="text-black fw-bold we-are-provide text-uppercase font-monospace">WE CARE FOR
                                        YOU</h1>
                                    <h1 class="text-black">
                                        {{-- "Quality Health facility.", "Qualified Doctors.", "Patient Friendly" --}}
                                        <span class="txt-rotate" data-period="300"
                                            data-rotate='[ "Emergency Trauma Care 24x7" ]'></span>
                                    </h1>
                                </div>
                            </div>
                            <div class="my-2">
                                <p class="phone">
                                    <span class="bi bi-telephone-forward-fill"></span>
                                    <a href="tel:04952420000" class="text-black fw-bold fs-2">0495 2420000</a>
                                    {{-- <a href="tel:+917592997991" class="text-black fw-bold fs-2"> +75929 97991</a> --}}
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20book%20appointments&amp;lang=en"
                                target="_blank" class="w-100">
                                <div class="alert bg-we-provided-points mb-2 d-flex align-items-center" role="alert">
                                    <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                    <div class="ms-4">
                                        <h1 class="fw-bold text-light fs-5">Book Appointments</h1>
                                    </div>
                                </div>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20book%20appointments&amp;lang=en"
                                target="_blank" class="w-100">
                                <div class="alert bg-we-provided-points mb-2 d-flex align-items-center" role="alert">
                                    <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                    <div class="ms-4">
                                        <h1 class="fw-bold text-light fs-5">Home Care Services</h1>
                                    </div>
                                </div>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20book%20appointments&amp;lang=en"
                                target="_blank" class="w-100">
                                <div class="alert bg-we-provided-points mb-2 d-flex align-items-center" role="alert">
                                    <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                    <div class="ms-4">
                                        <h1 class="fw-bold text-light fs-5">Health Checkup Packages</h1>
                                    </div>
                                </div>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20book%20appointments&amp;lang=en"
                                target="_blank" class="w-100">
                                <div class="alert bg-we-provided-points mb-2 d-flex align-items-center" role="alert">
                                    <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                    <div class="ms-4">
                                        <h1 class="fw-bold text-light fs-5">Antinatal Packages</h1>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="timeline-section">
        <div class="container">
            <h2 class="timeline-header text-light text-center">Our Story</h2>

            <div class="row align-items-stretch">
                <div class="col-lg-5 timeline-left">
                    <div class="timeline-item">
                        <p class="timeline-year">2019</p>
                        <p class="timeline-title">The Beginning</p>
                        <p class="timeline-text">Hayath Medicare LLP was founded in 2019 with a vision to make quality
                            healthcare accessible to the people of Kuttippuram, Malappuram. The journey started modestly,
                            with a 2,000 sq. ft. clinic, 5 departments, and a dedicated team of just 9 employees.</p>
                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                </div>
                <div class="col-lg-5 timeline-right">
                    <div class="timeline-item">
                        <p class="timeline-year">2020</p>
                        <p class="timeline-title">Building Trust</p>
                        <p class="timeline-text">Within the first year, the clinic became a trusted name in the community
                            by offering compassionate care and reliable medical services, laying a strong foundation for
                            future growth.</p>

                    </div>
                </div>
            </div>

            <div class="row align-items-stretch">
                <div class="col-lg-5 timeline-left">
                    <div class="timeline-item">
                        <p class="timeline-year">2021</p>
                        <p class="timeline-title">Expanding Services</p>
                        <p class="timeline-text">As the demand for advanced healthcare increased, Hayath Medicare LLP began
                            expanding its facilities and introducing new departments, steadily moving toward becoming a
                            multi-specialty institution.</p>
                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                </div>
                <div class="col-lg-5 timeline-right">
                    <div class="timeline-item">
                        <p class="timeline-year">2022</p>
                        <p class="timeline-title">A New Milestone</p>
                        <p class="timeline-text">By the third year, the hospital had significantly grown in scale, offering
                            more services and employing additional healthcare professionals to meet the needs of the local
                            population.</p>

                    </div>
                </div>
            </div>

            <div class="row align-items-stretch">
                <div class="col-lg-5 timeline-left">
                    <div class="timeline-item">
                        <p class="timeline-year">2023 - 2025</p>
                        <p class="timeline-title">Transformation into a Super-Speciality Hospital</p>
                        <p class="timeline-text">In just four years, Hayath Medicare LLP evolved into a 25,000 sq. ft.
                            super-specialty hospital, becoming a cornerstone of healthcare in Kuttippuram and its
                            surrounding regions. The institution today stands as a symbol of dedication, growth, and service
                            to the community.</p>

                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                </div>
                <div class="col-lg-5 timeline-right">
                    <div class="timeline-item">
                        <p class="timeline-year">2025 - 2030</p>
                        <p class="timeline-title">The journey continues</p>
                        <p class="timeline-text">In just four years, Hayath Medicare LLP has grown into a 25,000 sq. ft.
                            super-specialty hospital, becoming a trusted healthcare hub in Kuttippuram. As we look ahead,
                            our vision is to expand into a 150-bed multispecialty hospital, establish community clinics, and
                            introduce advanced diagnostic and specialty care facilities, including a dedicated trauma block,
                            to better serve the growing needs of our community.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="doctors-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container my-5">
                    <h2 class="text-center mb-4 text-uppercase font-monospace">Meet Our Specialists</h2>

                    <div class="swiper mySwiperDoctors mt-5">
                        <div class="swiper-wrapper  pb-5">

                            @foreach ($doctors ?? [] as $doctor)
                                <!-- Doctor 1 -->
                                <div class="swiper-slide">
                                    <div class="card shadow-sm border-0 rounded-3 text-center p-3 h-100">
                                        <img src="{{ $doctor->photo_url }}" class="rounded-5 mx-auto mb-3"
                                            alt="Doctor 1">
                                        <h6 class="fw-bold mb-1">{{ $doctor->name }}</h6>
                                        <small class="text-muted d-block mb-1">{{ $doctor->designation }}</small>
                                        <div class="col-lg-12 text-center">
                                            <a href="{{ route('doctor.single', $doctor->slug) }}"
                                                class="text-light btn-sm btn btn-theme2 w-25 text-center">Book</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination & Navigation -->
                        <div class="swiper-pagination mt-3"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php

        $services = [
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_1.png'),
                'description' => 'HAYATH ANTINATAL PACKAGE: A specialized
                                    program by Hayath Medicare Superspeciality
                                    Hospital for expecting mothers, offering
                                    check-ups, tests, and complete antenatal
                                    support throughout pregnancy.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_2.png'),
                'description' => 'Hayath Home Care: A service by Hayath
                                    Medicare Superspeciality Hospital that brings
                                    doctors, nurses, labs, and medicines to your
                                    home, ensuring affordable and quality care at
                                    your doorstep.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_3.png'),
                'description' => 'HAYATH HEALTH CARD: Issued by Hayath
                                    Medicare Superspeciality Hospital, this card
                                    provides easy access to healthcare services and
                                    verifies enrollment in medical plans or
                                    insurance programs.',
            ],
            [
                'card-bg' => ' bg-light',
                'title_image' => asset('assets/img/service-icons/logo_4.png'),
                'description' => 'Hayath Students Health Card: A healthcare
                                    program from Hayath Medicare Superspeciality
                                    Hospital designed for students, offering
                                    convenient access to consultations,
                                    diagnostics, and medical services.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_5.png'),
                'description' => 'Hayath Senior Care : An elder care service by
                                    Hayath Medicare Superspeciality Hospital,
                                    focused on providing respectful, safe, and
                                    dignified medical support for seniors.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_6.png'),
                'description' => 'Hayath Medicine at Home : A pharmacy service
                                    by Hayath Medicare Superspeciality Hospital
                                    that delivers medicines directly to your
                                    doorstep for convenience and easy access.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_7.png'),
                'description' => 'Hayath NRI Club : A program by Hayath
                                    Medicare Superspeciality Hospital offering
                                    special care for NRIs, including patient support,
                                    travel assistance, accommodation, and medical
                                    treatments.',
            ],
            [
                'card-bg' => ' bg-light',
                'title_image' => asset('assets/img/service-icons/logo_8.png'),
                'description' => 'Hayath Volunteer : An initiative of Hayath
                                    Medicare Superspeciality Hospital where
                                    volunteers assist staff with patient comfort,
                                    companionship, visitor guidance, and basic
                                    administrative support.',
            ],

            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_9.png'),
                'description' => 'Health Checkup : Packages by Hayath Medicare
                                    Superspeciality Hospital provide full health
                                    screening with essential tests to detect
                                    conditions like diabetes, heart issues, and
                                    organ-related diseases early.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_10.png'),
                'description' => 'A Telemedicine : A service by Hayath Medicare
                                    Superspeciality Hospital that connects patients
                                    with doctors through video calls or phone,
                                    offering diagnosis, prescriptions, and follow-up
                                    care remotely.',
            ],
            [
                'card-bg' => 'bg-light',
                'title_image' => asset('assets/img/service-icons/logo_11.png'),
                'description' => 'Hayath Privilege Card : A special card from
                                    Hayath Medicare Superspeciality Hospital that
                                    provides discounts, priority services, diagnostic
                                    offers, and home care benefits, making
                                    healthcare more affordable and convenient.',
            ],
            [
                'card-bg' => ' bg-light',
                'title_image' => asset('assets/img/service-icons/logo_12.png'),
                'description' => 'Aroogyam Njangaliloode : A health awareness
                                    initiative by Hayath Medicare Superspeciality
                                    Hospital, sharing expert guidance, updates on
                                    health camps, and tips to help you stay
                                    informed and live healthier.',
            ],
        ];

    @endphp

    <section class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="main-heading">Speciality Services</h2>
                <p class="subtitle">Comprehensive medical care with advanced treatments and expert specialists, focused on
                    delivering the best outcomes for every patient.</p>
            </div>

            <!-- Slider main container -->
            <div class="swiper mySwiperServices">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($services ?? [] as $service)
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="service-card card-antenatal  {{ $service['card-bg'] }}">
                                <div class="card-header-content">
                                    <img src="{{ $service['title_image'] }}" class="w-25">
                                </div>
                                <p class="service-description">
                                    {{ $service['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="testimonial-section">
        <div class="section-padding">
            <div class="col-lg-12">
                <div class="container my-5">
                    <h2 class="text-center mb-4 text-uppercase font-monospace">What Our Patients Say</h2>

                    <div class="swiper mySwiperTestimonial">
                        <div class="swiper-wrapper pb-5">
                            @foreach ($testimonials ?? [] as $testimonial)
                                <!-- Testimonial 1 -->
                                <div class="swiper-slide">
                                    <div class="card shadow-sm border-0 rounded-3 p-4 h-100">
                                        <p class="mb-3">"{{ $testimonial->message }}"</p>
                                        <!-- Stars -->

                                        <div class="mt-2">
                                            <div class="d-flex gal-3">
                                                <div class="col-2">
                                                    <img src="{{ $testimonial->image_url }}">
                                                </div>
                                                <div class="col-10">
                                                    <h6 class="fw-bold mb-0">{{ $testimonial->name }}</h6>
                                                    <small class="text-muted">{{ $testimonial->designation }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination & Navigation -->
                        <div class="swiper-pagination mt-5"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="media-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row align-items-center">



                        <!-- Right Column (Video Slider) -->
                        <div class="col-lg-9">
                            <div class="swiper mySwiperVideos">
                                <div class="swiper-wrapper pb-5">
                                    @foreach ($vlogs ?? [] as $vlog)
                                        <!-- Video 1 -->
                                        <div class="swiper-slide">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.youtube.com/embed/{{ $vlog->video_url }}"
                                                    title="YouTube video" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>

                                <!-- Pagination & Navigation -->
                                <div class="swiper-pagination mt-3"></div>
                                {{-- <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div> --}}
                            </div>
                        </div>
                        <!-- Left Column -->
                        <div class="col-lg-3 mb-4 mb-lg-0">
                            <h2 class="mb-3 text-uppercase font-monospace">Our Video Gallery</h2>
                            <p class="text-muted">
                                Explore our hospital’s facilities, patient stories, and health awareness videos through our
                                YouTube collection.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="media-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container my-5">
                    <div class="row align-items-center">


                        <!-- Right Column (News & Events Slider) -->
                        <div class="col-lg-12">
                            <h2 class="mb-3 text-uppercase font-monospace">News & Events</h2>
                            <p class="text-muted">
                                Stay updated with the latest hospital news, health awareness programs, medical camps, and
                                events happening at our center.
                            </p>

                            <div class="swiper mySwiperNews">
                                <div class="swiper-wrapper">

                                    @foreach ($news_events ?? [] as $news_event)
                                        <!-- News Item 1 -->
                                        <div class="swiper-slide">
                                            <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100">
                                                <img src="{{ $news_event->image_url }}" class="card-img-top"
                                                    alt="News 1">
                                                <div class="card-body">
                                                    <small class="text-muted d-block mb-1"><i
                                                            class="bi bi-calendar-event"></i> 20 Sep 2025</small>
                                                    <h6 class="fw-bold">{{ $news_event->title }}</h6>
                                                    <p class="small text-muted mb-0">
                                                        {{ Str::limit($news_event->description, '20') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>

                                <!-- Pagination & Navigation -->
                                <div class="swiper-pagination mt-3"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map-section">
        <div class="">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 mt-3 p-0 m-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5509946420307!2d76.02970801411696!3d10.845632560879807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7b73c80314e33%3A0x49cf3b197f4eaa49!2sHayath%20Medicare!5e0!3m2!1sen!2sin!4v1642097857941!5m2!1sen!2sin"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-lg-6 mt-3 bg-emergency-2">
                        <div class="my-2">
                            <div class="phone d-flex gap-2 align-items-center">
                                <span class="bi bi-telephone-forward-fill"></span>
                                <div class="d-flex flex-column align-items-start">
                                    <h1 class="text-black fw-bold fs-1 text-uppercase font-monospace">Book An Appointment
                                    </h1>
                                    <a href="tel:04952420000" class="text-black fw-bold fs-2">0495 2420000,</a>
                                    {{-- <a href="tel:+917592997991" class="text-black fw-bold fs-2"> +75929 97991</a> --}}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        var mySwiper = new Swiper(".mySwiper", {
            loop: true,
            grabCursor: true,
            // If we need pagination
            pagination: {
                el: ".swiper-pagination",
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: "fade",
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },

        });





        var mySwiperServices = new Swiper(".mySwiperServices", {
            slidesPerView: 2,
            loop: true,
            grabCursor: true,
            grid: {
                rows: 2,
                fill: "row", // ensures filling row by row
            },
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: 'true',
            },
             autoplay: {
                delay: 1000,
                disableOnInteraction: true,
            },
        });

        var mySwiperDepartment = new Swiper(".mySwiperDepartment", {
            slidesPerView: 3,
            loop: true,
            grabCursor: true,
            grid: {
                rows: 2,
                fill: "row", // ensures filling row by row
            },
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });


        var mySwiperTestimonial = new Swiper(".mySwiperTestimonial", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                }, // Tablet
                992: {
                    slidesPerView: 3
                } // Desktop
            }
        });

        var mySwiperDoctors = new Swiper(".mySwiperDoctors", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2
                }, // Mobile landscape / small tablet
                768: {
                    slidesPerView: 3
                }, // Tablet
                1200: {
                    slidesPerView: 4
                } // Desktop large
            }
        });

        var mySwiperVideos = new Swiper(".mySwiperVideos", {
            slidesPerView: 3,
            spaceBetween: 20,
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                }, // Tablet
                1200: {
                    slidesPerView: 3
                } // Desktop
            }
        });

        var mySwiperNews = new Swiper(".mySwiperNews", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                }, // Tablet
                1200: {
                    slidesPerView: 3
                } // Desktop
            }
        });
    </script>
    <script>
        var TxtRotate = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtRotate.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 300 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };


        window.onload = function() {
            var elements = document.getElementsByClassName('txt-rotate');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-rotate');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtRotate(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".txt-rotate > .wrap { border-right: 0.04em solid #666 }";
            document.body.appendChild(css);
        };


        var path = document.querySelector('path.pather1');
        var length = path.getTotalLength();

        // Clear any previous transition
        path.style.transition = path.style.WebkitTransition =
            'none';
        // Set up the starting positions
        path.style.strokeDasharray = length + ' ' + length;
        path.style.strokeDashoffset = -length;
        // Trigger a layout so styles are calculated & the browser
        // picks up the starting position before animating
        path.getBoundingClientRect();
        // Define our transition
        path.style.transition = path.style.WebkitTransition =
            'stroke-dashoffset 4s linear';
        // Go!
        path.style.strokeDashoffset = '0';
    </script>
@endpush
