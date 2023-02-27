<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Majestic Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('majesticAdmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('majesticAdmin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('majesticAdmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('majesticAdmin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('majesticAdmin/images/favicon.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    @livewireStyles
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
            </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="index.html"><img
                            src="{{ asset('majesticAdmin/images/logo.svg') }}" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                            src="{{ asset('majesticAdmin/images/logo-mini.svg') }}" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-4 w-100">
                    <li class="nav-item nav-search d-none d-lg-block w-100">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="search">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search now" aria-label="search"
                                aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown me-1">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                            id="messageDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="mdi mdi-message-text mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="messageDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <img src="{{ asset('majesticAdmin/images/faces/face4.jpg') }}" alt="image"
                                        class="profile-pic">
                                </div>
                                <div class="item-content flex-grow">
                                    <h6 class="ellipsis font-weight-normal">David Grey
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <img src="{{ asset('majesticAdmin/images/faces/face2.jpg') }}" alt="image"
                                        class="profile-pic">
                                </div>
                                <div class="item-content flex-grow">
                                    <h6 class="ellipsis font-weight-normal">Tim Cook
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        New product launch
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <img src="{{ asset('majesticAdmin/images/faces/face3.jpg') }}" alt="image"
                                        class="profile-pic">
                                </div>
                                <div class="item-content flex-grow">
                                    <h6 class="ellipsis font-weight-normal"> Johnson
                                    </h6>
                                    <p class="font-weight-light small-text text-muted mb-0">
                                        Upcoming board meeting
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown me-4">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown"
                            id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="mdi mdi-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-success">
                                        <i class="mdi mdi-information mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-warning">
                                        <i class="mdi mdi-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="item-thumbnail">
                                    <div class="item-icon bg-info">
                                        <i class="mdi mdi-account-box mx-0"></i>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h6 class="font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            id="profileDropdown">
                            <img src="{{ asset('majesticAdmin/images/faces/face5.jpg') }}" alt="profile" />
                            <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item {{Request::is('/dashboard/admin')? 'active ':''}}">
                        <a class="nav-link" href="{{url('/dashboard/admin')}}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/categories/index')? 'active':''}}">
                        <a class="nav-link" href="{{ Route('dashboard.categories.index') }}">
                            <i class="mdi mdi-chart-pie menu-icon"></i>
                            <span class="menu-title">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/products/index')? 'active':''}}">
                        <a class="nav-link" href="{{ Route('dashboard.products.index') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Prodducts</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/brands')? 'active':''}}">
                        <a class="nav-link" href="{{ url('dashboard/brands') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Brands</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/colors/index')? 'active':''}}">
                        <a class="nav-link" href="{{ Route('dashboard.colors.index') }}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Colors</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/sliders/index')? 'active':''}}">
                        <a class="nav-link" href="{{ Route('dashboard.sliders.index') }}">
                            <i class="mdi mdi-emoticon menu-icon"></i>
                            <span class="menu-title">Sliders</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/orders.index')? 'active':''}}">
                        <a class="nav-link" href="{{ Route('dashboard.orders.index') }}">
                            <i class="mdi mdi-emoticon menu-icon"></i>
                            <span class="menu-title">Orders</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('/dashboard/users/index')? 'active':''}}">
                        <a class="nav-link"href="{{ Route('dashboard.users.index') }}">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">User Pages</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item" {{Request::is('/dashboard/admin')? 'active':''}}>
                        <a class="nav-link" href="documentation/documentation.html">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="me-md-3 me-xl-5">
                                        <h2>Welcome back,</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">@yield('page_name')</p><br>
                                        @if (session('status'))
                                            <h3 class="alert alert-success">{{ session('status') }}</h3>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                                href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com
                            </a>2021</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a
                                href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a>
                            templates</span>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="{{ asset('majesticAdmin/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    {{-- <script src="{{asset('majesticAdmin/vendors/chart.js/Chart.min.js')}}"></script> --}}
    <script src="{{ asset('majesticAdmin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('majesticAdmin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('majesticAdmin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('majesticAdmin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('majesticAdmin/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('majesticAdmin/js/dashboard.js') }}"></script>
    <script src="{{ asset('majesticAdmin/js/data-table.js') }}"></script>
    <script src="{{ asset('majesticAdmin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('majesticAdmin/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    
    @livewireScripts
    @stack('javascript')
</body>

</html>
