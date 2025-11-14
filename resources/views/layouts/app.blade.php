<!DOCTYPE html>
<html lang="en" class="js-focus-visible" data-js-focus-visible="">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav-icon.png') }}">
    <title>
        HAYATH MEDICARE Hospital and Diagnostic Centre
    </title>
    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <!-- Line Awesome CSS -->
    {{-- <link href="{{ asset('assets/css/line-awesome.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.4-rc1/css/foundation.css">
    <!-- Animate CSS-->
    {{-- <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet"> --}}
    <!-- Bar Filler CSS -->
    {{-- <link href="{{ asset('assets/css/barfiller.css') }}" rel="stylesheet"> --}}
    <!-- Flaticon CSS -->
    {{-- <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet"> --}}
    <!-- Owl Carousel CSS -->
    {{-- <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet"> --}}
    <!-- Style CSS -->
    <link href="{{ asset('assets/css/style.css?v=1.2') }}" rel="stylesheet">
    <!-- Responsive CSS -->
    {{-- <link href="{{ asset('assets/css/responsive.css?v=1.3') }}" rel="stylesheet"> --}}
    <!-- Font Awesome CSS-->
    {{-- <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"> --}}


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <style>
        .page-breadcrumb .breadcrumb-item a:hover {
            text-decoration: underline;
            opacity: 0.85;
        }

        .departments-links a,
        .services-links a {
            color: #FFF;
        }
    </style>
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

        /* .bg-emergency {
                                background-image: url('/assets/images/hayath-emergency.webp');
                                position: relative;
                                padding: 50px 0px 50px;
                                background-size: cover;
                                background-repeat: no-repeat;
                            } */

        .bg-emergency {
            position: relative;
            padding: 200px 0;
            background-image: url('/assets/images/hayath-emergency.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
            z-index: 1;
        }

        /* Optional: glass blur overlay */
        /* .bg-emergency::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgb(60 139 112 / 7%);
            /* darken for contrast */
        /* backdrop-filter: blur(6px); */
        -webkit-backdrop-filter: blur(6px);
        z-index: 1;
        }

        */

        /* Make content above overlay */
        .bg-emergency>.container,
        .bg-emergency>.container * {
            position: relative;
            z-index: 2;
        }

        /* White bottom spread / curve */
        .bg-emergency::after {
            content: "";
            position: absolute;
            bottom: -1px;
            /* slightly overlap next section */
            left: 0;
            width: 100%;
            height: 70px;
            /* adjust the curve height */
            background: white;
            border-radius: 50% 50% 0 0;
            z-index: 2;
        }



        .emergency-section .phone,
        .map-section .phone {
            position: relative;
            color: #ffffff;
            font-weight: 700;
            font-size: 36px;
            line-height: 1.3em;
            padding-left: 50px;
            padding-top: 5px;
            margin-top: 25px;
            text-align: left;
        }

        .emergency-section .phone span,
        .map-section .phone span {
            width: 55px;
            height: 55px;
            color: #000000;
            font-size: 30px;
            text-align: center;
            line-height: 51px;
            border-radius: 8px;
            border: 2px solid rgba(7, 7, 7, 0.2);
        }

        @media only screen and (min-width: 992px) {
            .we-are-provide {
                font-size: 50px;
            }
        }

        .bg-we-provided-points {
            /* background: linear-gradient(135deg, #4bb9ea 20%, #8ec641 20%, #4bb9ea 28%, #8ec641 100%); */
            background: linear-gradient(135deg, rgb(10 4 5 / 70%) 0%, rgb(22 21 66 / 70%) 48%, rgb(15 156 239 / 70%) 100%);
            background-color: #26c9f1;
        }

        .bg-theme-gradient {
            background: linear-gradient(135deg, rgb(10 4 5 / 70%) 0%, rgb(22 21 66 / 70%) 48%, rgb(15 156 239 / 70%) 100%);
            background-color: #26c9f1;
        }

        .bg-emergency-2 {
            position: relative;
            padding: 50px 0;
            background-image: url('/assets/images/hayath-emergency.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
            z-index: 1;
        }

        .bg-theme-2 {
            background-color: #4bb9ea;
        }

        .bg-emergency-2::before {
            content: "";
            position: absolute;
            inset: 0;
            background: #89b9d067;
            /* darken for contrast */
            /* backdrop-filter: blur(6px); */
            -webkit-backdrop-filter: blur(6px);
            z-index: 1;
        }

        /* Make content above overlay */
        .bg-emergency-2>.container,
        .bg-emergency-2>.container * {
            position: relative;
            z-index: 2;
        }

        .btn:hover {
            color: #ffffff;
            background-color: #8ec640;
            border-color: #ffffff;
        }

        .main-header .elementskit-navbar-nav>li>a.active {
            color: #8ec640;
        }
    </style>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-136HE3VF4V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-136HE3VF4V');
    </script>
    @stack('styles')
</head>
<header class="elementskit-header main-header  sticky-top">


    <!-- End Header Top -->

    <!-- Header Upper -->
    <div class="header-top">
        <div class="container ">
            <div class="top-outer clearfix">
                <!-- Top Left -->
                <ul class="top-left">
                    <li><span class="bi bi-geo-alt me-2"></span>Tirur Road,Kuttippuram,Malappuram</li>
                    <li><a href="tel:+91987858752"><i class="bi bi-headset me-2"></i>Phone:
                            +917592997991</a></li>
                    <li><a href="mailto:info@hmc.com"><i class="bi bi-envelope-at me-2"></i>hayathmedicare@gmail.com</a>
                    </li>
                    <li>
                        <div class="social-area">
                            <a href="https://www.facebook.com/HMC.KUTTIPURAM/" title="Facebook">
                                <i class="bi bi-facebook me-2"></i></a>
                            <a href="https://instagram.com/hayathmedicare?utm_medium=copy_link" title="Instagram">
                                <i class="bi bi-instagram me-2"></i></a>
                            <a href="https://youtube.com/channel/UCCtbo0c3_1oaUXIrvTEU3LQ" title="Youtube"><i
                                    class="bi bi-youtube"></i></a>
                            <!--<a href="#"><i class="lab la-linkedin"></i></a>-->
                        </div>
                    </li>
                </ul>

                <!-- Top Right -->
                <div class="top-right clearfix">

                    <!-- Main Menu End-->
                    <div class="nav-box">
                        <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-3"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="header-upper"> <!-- xs-container t-->
        <div class="container">
            <div class="xs-navbar clearfix  pr-5">

                <div class="logo-outer mt-2">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('assets/img/logo-white.png') }}" alt="t"></a>
                    </div>
                </div>

                <nav class="elementskit-navbar">

                    <!-- ---------------------------------------
                        // god menu markup start
                        ---------------------------------------- -->

                    <div class="xs-mobile-search">
                        <a href="#modal-popup-2"><i class="icon icon-search"></i></a>
                    </div>

                    <!-- start humberger (for offcanvas toggler) -->
                    <button class=" elementskit-menu-toggler xs-bold-menu">

                        <div class="xs-gradient-group">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span>
                            Menu
                        </span>
                    </button>
                    <!-- end humberger -->

                    <!-- start menu container -->
                    <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">

                        <!-- start menu item list -->
                        <ul class="elementskit-navbar-nav nav-alignment-dynamic">
                            <li><a class="{{ request()->routeIs('index') ? 'active' : '' }}" href="/">Home</a>
                            </li>

                            <li class="elementskit-dropdown-has">
                                <a href="about-us"
                                    class="{{ request()->routeIs('our-doctors') || request()->routeIs('about-us') || request()->routeIs('galleries') ? 'active' : '' }}">About
                                    Us <i class="bi bi-caret-down"></i></a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li><a class="{{ request()->routeIs('about-us') ? 'active' : '' }}"
                                            href="/about-us">About Us</a></li>
                                    <li><a class="{{ request()->routeIs('our-doctors') ? 'active' : '' }}"
                                            href="/our-doctors">Our Doctors</a></li>
                                    <!--<li><a href="Careers">Careers</a></li>-->
                                    {{-- <li><a class="{{ request()->routeIs('contact-us') ? 'active' : '' }}"
                                            href="/contact-us">Contact Us</a></li> --}}
                                    <li><a class="{{ request()->routeIs('galleries') ? 'active' : '' }}"
                                            href="/galleries">Gallery</a></li>
                                </ul>
                            </li>
                            <style>
                                @media (min-width: 992px) {
                                    .aa {
                                        min-width: 500px !important;
                                    }

                                    .aa li {
                                        padding: 10px 15px !important;
                                    }
                                }
                            </style>

                            <li class="elementskit-dropdown-has">
                                <a href="#"
                                    class="{{ request()->routeIs('departments') ? 'active' : '' }}">Departments</a>
                                <ul
                                    class="elementskit-dropdown departments elementskit-submenu-panel d-flex gap-3 flex-wrap">
                                    @foreach (getDepartments() as $dept)
                                        <li><a class="{{ request()->routeIs('department-single.*') ? 'active' : '' }}"
                                                href="/department/{{ $dept->slug }}">{{ $dept->name }}</a></li>
                                    @endforeach

                                </ul>
                            </li>

                            <li class="elementskit-dropdown-has">
                                <a href="#"
                                    class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                                <ul
                                    class="elementskit-dropdown services elementskit-submenu-panel d-flex gap-3 flex-wrap">
                                    @foreach (getServices() as $srv)
                                        <li><a class="{{ request()->routeIs('service.single.*') ? 'active' : '' }}"
                                                href="/service/{{ $srv->slug }}">{{ $srv->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a class="{{ request()->routeIs('blog') || request()->routeIs('blog.show') ? 'active' : '' }}"
                                    href="/blog?tab=news-and-events">News and Events</a></li>
                            <li><a class="{{ request()->routeIs('carrier') || request()->routeIs('carrier') ? 'active' : '' }}"
                                    href="{{ route('carrier') }}">Carrier</a></li>
                            <li><a class="{{ request()->routeIs('contact-us') || request()->routeIs('contact-us') ? 'active' : '' }}"
                                    href="{{ route('contact-us') }}">Contact us</a></li>


                            <li class="d-block d-lg-none text-center">
                                <a href="{{ route('arogyam-njagalilude', ['tab' => 'articles']) }}">
                                    <img src="{{ asset('assets/img/arogyaham.png') }}" class="mt-1 mb-2">
                                </a>
                                <hr>
                            </li>
                        </ul> <!-- end menu item list -->


                        <!-- start menu logo and close button (  Mobile offcanvas Menu) -->
                        <div class="elementskit-nav-identity-panel">
                            <h1 class="elementskit-site-title">
                                <a href="#" class="elementskit-nav-logo">Menu</a>
                            </h1>
                            <button class="elementskit-menu-close elementskit-menu-toggler" type="button"><i
                                    class="bi bi-x-lg"></i></button>
                        </div>
                        <!-- end menu logo and close button t-->

                    </div>
                    <!-- end menu container t-->

                    <!-- start offcanvas overlay -->
                    <div class="elementskit-menu-overlay elementskit-menu-offcanvas-elements elementskit-menu-toggler">
                    </div>
                    <!-- end offcanvas overlay -->


                </nav>
                <ul class="xs-menu-tools">
                    <!--<li><a href="book-now" class='btn btn-theme2 rounded mt-2 text-light'>Book Now</a></li>-->
                    <!--<li><a href="lab-result" class='btn btn-theme2 rounded mt-2 text-light'>Lab Result</a></li>-->
                    <li>
                        <a href="/arogyam-njagalilude" style="margin-top: -20px;"><img
                                src="{{ asset('assets/img/arogyaham.png') }}"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- .container END -->
</header>

<!-- Hero Area -->
<main>
    @yield('content')
</main>
<div class="sidequteo "><a href="/book-now" class='text-light'>Book Now</a></div>
<div class="sidequteo2 "><a href="/lab-result" class='text-light'>Lab Result</a></div>

<style>
    .sidequteo {
        top: 60%;
        margin: 0;
        transform: rotate(270deg);
        transform-origin: bottom;
        right: -46px;
        padding: 3px 19px;
        /* background: #8ec640; */
        background: linear-gradient(135deg, rgb(10 4 5 / 70%) 0%, rgb(22 21 66 / 70%) 48%, rgb(15 156 239 / 70%) 100%);
        background-color: #26c9f1;
        border: none;
        border-radius: 5px 5px 0 0;
        font-weight: 600;
        text-transform: capitalize;
        line-height: 20px;
        box-shadow: 0 0 8px 0 #888;
        z-index: 9999;
        position: fixed;
    }

    .sidequteo2 {
        top: 30%;
        margin: 0;
        transform: rotate(270deg);
        transform-origin: bottom;
        right: -46px;
        padding: 3px 19px;
        /* background: #8ec640; */
        background: linear-gradient(135deg, rgb(10 4 5 / 70%) 0%, rgb(22 21 66 / 70%) 48%, rgb(15 156 239 / 70%) 100%);
        background-color: #26c9f1;
        border: none;
        border-radius: 5px 5px 0 0;
        font-weight: 600;
        text-transform: capitalize;
        line-height: 20px;
        box-shadow: 0 0 8px 0 #888;
        z-index: 9999;
        position: fixed;
    }

    .bg-lightblue {
        background-color: #add8e6;
    }
</style>
<!-- Footer Area -->

<footer class="bg-theme-gradient wow fadeIn" data-wow-delay=".2s">
    <div class="container">
        <div class="footer-up">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">

                    <div class="social-area text-center mb-3">
                        <img src="{{ asset('assets/img/logo-black.png') }}" alt="-logo"><br>
                        <ul class="text-left ms-3">
                            <li>

                                <a class="text-white p-0 m-0" href="tel:+91987858752"><i
                                        class="bi bi-headset me-2"></i>Phone:
                                    +917592997991</a><br>
                                <a class="text-white p-0 m-0" href="mailto:info@hmc.com"><i
                                        class="bi bi-envelope-at me-2"></i>hayathmedicare@gmail.com</a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <h5 class="text-light mb-2">OUR CENTER OF EXCELLENCE</h5>
                    <ul class='text-left services-links'>
                        <li>
                            <a href="#"><span>-</span> DENTAL CARE</a>
                        </li>
                        <li>
                            <a href="#"><span>-</span> EYE CARE</a>
                        </li>
                        <li>
                            <a href="#"><span>-</span> AESTHETIC CLINIC</a>
                        </li>
                        <li>
                            <a href="#"><span>-</span> HOME CARE SERVICES</a>
                        </li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <h5 class="text-light mb-4"></h5>
                    <ul class='text-left services-links'>
                        <li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20HEALTH%20CARD&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> HEALTH CARD</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20STUDENTS%20HEALTH%20CARD&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> STUDENTS HEALTH CARD</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20SEANIOR%20CARE&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> SEANIOR CARE </a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20PRIVILEGE%20CARD&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> PRIVILEGE CARD</a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20NRE%20CARD&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> NRE CARD</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12  col-sm-12 col-12">
                    <h5 class="text-light mb-2">Quick Links</h5>
                    <ul class='text-left services-links'>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20HEALTH%20CARD&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> HEALTH CARD</a>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20ANTINATAL%20PACKAGES&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> ANTINATAL PACKAGES</a>
                            <a href="https://api.whatsapp.com/send?phone=+917592997991&amp;text=Hai,%20I%20would%20like%20to%20know%20more%20about%20INTERNATIONAL%20PACKAGES&amp;lang=en"
                                target="_blank" class="w-100"><span>-</span> INTERNATIONAL PACKAGES</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</footer>

<div class="footer-bottom">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <p class="copyright-line">© {{ date('Y') }} . All rights reserved.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <p class="privacy">Privacy Policy | Terms &amp; Conditions</p>
            </div>
        </div>
    </div>
</div>


<!-- Scroll Top Area -->
<a href="#top" class="go-top"><i class="las la-angle-up"></i></a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- <script src="{{ asset('assets/js/nav-tool.js') }}"></script> --}}

<!-- Popper JS -->
{{-- <script src="{{ asset('assets/js/popper.min.js') }}"></script> --}}

<!-- Wow JS -->
{{-- <script src="{{ asset('assets/js/wow.min.js') }}"></script> --}}
<!-- Way Points JS -->
{{-- <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script> --}}
<!-- Counter Up JS -->
{{-- <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script> --}}
<!-- Owl Carousel JS -->
{{-- <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script> --}}
<!-- Isotope JS -->
{{-- <script src="{{ asset('assets/js/isotope-3.0.6-min.js') }}"></script> --}}
<!-- Magnific Popup JS -->
{{-- <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script> --}}
<!-- Sticky JS -->
{{-- <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script> --}}
<!-- Progress Bar JS -->
{{-- <script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script> --}}
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- /***************************************************************/ -->
<style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        left: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }
</style>
<a href="https://api.whatsapp.com/send?phone=+917592997991&text=Hai,%20I%20would%20like%20to%20know%20more%20about%20your%20/services&lang=en"
    class="float" target="_blank">
    <i class="bi bi-whatsapp my-float"></i>
</a>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right", // Toast position
        "timeOut": "5000", // Timeout duration
        "extendedTimeOut": "5000",
    };

    @if (session('success'))
        toastr.success("{{ session('success') }}", "Success");
    @elseif (session('error'))
        toastr.error("{{ session('error') }}", "Error");
    @elseif (session('info'))
        toastr.info("{{ session('info') }}", "Info");
    @elseif (session('warning'))
        toastr.warning("{{ session('warning') }}", "Warning");
    @endif

    // Validation errors
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}", "Validation Error");
        @endforeach
    @endif
</script>

@stack('scripts')
<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/68d95dc54bdd921950d1e27d/1j68hcj00';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script> --}}
<!--End of Tawk.to Script-->
</body>

</html>
