<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard::HMC</title>

    <!-- Meta -->
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav-icon.png') }}">

    <!-- *************
  ************ CSS Files *************
 ************* -->
    <link rel="stylesheet" href="{{ asset('assets/backend/fonts/remix/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main.min.css') }}">

    <!-- *************
  ************ Vendor Css Files *************
 ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/overlay-scroll/OverlayScrollbars.min.css') }}">

    <!-- Date Range CSS -->
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/daterange/daterange.css') }}">

</head>

<body>

    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
        <div class="spin-wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
    </div>
    <!-- Loading ends -->

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

        <!-- Main container starts -->
        <div class="main-container">

            <!-- Sidebar wrapper starts -->
            <nav id="sidebar" class="sidebar-wrapper">

                <!-- Brand container starts -->
                <div class="brand-container d-flex align-items-center justify-content-between">

                    <!-- App brand starts -->
                    <div class="app-brand ms-3">
                        <a href="index.html">
                            <img src="{{ asset('assets/img/logo-white.png') }}" class="logo" alt="HMC LOGO">
                        </a>
                    </div>
                    <!-- App brand ends -->

                    <!-- Pin sidebar starts -->
                    <button type="button" class="pin-sidebar me-3">
                        <i class="ri-menu-line"></i>
                    </button>
                    <!-- Pin sidebar ends -->

                </div>
                <!-- Brand container ends -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li
                            class="{{ request()->routeIs('admin.dashboard') || request()->routeIs('admin.index') ? 'active current-page' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="ri-home-smile-2-line"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#!">
                                <i class="ri-calendar-2-line"></i>
                                <span class="menu-text">Appointments</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ route('admin.appointments.index') }}">Appointment List</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.appointments.create') }}">Add Appointment</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#!">
                                <i class="ri-nurse-line"></i>
                                <span class="menu-text">Lab Results</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ route('admin.lab-results.index') }}">Result List</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.lab-results.create') }}">Add Result</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('admin.patients.index') }}">
                                <i class="ri-empathize-line"></i>
                                <span class="menu-text">My Patients</span>
                            </a>
                        </li>
                        <li class="treeview {{ request()->routeIs('admin.banners.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-artboard-line"></i>
                                <span class="menu-text">Banners</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.banners.index') ? 'active' : '' }}"
                                        href="{{ route('admin.banners.index') }}">Banner List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.banners.create') ? 'active' : '' }}"
                                        href="{{ route('admin.banners.create') }}">Add Banner</a>
                                </li>
                            </ul>
                        </li>

                        <li class="treeview {{ request()->routeIs('admin.doctors.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-user-star-line"></i>
                                <span class="menu-text">Doctors</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.doctors.index') ? 'active' : '' }}"
                                        href="{{ route('admin.doctors.index') }}">Doctor List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.doctors.create') ? 'active' : '' }}"
                                        href="{{ route('admin.doctors.create') }}">Add Doctor</a>
                                </li>
                            </ul>
                        </li>


                        <li
                            class="treeview {{ request()->routeIs('admin.departments.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-verified-badge-fill"></i>
                                <span class="menu-text">Departments</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.departments.index') ? 'active' : '' }}"
                                        href="{{ route('admin.departments.index') }}">Department List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.departments.create') ? 'active' : '' }}"
                                        href="{{ route('admin.departments.create') }}">Add Department</a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="treeview {{ request()->routeIs('admin.services.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-verified-badge-line"></i>
                                <span class="menu-text">Services</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.services.create') ? 'active' : '' }}"
                                        href="{{ route('admin.services.index') }}">Service List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.services.create') ? 'active' : '' }}"
                                        href="{{ route('admin.services.create') }}">Add Service</a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="treeview {{ request()->routeIs('admin.gallery_groups.*') || request()->routeIs('admin.gallery_items.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-nurse-line"></i>
                                <span class="menu-text">Gallery</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.gallery_groups.create') ? 'active' : '' }}"
                                        href="{{ route('admin.gallery_groups.index') }}">Images List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.gallery_groups.create') ? 'active' : '' }}"
                                        href="{{ route('admin.gallery_groups.create') }}">Add Images</a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class="treeview {{ request()->routeIs('admin.testimonials.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-nurse-line"></i>
                                <span class="menu-text">Testimonials</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.testimonials.create') ? 'active' : '' }}"
                                        href="{{ route('admin.testimonials.index') }}">Testimonial List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.testimonials.create') ? 'active' : '' }}"
                                        href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
                                </li>
                            </ul>
                        </li>
                        <li
                            class=" treeview {{ request()->routeIs('admin.blogs.news-events.*') || request()->routeIs('admin.blogs.articles.*') || request()->routeIs('admin.blogs.vlogs.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-nurse-line"></i>
                                <span class="menu-text">Blogs</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.blogs.news-events.*') ? 'active' : '' }}"
                                        href="{{ route('admin.blogs.news-events.index') }}">News and Events</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.blogs.articles.*') ? 'active' : '' }}"
                                        href="{{ route('admin.blogs.articles.index') }}">Articles</a>
                                </li>

                                <li class="mb-5">
                                    <a class="{{ request()->routeIs('admin.blogs.vlogs.*') ? 'active' : '' }}"
                                        href="{{ route('admin.blogs.vlogs.index') }}">Vlogs</a>
                                </li>
                                <li class="mb-5"></li>
                            </ul>
                        </li>
                         <li class="mb-5 treeview {{ request()->routeIs('admin.career.*') ? 'active current-page' : '' }}">
                            <a href="#!">
                                <i class="ri-threads-fill"></i>
                                <span class="menu-text">Career</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="{{ request()->routeIs('admin.career.index') ? 'active' : '' }}"
                                        href="{{ route('admin.career.index') }}">Career List</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.career.create') ? 'active' : '' }}"
                                        href="{{ route('admin.career.create') }}">Add Career</a>
                                </li>
                            </ul>
                        </li>
   <li class="mb-5"></li>
                        <li class="mb-5"></li>
                        {{-- <li class="treeview">
                            <a href="#!">
                                <i class="ri-nurse-line"></i>
                                <span class="menu-text">Staff</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ route('admin.staffs.index') }}">Staff List</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.staffs.create') }}">Add Staff</a>
                                </li>
                            </ul>
                        </li> --}}


                        {{-- <li>
                            <a href="{{ route('admin.account-settings.index') }}">
                                <i class="ri-settings-5-line"></i>
                                <span class="menu-text">Account Settings</span>
                            </a>
                        </li> --}}

                    </ul>
                </div>
                <!-- Sidebar menu ends -->

            </nav>
            <!-- Sidebar wrapper ends -->

            <!-- App container starts -->
            <div class="app-container">

                <!-- App header starts -->
                <div class="app-header d-flex align-items-center">

                    <!-- Brand container sm starts -->
                    <div class="brand-container-sm d-xl-none d-flex align-items-center">

                        <!-- App brand starts -->
                        <div class="app-brand">
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo-white.png') }}" class="logo"
                                    alt="HMC Admin LOGO">
                            </a>
                        </div>
                        <!-- App brand ends -->

                        <!-- Toggle sidebar starts -->
                        <button type="button" class="toggle-sidebar">
                            <i class="ri-menu-line"></i>
                        </button>
                        <!-- Toggle sidebar ends -->

                    </div>
                    <!-- Brand container sm ends -->

                    <!-- Search container starts -->
                    {{-- <div class="search-container d-xl-block d-none">
                        <input type="text" class="form-control" id="searchId" placeholder="Search">
                        <i class="ri-search-line"></i>
                    </div> --}}
                    <!-- Search container ends -->

                    <!-- App header actions starts -->
                    <div class="header-actions">

                        <!-- Header actions starts -->
                        <div class="d-lg-flex d-none gap-2">


                            <!-- Bookmarks starts -->
                            <div class="dropdown">
                                <a class="dropdown-toggle header-icon" href="#!" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-star-line"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-300">
                                    <h5 class="fw-semibold px-3 py-2 text-primary">Bookmarks</h5>

                                    <div class="d-flex justify-content-center gap-3">
                                        <a href="{{ route('admin.doctors.index') }}" class="text-center">
                                            <div class="icon-box lg bg-primary-subtle rounded-5 mb-1">
                                                <i class="ri-stethoscope-line text-primary fs-4"></i>
                                            </div>
                                            Doctors
                                        </a>
                                        <a href="{{ route('admin.appointments.index') }}" class="text-center">
                                            <div class="icon-box lg bg-primary-subtle rounded-5 mb-1">
                                                <i class="ri-nurse-line text-primary fs-4"></i>
                                            </div>
                                            Appointments
                                        </a>
                                        <a href="{{ route('admin.patients.index') }}" class="text-center">
                                            <div class="icon-box lg bg-primary-subtle rounded-5 mb-1">
                                                <i class="ri-group-2-line text-primary fs-4"></i>
                                            </div>
                                            Patients
                                        </a>
                                    </div>

                                    <!-- View all button starts -->
                                    {{-- <div class="d-grid m-3">
                                        <a href="javascript:void(0)" class="btn btn-outline-primary">Add New
                                            Bookmark</a>
                                    </div> --}}
                                    <!-- View all button ends -->

                                </div>
                            </div>
                            <!-- Bookmarks ends -->


                            {{--
                            <!-- Notifications dropdown starts -->
                            <div class="dropdown">
                                <a class="dropdown-toggle header-icon" href="#!" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-alarm-warning-line"></i>
                                    <span class="count-label success"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-300">
                                    <h5 class="fw-semibold px-3 py-2 text-primary">Alerts</h5>

                                    <!-- Scroll starts -->
                                    <div class="scroll300">

                                        <!-- Alert list starts -->
                                        <div class="p-3">
                                            <div class="d-flex py-2">
                                                <div class="icon-box md bg-primary rounded-circle me-3">
                                                    <span>BS</span>
                                                </div>
                                                <div class="m-0">
                                                    <h6 class="mb-1 fw-semibold">Becky Shah</h6>
                                                    <p class="mb-1">
                                                        Appointed as a new President 2025
                                                    </p>
                                                    <p class="small m-0 opacity-50">Today, 07:30pm</p>
                                                </div>
                                            </div>
                                            <div class="d-flex py-2">
                                                <div class="icon-box md bg-primary rounded-circle me-3">
                                                    <span>UF</span>
                                                </div>
                                                <div class="m-0">
                                                    <h6 class="mb-1 fw-semibold">Ursula Frazier</h6>
                                                    <p class="mb-1">
                                                        Congratulate, James for new job.
                                                    </p>
                                                    <p class="small m-0 opacity-50">Today, 08:00pm</p>
                                                </div>
                                            </div>
                                            <div class="d-flex py-2">
                                                <div class="icon-box md bg-primary rounded-circle me-3">
                                                    <span>MK</span>
                                                </div>
                                                <div class="m-0">
                                                    <h6 class="mb-1 fw-semibold">Myra Kane</h6>
                                                    <p class="mb-1">
                                                        Lewis added new doctors training schedule.
                                                    </p>
                                                    <p class="small m-0 opacity-50">Today, 09:30pm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Alert list ends -->

                                    </div>
                                    <!-- Scroll ends -->

                                    <!-- View all button starts -->
                                    <div class="d-grid m-3">
                                        <a href="javascript:void(0)" class="btn btn-primary">View all</a>
                                    </div>
                                    <!-- View all button ends -->

                                </div>
                            </div>
                            <!-- Notifications dropdown ends --> --}}

                        </div>
                        <!-- Header actions ends -->

                        <!-- Header user settings starts -->
                        <div class="dropdown ms-3">
                            <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar-box">
                                    <img src="{{ auth()->user()->image_url ?? asset('assets/backend/images/doctor5.png') }}"
                                        class="img-2xx rounded-5 border border-3 border-white"
                                        alt="Dentist Dashboard">
                                    <span class="status busy"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end shadow-lg">
                                <div class="px-3 py-2">
                                    <span class="small">{{ auth()->user()->name }}</span>
                                    <h6 class="m-0">{{ auth()->user()->email }}</h6>
                                </div>
                                <div class="mx-3 my-2 d-grid">
                                    <a href="{{ route('admin.account.edit') }}">Account Settings</a>
                                </div>
                                <div class="mx-3 my-2 d-grid">

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" name="logout">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Header user settings ends -->

                    </div>
                    <!-- App header actions ends -->

                </div>
                <!-- App header ends -->

                <!-- App hero header starts -->
                @yield('breadcrumb')
                <!-- App Hero header ends -->

                <!-- App body starts -->
                <div class="app-body">

                    @yield('content')

                </div>
                <!-- App body ends -->

                <!-- App footer starts -->
                <div class="app-footer">
                    <span>© HMC 2025</span>
                </div>
                <!-- App footer ends -->

            </div>
            <!-- App container ends -->

        </div>
        <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

    <!-- *************
   ************ JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/moment.min.js') }}"></script>

    <!-- *************
   ************ Vendor Js Files *************
  ************* -->

    <!-- Overlay Scroll JS -->
    <script src="{{ asset('assets/backend/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

    <!-- Date Range JS -->
    <script src="{{ asset('assets/backend/vendor/daterange/daterange.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/daterange/custom-daterange.js') }}"></script>

    <!-- Apex Charts -->
    <script src="{{ asset('assets/backend/vendor/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/apex/custom/dentist/patients.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/apex/custom/dentist/appointments.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/apex/custom/dentist/income.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/apex/custom/dentist/earnings.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/apex/custom/dentist/claims.js') }}"></script>

    <!-- Custom JS files -->
    <script src="{{ asset('assets/backend/js/custom.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(Idd) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById('form_' + Idd).submit();
                }
            });
        }

        function confirmDeleteAll(event, $form) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById($form).submit();
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#imgSelect").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imgPreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
