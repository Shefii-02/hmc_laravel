@extends('layouts.app')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '/'],
            // ['title' => 'Services', 'url' => '/services'], // optional
            ['title' => 'Career', 'url' => null], // current page
        ];
    @endphp

    @push('styles')
        <style>
            /* ===== Career ===== */
            .career-form {
                background-color: #4e63d7;
                border-radius: 5px;
                padding: 0 16px;
            }

            .career-form .form-control {
                background-color: rgba(255, 255, 255, 0.2);
                border: 0;
                padding: 12px 15px;
                color: #fff;
            }

            .career-form .form-control::-webkit-input-placeholder {
                /* Chrome/Opera/Safari */
                color: #fff;
            }

            .career-form .form-control::-moz-placeholder {
                /* Firefox 19+ */
                color: #fff;
            }

            .career-form .form-control:-ms-input-placeholder {
                /* IE 10+ */
                color: #fff;
            }

            .career-form .form-control:-moz-placeholder {
                /* Firefox 18- */
                color: #fff;
            }

            .career-form .custom-select {
                background-color: rgba(255, 255, 255, 0.2);
                border: 0;
                padding: 12px 15px;
                color: #fff;
                width: 100%;
                border-radius: 5px;
                text-align: left;
                height: auto;
                background-image: none;
            }

            .career-form .custom-select:focus {
                -webkit-box-shadow: none;
                box-shadow: none;
            }

            .career-form .select-container {
                position: relative;
            }

            .career-form .select-container:before {
                position: absolute;
                right: 15px;
                top: calc(50% - 14px);
                font-size: 18px;
                color: #ffffff;
                content: '\F2F9';
                font-family: "Material-Design-Iconic-Font";
            }

            .filter-result .job-box {
                background: #fff;
                -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
                box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
                border-radius: 10px;
                padding: 10px 35px;
            }

            ul {
                list-style: none;
            }

            .list-disk li {
                list-style: none;
                margin-bottom: 12px;
            }

            .list-disk li:last-child {
                margin-bottom: 0;
            }

            .job-box .img-holder {
                height: 65px;
                width: 65px;
                background-color: #4e63d7;
                background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
                background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
                font-family: "Open Sans", sans-serif;
                color: #fff;
                font-size: 22px;
                font-weight: 700;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                border-radius: 65px;
            }

            .career-title {
                background-color: #4e63d7;
                color: #fff;
                padding: 15px;
                text-align: center;
                border-radius: 10px 10px 0 0;
                background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
                background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
            }

            .job-overview {
                -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
                box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
                border-radius: 10px;
            }

            @media (min-width: 992px) {
                .job-overview {
                    position: -webkit-sticky;
                    position: sticky;
                    top: 70px;
                }
            }

            .job-overview .job-detail ul {
                margin-bottom: 28px;
            }

            .job-overview .job-detail ul li {
                opacity: 0.75;
                font-weight: 600;
                margin-bottom: 15px;
            }

            .job-overview .job-detail ul li i {
                font-size: 20px;
                position: relative;
                top: 1px;
            }

            .job-overview .overview-bottom,
            .job-overview .overview-top {
                padding: 35px;
            }

            .job-content ul li {
                font-weight: 600;
                opacity: 0.75;
                border-bottom: 1px solid #ccc;
                padding: 10px 5px;
            }

            @media (min-width: 768px) {
                .job-content ul li {
                    border-bottom: 0;
                    padding: 0;
                }
            }

            .job-content ul li i {
                font-size: 20px;
                position: relative;
                top: 1px;
            }
        </style>
    @endpush
    @include('frontend.breadcrumb', compact('breadcrumbs'))

    <!-- . About Content Section -->
    <section class="py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">

                        <div class="filter-result">
                            <p class="mb-30 ff-montserrat">Total Job Openings : {{ $carriers->count() }}</p>
                            @forelse($carriers ?? [] as $career)
                                <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                    <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                        <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                            {{ Str::limit($career->title, 1, '') }}
                                        </div>
                                        <div class="job-content ms-2">
                                            <h5 class="text-left">{{ $career->title }}</h5>
                                            <ul class="d-md-flex flex-column flex-wrap text-capitalize ff-open-sans">
                                                <li class="mr-md-4">
                                                    <i class="bi bi-note mr-2"></i> {{ $career->description }}
                                                </li>
                                                <li class="mr-md-4 mt-2">
                                                    <i class="bi bi-pin-map mr-2 fs-6"></i> {{ $career->location }}
                                                </li>
                                                <li class="mr-md-4">
                                                    <i class="bi bi-clock mr-2 fs-6"></i> {{ $career->type }}
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="job-right my-4 flex-shrink-0">
                                        <a data-url="{{ route('career.apply', $career->id) }}"
                                            class="btn d-block w-100 d-sm-inline-block btn-light apply-now">
                                            Apply now
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="my-5 text-center">
                                    <h5>No data found..</h5>
                                </div>
                            @endforelse

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Modal container -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Content will be loaded here via AJAX -->
                </div>
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {

            // 1. When “Apply now” clicked — load form via AJAX
            $(document).on('click', '.apply-now', function(e) {
                e.preventDefault();
                const url = $(this).data('url');

                // open modal
                $('#applyModal').modal('show');

                // optionally: show loading indicator
                $('#applyModal .modal-body').html('<p>Loading...</p>');

                // fetch form html
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(html) {
                        $('#applyModal .modal-body').html(html);
                    },
                    error: function(xhr) {
                        $('#applyModal .modal-body').html(
                            '<p class="text-danger">Failed to load form. Please try again.</p>'
                            );
                    }
                });
            });

            // 2. Handle form submission via AJAX
            $(document).on('submit', '#applyForm', function(e) {
                e.preventDefault();

                const form = $(this);
                const action = form.attr('action');
                const formData = new FormData(this);

                // disable submit button to prevent double submits
                form.find('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: action,
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // optionally: close modal + show success message
                        $('#applyModal').modal('hide');
                        alert('Application submitted successfully!');
                        // or show a nicer alert / toast
                    },
                    error: function(xhr) {
                        // show validation errors or generic error
                        const errors = xhr.responseJSON?.errors;
                        if (errors) {
                            // e.g. iterate and display under fields
                            let errHtml = '<div class="alert alert-danger"><ul>';
                            $.each(errors, function(key, msgs) {
                                msgs.forEach(msg => {
                                    errHtml += '<li>' + msg + '</li>';
                                });
                            });
                            errHtml += '</ul></div>';
                            form.prepend(errHtml);
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                        form.find('button[type="submit"]').prop('disabled', false);
                    }
                });
            });

        });
    </script>
@endpush
