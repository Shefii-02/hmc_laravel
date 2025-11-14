@extends('layouts.app')

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
                                <h1 class="text-uppercase text-dark font-monospace">We're the Top <b>Health care </b> in Situation</h1>
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
                                            <a href="{{ route('department-single', $department->slug) }}" class="bg-lightblue">
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
    <section class="emergency-section">
        <div class="section-padding bg-emergency">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 ">
                            <div class="wrapper">
                                <div class ="quote">


                                    <h1 class="text-black fw-bold we-are-provide text-uppercase font-monospace">WE CARE FOR YOU</h1>
                                    <h1 class="text-black">
                                        {{-- "Quality Health facility.", "Qualified Doctors.", "Patient Friendly" --}}
                                        <span class="txt-rotate" data-period="300"
                                            data-rotate='[ "Emergency Trauma Care 24*7" ]'></span>
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
    <section class="doctors-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container my-5">
                    <h2 class="text-center mb-4 text-uppercase font-monospace">Meet Our Specialists</h2>

                    <div class="swiper mySwiperDoctors">
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
    <section class="media-section">
        <div class="my-2">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- Left Column -->
                        <div class="col-lg-3 mb-4 mb-lg-0">
                            <h2 class="mb-3 text-uppercase font-monospace">Our Video Gallery</h2>
                            <p class="text-muted">
                                Explore our hospital’s facilities, patient stories, and health awareness videos through our
                                YouTube collection.
                            </p>
                        </div>

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
                                    <h1 class="text-black fw-bold fs-1 text-uppercase font-monospace">Book An Appointment</h1>
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
