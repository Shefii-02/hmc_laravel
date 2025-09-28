@extends('layouts.app')
@push('styles')
    <style>
        .swiper {
            width: 100%;
            height: 100%;

            margin-left: auto;
            margin-right: auto;
        }

        .mySwiper .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .mySwiper .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mySwiper .swiper-button-next,
        .mySwiper .swiper-button-prev,
        .mySwiperTestimonial .swiper-button-next,
        .mySwiperTestimonial .swiper-button-prev,
        .mySwiperDoctors .swiper-button-next,
        .mySwiperDoctors .swiper-button-prev {
            color: #000;
        }

        .mySwiper .swiper-button-next:after,
        .mySwiper .swiper-button-prev:after {
            font-size: 30px;
            font-weight: 900;
        }


        .mySwiperTestimonial .swiper-button-next:after,
        .mySwiperTestimonial .swiper-button-prev:after {
            font-size: 20px;
            font-weight: 900;
        }

        /*...................................*/
        .mySwiperDepartment .swiper-wrapper {
            height: auto !important;
            /* remove fixed height */
        }

        .mySwiperDepartment .swiper-slide {
            height: auto !important;
            /* allow Swiper to set */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mySwiperDepartment .swiper-slide {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* **************************** */
        .player-wrapper {
            /* transform: translate(-36%, -100%); */
            display: flex;
            flex-direction: column;
            align-items: start;
        }

        .player-icon {
            position: relative;
            width: 60px;
            height: 60px;
            left: 20px;
            top: -30px;
            background-color: #22e36e;
            border: 5px solid #ffffff;
            border-radius: 50%;
            animation: player 1.1s ease-out infinite normal;
        }


        .triangle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-40%, -50%);
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            border-left: 20px solid white;
        }

        @keyframes player {
            from {
                box-shadow: 0 0 0px 0px rgba(0, 0, 0, 0.6);
            }

            to {
                box-shadow: 0 0 0px 30px rgba(0, 0, 0, 0.01);
            }
        }

        .text-theme-1 {
            color: #4bb9e9;
        }

        /* *************************************************************** */

        .emergency-section .wrapper {
            padding: 50px;
            /* max-width: 1000px;
                                                                                                margin: 0 auto; */
        }

        .alert.alert-transparent {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
        }

        .bg-emergency {
            background-image: url('/assets/images/hayath-emergency.jpg');
            position: relative;
            padding: 50px 0px 50px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .emergency-section .phone,
        .map-section .phone {
            position: relative;
            color: #ffffff;
            font-weight: 700;
            font-size: 36px;
            line-height: 1.3em;
            padding-left: 80px;
            padding-top: 5px;
            margin-top: 25px;
            text-align: left;
        }

        .emergency-section .phone span,
        .map-section .phone span {
            width: 55px;
            height: 55px;
            color: #ffffff;
            font-size: 30px;
            text-align: center;
            line-height: 51px;
            border-radius: 8px;
            border: 2px solid rgba(255, 255, 255, 0.2);
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
                <div class="swiper-slide">
                    <img src="/assets/images/banners/1757396456_Ortho.jpg" class="w-100">

                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/banners/1757398104_Urology.jpg" class="w-100">

                </div>
                <div class="swiper-slide">
                    <img src="/assets/images/banners/1757398470_Dental.jpg" class="w-100">
                </div>

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
                            <img class="rounded shadow-lg" src="/assets/images/hayath-about.webp">
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
                                <h2>We're the Top <b>Health care </b> in Situation</h2>
                            </div>
                            <p>&nbsp;&nbsp;HAYATH MEDICARE Hospital and Diagnostic Centre was established in the year 2020
                                by HAYATH MEDICARE LLP near Tirur road in Kuttippuram. We have evolved as a centre of
                                excellence in medicine by delivering high-quality healthcare services at affordable cost to
                                the poor in particular and the society at large.</p><br>
                            <p>&nbsp;&nbsp;Today, we are a leading healthcare provider in Kuttippuram, equipped with quality
                                facilities to deliver the best of services and thereby fulfilling its commitment to the
                                society. This super speciality clinic, with the expertise of senior consultants, high
                                quality nursing staff, up to date diagnostic facilities and a committed management has taken
                                giant leaps in its growth to a multi-specialty centre of excellence. </p>
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
                                <h2 class="title">Our Departments</h2>
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
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="">
                                            <img class="rounded"
                                                src="https://malabarhospitals.com/css/images/departments/pulmanology.png">
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
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
                                    <svg version="1.1" id="heartRate" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 699 114.3"
                                        enable-background="new 0 0 699 114.3" xml:space="preserve">
                                        <path class="pather1" fill="none" stroke="#8ec641" stroke-width="4"
                                            stroke-miterlimit="10"
                                            d="M707.9,78c0,0-17.1-0.6-31.1-0.6
                                                                                                             s-30,3.1-31.5,0.6S641,49.3,641,49.3l-10.5,58.5L619.3,7.5c0,0-11.3,66.8-12.5,70.5c0,0-17.1-0.6-31.1-0.6s-30,3.1-31.5,0.6
                                                                                                             s-4.3-28.8-4.3-28.8l-10.5,58.5L518.1,7.5c0,0-11.3,66.8-12.5,70.5c0,0-17.1-0.6-31.1-0.6s-30,3.1-31.5,0.6s-4.3-28.8-4.3-28.8
                                                                                                             l-10.5,58.5L417,7.5c0,0-11.3,66.8-12.5,70.5c0,0-17.1-0.6-31.1-0.6s-30,3.1-31.5,0.6s-4.3-28.8-4.3-28.8l-10.5,58.5L315.9,7.5
                                                                                                             c0,0-11.3,66.8-12.5,70.5c0,0-17.1-0.6-31.1-0.6s-30,3.1-31.5,0.6s-4.3-28.8-4.3-28.8L226,107.8L214.8,7.5c0,0-11.3,66.8-12.5,70.5
                                                                                                             c0,0-17.1-0.6-31.1-0.6s-30,3.1-31.5,0.6s-4.3-28.8-4.3-28.8l-10.5,58.5L113.6,7.5c0,0-11.3,66.8-12.5,70.5c0,0-17.1-0.6-31.1-0.6
                                                                                                             S40,80.5,38.5,78s-4.3-28.8-4.3-28.8l-10.5,58.5L12.5,7.5C12.5,7.5,1.3,74.3,0,78" />
                                    </svg>

                                    <h2 class="text-light fs-1 fw-bold">We are Provide</h2>
                                    <h1 class="text-white text-light">
                                        <span class="txt-rotate" data-period="1000"
                                            data-rotate='[ "Emergency Medical Care 24/7.", "Quality Health facility.", "Qualified Doctors.", "Patient Friendly" ]'></span>
                                    </h1>
                                </div>
                            </div>
                            <div class="my-2">
                                <p class="phone">
                                    <span class="bi bi-telephone-forward-fill"></span>
                                    <a href="tel:04952420000" class="text-light fw-bold fs-2">0495 2420000,</a>
                                    <a href="tel:+917592997991" class="text-light fw-bold fs-2"> +75929 97991</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="alert alert-transparent mb-2 d-flex align-items-center" role="alert">
                                <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                <div class="ms-4">
                                    <h1 class="fw-bold text-light fs-5">Health Plans We Accept</h1>
                                </div>
                            </div>
                            <div class="alert alert-transparent mb-2 d-flex align-items-center" role="alert">
                                <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                <div class="ms-4">
                                    <h1 class="fw-bold text-light fs-5">Health Plans We Accept</h1>
                                </div>
                            </div>
                            <div class="alert alert-transparent mb-2 d-flex align-items-center" role="alert">
                                <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                <div class="ms-4">
                                    <h1 class="fw-bold text-light fs-5">Health Plans We Accept</h1>
                                </div>
                            </div>
                            <div class="alert alert-transparent mb-2 d-flex align-items-center" role="alert">
                                <img src="https://malabarhospitals.com/css/images/departments/malabar2.png">
                                <div class="ms-4">
                                    <h1 class="fw-bold text-light fs-5">Health Plans We Accept</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="testimonial-section">
        <div class="section-padding">
            <div class="col-lg-12">
                <div class="container my-5">
                    <h2 class="text-center mb-4">What Our Patients Say</h2>

                    <div class="swiper mySwiperTestimonial">
                        <div class="swiper-wrapper pb-5">

                            <!-- Testimonial 1 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 p-4 h-100">
                                    <p class="mb-3">"The doctors and staff were very supportive throughout my treatment.
                                        Highly recommend this hospital!"</p>
                                    <!-- Stars -->
                                    <div class="mb-2 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0">John Mathew</h6>
                                    <small class="text-muted">Kozhikode, Kerala</small>
                                </div>
                            </div>

                            <!-- Testimonial 2 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 p-4 h-100">
                                    <p class="mb-3">"Excellent facilities and friendly nurses. I felt very comfortable
                                        during my stay here."</p>
                                    <!-- Stars -->
                                    <div class="mb-2 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0">Aisha Rahman</h6>
                                    <small class="text-muted">Malappuram, Kerala</small>
                                </div>
                            </div>

                            <!-- Testimonial 3 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 p-4 h-100">
                                    <p class="mb-3">"One of the best hospitals for specialized treatments. Thank you for
                                        the great care!"</p>
                                    <!-- Stars -->
                                    <div class="mb-2 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0">Rajesh Kumar</h6>
                                    <small class="text-muted">Thrissur, Kerala</small>
                                </div>
                            </div>

                            <!-- Testimonial 4 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 p-4 h-100">
                                    <p class="mb-3">"The doctors and staff were very supportive throughout my treatment.
                                        Highly recommend this hospital!"</p>
                                    <!-- Stars -->
                                    <div class="mb-2 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <h6 class="fw-bold mb-0">John Mathew</h6>
                                    <small class="text-muted">Kozhikode, Kerala</small>
                                </div>
                            </div>

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
    <section class="doctors-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container my-5">
                    <h2 class="text-center mb-4">Meet Our Doctors</h2>

                    <div class="swiper mySwiperDoctors">
                        <div class="swiper-wrapper  pb-5">

                            <!-- Doctor 1 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 text-center p-3 h-100">
                                    <img src="https://user-images.githubusercontent.com/13468728/234031617-2dfb19ea-01d0-4370-b63b-bb6bdfb4f78e.jpg"
                                        class="rounded-5 mx-auto mb-3" alt="Doctor 1">
                                    <h6 class="fw-bold mb-1">Dr. Sarah Mathew</h6>
                                    <small class="text-muted d-block mb-1">Cardiologist</small>
                                    <small class="text-secondary">Kozhikode, Kerala</small>
                                </div>
                            </div>

                            <!-- Doctor 2 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 text-center p-3 h-100">
                                    <img src="https://user-images.githubusercontent.com/13468728/234031617-2dfb19ea-01d0-4370-b63b-bb6bdfb4f78e.jpg"
                                        class="rounded-5 mx-auto mb-3" alt="Doctor 2">
                                    <h6 class="fw-bold mb-1">Dr. Arjun Nair</h6>
                                    <small class="text-muted d-block mb-1">Orthopedic Surgeon</small>
                                    <small class="text-secondary">Thrissur, Kerala</small>
                                </div>
                            </div>

                            <!-- Doctor 3 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 text-center p-3 h-100">
                                    <img src="https://user-images.githubusercontent.com/13468728/234031617-2dfb19ea-01d0-4370-b63b-bb6bdfb4f78e.jpg"
                                        class="rounded-5 mx-auto mb-3" alt="Doctor 3">
                                    <h6 class="fw-bold mb-1">Dr. Aisha Rahman</h6>
                                    <small class="text-muted d-block mb-1">Pediatrician</small>
                                    <small class="text-secondary">Malappuram, Kerala</small>
                                </div>
                            </div>

                            <!-- Doctor 4 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 text-center p-3 h-100">
                                    <img src="https://user-images.githubusercontent.com/13468728/234031617-2dfb19ea-01d0-4370-b63b-bb6bdfb4f78e.jpg"
                                        class="rounded-5 mx-auto mb-3" alt="Doctor 4">
                                    <h6 class="fw-bold mb-1">Dr. Rajesh Kumar</h6>
                                    <small class="text-muted d-block mb-1">Neurologist</small>
                                    <small class="text-secondary">Kochi, Kerala</small>
                                </div>
                            </div>
                            <!-- Doctor 5 -->
                            <div class="swiper-slide">
                                <div class="card shadow-sm border-0 rounded-3 text-center p-3 h-100">
                                    <img src="https://user-images.githubusercontent.com/13468728/234031617-2dfb19ea-01d0-4370-b63b-bb6bdfb4f78e.jpg"
                                        class="rounded-5 mx-auto mb-3" alt="Doctor 2">
                                    <h6 class="fw-bold mb-1">Dr. Arjun Nair</h6>
                                    <small class="text-muted d-block mb-1">Orthopedic Surgeon</small>
                                    <small class="text-secondary">Thrissur, Kerala</small>
                                </div>
                            </div>


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
    <section class="media-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- Left Column -->
                        <div class="col-lg-3 mb-4 mb-lg-0">
                            <h2 class="mb-3">Our Video Gallery</h2>
                            <p class="text-muted">
                                Explore our hospital’s facilities, patient stories, and health awareness videos through our
                                YouTube collection.
                            </p>
                        </div>

                        <!-- Right Column (Video Slider) -->
                        <div class="col-lg-9">
                            <div class="swiper mySwiperVideos">
                                <div class="swiper-wrapper pb-5">

                                    <!-- Video 1 -->
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" title="YouTube video"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <!-- Video 2 -->
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/ysz5S6PUM-U" title="YouTube video"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <!-- Video 3 -->
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    <!-- Video 4 -->
                                    <div class="swiper-slide">
                                        <div class="ratio ratio-16x9">
                                            <iframe src="https://www.youtube.com/embed/lTTajzrSkCw" title="YouTube video"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>

                                </div>

                                <!-- Pagination & Navigation -->
                                <div class="swiper-pagination mt-3"></div>
                                {{-- <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div> --}}
                            </div>
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
                            <h2 class="mb-3">News & Events</h2>
                            <p class="text-muted">
                                Stay updated with the latest hospital news, health awareness programs, medical camps, and
                                events happening at our center.
                            </p>

                            <div class="swiper mySwiperNews">
                                <div class="swiper-wrapper">

                                    <!-- News Item 1 -->
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100">
                                            <img src="https://images.pexels.com/photos/139398/thermometer-headache-pain-pills-139398.jpeg"
                                                class="card-img-top" alt="News 1">
                                            <div class="card-body">
                                                <small class="text-muted d-block mb-1"><i
                                                        class="bi bi-calendar-event"></i> 20 Sep 2025</small>
                                                <h6 class="fw-bold">Free Cardiac Health Camp</h6>
                                                <p class="small text-muted mb-0">Join us for a free cardiac screening camp
                                                    with expert cardiologists.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- News Item 2 -->
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100">
                                            <img src="https://images.pexels.com/photos/139398/thermometer-headache-pain-pills-139398.jpeg"
                                                class="card-img-top" alt="News 2">
                                            <div class="card-body">
                                                <small class="text-muted d-block mb-1"><i
                                                        class="bi bi-calendar-event"></i> 10 Aug 2025</small>
                                                <h6 class="fw-bold">Blood Donation Drive</h6>
                                                <p class="small text-muted mb-0">Our hospital successfully organized a
                                                    blood donation camp with great participation.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- News Item 3 -->
                                    <div class="swiper-slide">
                                        <div class="card shadow-sm border-0 rounded-3 overflow-hidden h-100">
                                            <img src="https://images.pexels.com/photos/139398/thermometer-headache-pain-pills-139398.jpeg"
                                                class="card-img-top" alt="News 3">
                                            <div class="card-body">
                                                <small class="text-muted d-block mb-1"><i
                                                        class="bi bi-calendar-event"></i> 25 Jul 2025</small>
                                                <h6 class="fw-bold">World Hepatitis Day</h6>
                                                <p class="small text-muted mb-0">Awareness program conducted by our
                                                    gastroenterology department.</p>
                                            </div>
                                        </div>
                                    </div>

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
                    <div class="col-lg-6 mt-3 bg-emergency">
                        <div class="my-2">
                            <div class="phone d-flex gap-2 align-items-center">
                                <span class="bi bi-telephone-forward-fill"></span>
                                <div class="d-flex flex-column align-items-center">

                                    <h1 class="text-light">Book An Appointment</h1>
                                    <a href="tel:04952420000" class="text-light fw-bold fs-2">0495 2420000,</a>
                                    <a href="tel:+917592997991" class="text-light fw-bold fs-2"> +75929 97991</a>
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
