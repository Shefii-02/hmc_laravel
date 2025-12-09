@extends('layouts.app')
@push('styles')
<style>
    /* Titles */
.vmv-title {
    font-size: 36px;
    font-weight: 700;
    color: #333;
}

.vmv-subtitle {
    font-size: 16px;
    color: #777;
    max-width: 700px;
    margin: 0 auto;
}

/* Box Styling */
.vmv-box {
    background: #fff;
    padding: 25px 30px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    border-left: 6px solid #0077b6;
}

/* Header Row */
.vmv-header {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.vmv-icon-blue {
    width: 38px;
    margin-right: 10px;
    filter: hue-rotate(180deg);
}

.vmv-icon-green {
    width: 38px;
    margin-right: 10px;
}

/* Headings */
.vmv-heading-blue {
    color: #0077b6;
    font-weight: 700;
}

.vmv-heading-green {
    color: #2d9c6a;
    font-weight: 700;
}

/* Paragraph Text */
.vmv-text {
    font-size: 16px;
    color: #444;
    line-height: 1.7;
}

/* Mission List */
.vmv-list {
    margin: 0;
    padding-left: 18px;
}

.vmv-list li {
    margin-bottom: 10px;
    font-size: 15.8px;
    line-height: 1.7;
    color: #444;
}

</style>
@endpush
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
                            <h6 class="">About Us</h6>
                            <h2 class="text-black">We're take care of your <b>healthy health</b></h2>
                        </div>
                        <p>&nbsp;&nbsp;
                            Established in 2025, Hayath Medicare Group of Companies stands as a trusted name in the
                            healthcare industry, built on more than five years of excellence and experience in hospital and
                            healthcare management. With our roots in Kuttippuram, Malappuram, we began with a single vision
                            — to make quality healthcare accessible, affordable, and advanced for every community,
                            especially in rural areas.
                        </p>
                        <p>&nbsp;&nbsp;
                            Over the years, our group has expanded into multiple sectors within healthcare, evolving into a
                            strong and diverse organization. Our journey began with Hayath Medicare LLP, which successfully
                            operated as a full-fledged super specialty hospital. Building on this success, we have extended
                            our reach to remote areas through Hayath Medicare Clinics LLP, a network of 10 clinics within a
                            45 km radius of Kuttippuram, ensuring primary and specialty care for underserved populations.
                        </p>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
                    {{-- <div class="info-img">
                        <img src="assets/img/about/about-men.png" alt="">
                    </div> --}}
                    <div class="about-bg-wrapper position-relative">
                        <img class="rounded shadow-lg" src="/assets/images/about-img-1.webp">
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
                        <img src="/assets/images/about-img-2.webp" class="rounded" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="info-content-area">
                        <div class="section-title">
                            <h6>Let's to Know Us</h6>
                            <h2 class="text-black"><b>Medicine made with care.</b></h2>
                        </div>
                        <div class="info-content-area">
                            <p>
                                As part of our mission to strengthen the healthcare ecosystem, we are also establishing
                                Hayath Medicare Pharma Care LLP, focusing on pharmaceutical and surgical distribution and
                                manufacturing. This initiative supports our clinical network and promotes local industry
                                growth. In addition, Hayath Medicare Institute LLP is being developed to provide paramedical
                                and non-paramedical education, nurturing the next generation of healthcare professionals and
                                contributing to employment and skill development in Kerala.
                            </p>
                            <p>
                                Our flagship company, Hayath Medicare Solutions Private Limited, serves as the central pillar of our operations. Headquartered in Kuttippuram, it is driven by a team of experienced board members, skilled executives, and visionary leadership. Together, we are committed to creating employment opportunities within our communities, supporting local economies, and fostering sustainable growth.
                            </p>

                            {{-- <p class="highlight">Currently we have an excellent crew consisting of 8 Doctors,</p>
                            <p class="highlight">12 Nursing and Paramedical staffs and other supportive staffs.</p>
                            <p class="highlight">In near future we are planning to start new departments including Eye care,
                                Dental care, X-ray, Operation Theatre, Casualty, Trauma Care, Ambulance services and other
                                clinical departments including Gastro enterology, Dermatology, Neurology, Nephrology,
                                Urology, Psychiatry, Gynaecology and General Surgery.</p> --}}
                            <p>&nbsp;&nbsp;
                               Looking ahead, Hayath Medicare Group aims to emerge as one of the leading healthcare providers in the region — from Kuttippuram to Malappuram and beyond. We are also exploring opportunities in health tourism, leveraging Kerala’s reputation as a hub for medical and wellness care.
                            </p>
                            <p>&nbsp;&nbsp;
                                At Hayath Medicare Group, we believe in building trust with our patients, clients, and investors — ensuring mutual growth, stability, and wellbeing. Our journey is not just about healthcare; it’s about shaping a healthier, stronger, and more prosperous future for everyone.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



<section class="vmv-section py-5">
    <div class="container">

        <!-- Section Title -->
        <div class="text-center mb-5">
            <h2 class="vmv-title">Vision & Mission</h2>
            <p class="vmv-subtitle">
                Shaping a healthier, stronger, and more prosperous world through accessible and advanced healthcare.
            </p>
        </div>

        <div class=" align-items-start">

            <!-- Vision Block -->
            <div class="col-md-12 mb-4">
                <div class="vmv-box">
                    <div class="vmv-header">
                        <img src="https://cdn-icons-png.flaticon.com/512/159/159604.png" class="vmv-icon-blue">
                        <h3 class="vmv-heading-blue">Vision</h3>
                    </div>

                    <p class="vmv-text">
                        To create a healthier, stronger, and more prosperous world by transforming healthcare
                        accessibility, affordability, and quality — empowering every individual, from rural
                        communities to global citizens, through innovative and sustainable healthcare solutions.
                    </p>
                </div>
            </div>

            <!-- Mission Block -->
            <div class="col-md-12">
                <div class="vmv-box">
                    <div class="vmv-header">
                        <img src="https://cdn-icons-png.flaticon.com/512/709/709612.png" class="vmv-icon-green">
                        <h3 class="vmv-heading-green">Mission</h3>
                    </div>

                    <ul class="vmv-list">
                        <li>To deliver high-quality, affordable, and advanced healthcare through an integrated network of hospitals, clinics, and specialized centers.</li>
                        <li>To expand healthcare access across rural and urban regions, ensuring no community is left behind.</li>
                        <li>To strengthen the healthcare ecosystem through pharmaceutical manufacturing, surgical distribution, and educational initiatives.</li>
                        <li>To nurture the next generation of healthcare professionals through training, skill development, and institutional excellence.</li>
                        <li>To generate sustainable employment opportunities and contribute to the economic and social growth of our communities.</li>
                        <li>To promote health tourism in Kerala by combining world-class medical expertise with compassionate care.</li>
                        <li>To build trust and long-term relationships with patients, partners, and investors by upholding integrity, innovation, and excellence.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


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
