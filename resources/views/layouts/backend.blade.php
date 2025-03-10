<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/vendor/stellar/assets/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/vendor/stellar/assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/vendor/stellar/assets/images/favicon.png" />

    {{-- select 2 --}}
    <link rel="stylesheet" href="/vendor/select2/select2.min.css" />
    <link rel="stylesheet" href="/vendor/select2/select2-bootstrap-5-theme.min.css" />

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="/dashboard">
                    <img src="/images/logo.png" alt="logo" class="logo-dark" style="width: 50px" />
                    <span class="h5 text-light">Heaven Hotel</span>
                </a>
                <a class="navbar-brand brand-logo-mini" href="/dashboard"><img
                        src="/vendor/stellar/assets/images/logo-mini.svg" alt="logo" /></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <h5 class="mb-0 font-weight-medium d-none d-lg-flex text-uppercase">{{ $title }}</h5>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle ms-2"
                                src="{{ asset('storage/profile/' . auth('admin')->user()->photo) }}"
                                alt="Profile image"> <span class="font-weight-normal"> {{ auth('admin')->user()->nama }}
                            </span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle"
                                    src="{{ asset('storage/profile/' . auth('admin')->user()->photo) }}"
                                    alt="Profile image" width="100px">
                                <p class="mb-1 mt-3">{{ auth('admin')->user()->nama }}</p>
                                <p class="font-weight-light text-muted mb-0">{{ auth('admin')->user()->email }}</p>
                            </div>
                            <a class="dropdown-item" href="/profile"><i
                                    class="dropdown-item-icon icon-user text-primary"></i> My Profile </a>
                            <a class="dropdown-item" href="/logout"><i
                                    class="dropdown-item-icon icon-power text-primary"></i>Logout</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024
                            Stellar. All rights reserved. <a href="#"> Terms of use</a><a href="#">Privacy
                                Policy</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="icon-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/vendor/stellar/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

     {{-- select 2 --}}
     <script src="/vendor/select2/select2.full.min.js"></script>
     {{-- <script src="/vendor/select2/jquery.slim.min.js"></script> --}}
     
    {{-- Custom Javascript --}}
    @yield('script')

    <!-- Plugin js for this page -->
    <script src="/vendor/stellar/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="/vendor/stellar/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/vendor/stellar/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/moment/moment.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="/vendor/stellar/assets/vendors/chartist/chartist.min.js"></script>
    <script src="/vendor/stellar/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/vendor/stellar/assets/js/jquery.cookie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/vendor/stellar/assets/js/off-canvas.js"></script>
    <script src="/vendor/stellar/assets/js/hoverable-collapse.js"></script>
    <script src="/vendor/stellar/assets/js/misc.js"></script>
    <script src="/vendor/stellar/assets/js/settings.js"></script>
    <script src="/vendor/stellar/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/vendor/stellar/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

   



</body>

</html>
