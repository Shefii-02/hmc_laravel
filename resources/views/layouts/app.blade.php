<!DOCTYPE html>

<html lang="en" class="js-focus-visible" data-js-focus-visible="">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        HAYATH MEDICARE Hospital and Diagnostic Centre
    </title>
    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <!-- Line Awesome CSS -->
    {{-- <link href="{{ asset('assets/css/line-awesome.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.4-rc1/css/foundation.css">
    <!-- Animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <!-- Bar Filler CSS -->
    <link href="{{ asset('assets/css/barfiller.css') }}" rel="stylesheet">
    <!-- Flaticon CSS -->
    {{-- <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet"> --}}
    <!-- Owl Carousel CSS -->
    {{-- <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet"> --}}
    <!-- Style CSS -->
    <link href="{{ asset('assets/css/style.css?v=1.2') }}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ asset('assets/css/responsive.css?v=1.3') }}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


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
                    <li><span class="icon flaticon-map"></span>Tirur Road,Kuttippuram,Malappuram</li>
                    <li><a href="tel:+91987858752"><span class="icon flaticon-phone-receiver"></span>Phone:
                            +917592997991</a></li>
                    <li><a href="mailto:info@hmc.com"><span
                                class="icon flaticon-letter"></span>hayathmedicare@gmail.com</a></li>
                    <li>
                        <div class="social-area">
                            <a href="https://www.facebook.com/HMC.KUTTIPURAM/"><i class="lab la-facebook-f"></i></a>
                            <a href="https://instagram.com/hayathmedicare?utm_medium=copy_link"><i
                                    class="lab la-instagram"></i></a>
                            <a href="https://youtube.com/channel/UCCtbo0c3_1oaUXIrvTEU3LQ"><i
                                    class="lab la-youtube"></i></a>
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

                <div class="logo-outer pl-2">
                    <div class="logo"><a href="/"><img src="{{ asset('assets/img/logo-white.png') }}"
                                alt="t"></a></div>
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
                            <li><a href="index">Home</a></li>

                            <li class="elementskit-dropdown-has">
                                <a href="About-us">About Us</a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel">
                                    <li><a href="About-us">About Us</a></li>
                                    <li><a href="Our-doctors">Our Doctors</a></li>
                                    <!--<li><a href="Careers">Careers</a></li>-->
                                    <li><a href="Contact-us">Contact Us</a></li>
                                    <li><a href="lab-result">Lab Result</a></li>
                                    <li><a href="book-now">Book an Appointment</a></li>
                                </ul>
                            </li>


                            <li class="elementskit-dropdown-has">
                                <a href="#">Departments</a>

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
                                <ul class="elementskit-dropdown elementskit-submenu-panel row aa">

                                    <li><a href="General-Medicine">General Medicine</a></li>
                                    <li><a href="Orthopaedics">Orthopaedics</a></li>
                                    <li><a href="Pediatrics">Pediatrics</a></li>
                                    <li><a href="ENT">ENT</a></li>
                                    <li><a href="Diabetes">Diabetes</a></li>
                                    <li><a href="Gastroenterogy">Gastroenterogy</a></li>
                                    <li><a href="Dermatology"> Dermatology</a></li>
                                    <li><a href="Pulmonology"> Pulmonology</a></li>
                                    <li><a href="Gynecology">Gynecology</a></li>



                                    <li><a href="General-Surgery">General Surgery</a></li>
                                    <li><a href="Dental">Dental</a></li>
                                    <li><a href="Ophthalmology">Ophthalmology</a></li>
                                    <li><a href="Nephrology">Nephrology</a></li>
                                    <li><a href="Urology">Urology</a></li>
                                    <li><a href="Cardiac">Cardiac</a></li>
                                    <li><a href="Psychiatry">Psychiatry</a></li>
                                    <li><a href="Homeopathy">Homeopathy</a></li>
                                    <li><a href="Ayurvedic">Ayurvedic</a></li>
                                    <li><a href="Neurology">Neurology</a></li>
                                </ul>




                            </li>


                            <li class="elementskit-dropdown-has"><a href="#">Services</a>
                                <ul class="elementskit-dropdown elementskit-submenu-panel row aa">
                                    <li><a href="Laboratory">Laboratory</a></li>
                                    <li><a href="Pharmacy">Pharmacy</a></li>
                                    <li><a href="Endoscopy">Endoscopy</a></li>
                                    <li><a href="Ecg">Ecg</a></li>
                                    <li><a href="Emergency-Care">Emergency Care</a></li>
                                    <li><a href="Telemedicine">Telemedicine</a></li>
                                    <li><a href="Medicine-at-Door">Medicine at Door</a></li>
                                    <li><a href="Home-Care">Home Care</a></li>
                                    <li><a href="X-ray">X-ray</a></li>
                                    <li><a href="Ultra-Sound-Scanning">Ultra Sound Scanning</a></li>
                                    <li><a href="Physiotherapy">Physiotherapy</a></li>
                                    <li><a href="Operation-Theater">Operation Theater</a></li>
                                </ul>
                            </li>
                            <li><a href="Gallery">Gallery</a></li>
                            <li><a href="News-Event">News &amp; Events</a></li>
                            <li class="d-block d-lg-none text-center">
                                <a href="/arogyam-njagalilude">

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
                                    class="icon icon-cross"></i></button>
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
<div class="sidequteo d-block d-lg-none"><a href="/book-now" class='text-light'>Book Now</a></div>
<div class="sidequteo2  d-block d-lg-none"><a href="/lab-result" class='text-light'>Lab Result</a></div>

<style>
    .sidequteo {
        top: 60%;
        margin: 0;
        transform: rotate(270deg);
        transform-origin: bottom;
        right: -46px;
        padding: 3px 19px;
        background: #8ec640;
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
        background: #8ec640;
        border: none;
        border-radius: 5px 5px 0 0;
        font-weight: 600;
        text-transform: capitalize;
        line-height: 20px;
        box-shadow: 0 0 8px 0 #888;
        z-index: 9999;
        position: fixed;
    }
</style>
<!-- Footer Area -->

<footer class="footer-area wow fadeIn" data-wow-delay=".2s">
    <div class="container">
        <div class="footer-up">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 ">


                    <div class="social-area text-center mb-3">
                        <img src="{{ asset('assets/img/logo-white.png') }}" alt="-logo"><br>
                        <a href="https://www.facebook.com/HMC.KUTTIPURAM/"><i class="lab la-facebook-f"></i></a>
                        <a href="https://instagram.com/hayathmedicare?utm_medium=copy_link"><i
                                class="lab la-instagram"></i></a>
                        <a href="https://youtube.com/channel/UCCtbo0c3_1oaUXIrvTEU3LQ"><i
                                class="lab la-youtube"></i></a>
                        <!--<a href="#"><i class="la la-linkedin"></i></a>-->
                    </div>


                </div>
                <div class="col-lg-2 offset-lg-1 col-md-4 com-sm-4 col-4">
                    <h5>Departments</h5>
                    <ul class='text-left'>
                        <li><a href="General-Medicine">General Medicine</a></li>
                        <li><a href="Orthopaedics">Orthopaedics</a></li>
                        <li><a href="Pediatrics">Pediatrics</a></li>
                        <li><a href="ENT">ENT</a></li>
                        <li><a href="Diabetes">Diabetes</a></li>
                        <li><a href="Gastroenterogy">Gastroenterogy</a></li>
                        <li><a href="Dermatology"> Dermatology</a></li>
                        <li><a href="Pulmonology"> Pulmonology</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <h5>Services</h5>
                    <ul class='text-left' style='text-transform:capitalize;'>
                        <li>
                            <a href="#"><span>-</span> Laboratory</a>
                            <a href="#"><span>-</span> PHARMACY</a>
                            <a href="#"><span>-</span> ENDOSCOPY</a>
                            <a href="#"><span>-</span> ECG</a>
                            <a href="#"><span>-</span> EMERGENCY CARE</a>
                            <a href="#"><span>-</span> TELEMEDICINE</a>
                            <a href="#"><span>-</span> MEDICINE AT DOOR</a>
                            <a href="#"><span>-</span> HOME CARE</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-12  col-sm-12 col-12">
                    <h5>Quick Links</h5>
                    <ul class='text-left' style='text-transform:capitalize;'>
                        <li>
                            <a href="#"><span>-</span> About us</a>
                            <a href="#"><span>-</span> Career</a>
                            <a href="#"><span>-</span> Doctors</a>
                            <a href="#"><span>-</span> Contact</a>
                            <a href="#"><span>-</span> Gallery</a>
                            <a href="#"><span>-</span> News & Events</a>
                            <a href="#"><span>-</span> Get a Appointment</a>
                            <a href="#"><span>-</span> Lab Result</a>
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
                <p class="copyright-line">© 2021 . All rights reserved.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <p class="privacy">Privacy Policy | Terms &amp; Conditions</p>
            </div>
        </div>
    </div>
</div>


<!-- Scroll Top Area -->
<a href="#top" class="go-top"><i class="las la-angle-up"></i></a>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="{{ asset('assets/js/nav-tool.js') }}"></script>

<!-- Popper JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<!-- Wow JS -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- Way Points JS -->
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<!-- Counter Up JS -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<!-- Owl Carousel JS -->
{{-- <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script> --}}
<!-- Isotope JS -->
<script src="{{ asset('assets/js/isotope-3.0.6-min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
<!-- Sticky JS -->
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<!-- Progress Bar JS -->
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>
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
<a href="https://api.whatsapp.com/send?phone=+917592997991&text=Hai,%20I%20would%20like%20to%20know%20more%20about%20your%20services&lang=en"
    class="float" target="_blank">
    <i class="bi bi-whatsapp my-float"></i>
</a>

@stack('scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
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
</script>
<!--End of Tawk.to Script-->
</body>

</html>
