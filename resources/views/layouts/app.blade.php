<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div id="app">
        <div class="main-navbar shadow-sm sticky-top">
            <div class="top-navbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                            <h5 class="brand-name">Funda Ecom</h5>
                        </div>
                        <div class="col-md-5 my-auto">
                            <form role="search" action="{{url('search')}}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="search" value="{{Request::get('search')}}" placeholder="Search your product" class="form-control" />
                                    <button class="btn bg-white" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 my-auto">
                            <ul class="nav justify-content-end">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('cart') }}">
                                        <i class="fa fa-shopping-cart"></i> Cart (
                                        <livewire:frontent.product.cart-count />)
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('wishlist') }}">
                                        <i class="fa fa-heart"></i> Wishlist (
                                        <livewire:frontent.product.wishlist-count />)
                                    </a>
                                </li>

                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="{{url('profile')}}"><i class="fa fa-user"></i>
                                                    Profile</a></li>
                                            <li><a class="dropdown-item" href="{{url('orders')}}"><i class="fa fa-list"></i> My
                                                    Orders</a></li>
                                            <li><a class="dropdown-item" href="{{ url('wishlist') }}"><i
                                                        class="fa fa-heart"></i> My
                                                    Wishlist</a></li>
                                            <li><a class="dropdown-item" href="{{ url('cart') }}"><i class="fa fa-shopping-cart"></i>
                                                    My Cart</a></li>
                                            <li><a class="dropdown-item" href="#">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                                        <i class="fa fa-sign-out"></i>
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                        Funda Ecom
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/categories') }}">All Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/featured') }}">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Electronics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fashions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Appliances</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        <div>
            <div class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="footer-heading">Funda E-Commerce</h4>
                            <div class="footer-underline"></div>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-heading">Quick Links</h4>
                            <div class="footer-underline"></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">About Us</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Contact Us</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Blogs</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Sitemaps</a></div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-heading">Shop Now</h4>
                            <div class="footer-underline"></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Collections</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Trending Products</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">New Arrivals Products</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Featured Products</a></div>
                            <div class="mb-2"><a href="{{url('/')}}" class="text-white">Cart</a></div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="footer-heading">Reach Us</h4>
                            <div class="footer-underline"></div>
                            <div class="mb-2">
                                <p>
                                    <i class="fa fa-map-marker"></i> #444, some main road, some area, some street, bangalore, india - 560077
                                </p>
                            </div>
                            <div class="mb-2">
                                <a href="{{url('/')}}" class="text-white">
                                    <i class="fa fa-phone"></i> +91 888-XXX-XXXX
                                </a>
                            </div>
                            <div class="mb-2">
                                <a href="{{url('/')}}" class="text-white">
                                    <i class="fa fa-envelope"></i> fundaofwebit@gmail.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <p class=""> &copy; 2022 - Doaa Bakhiet All rights reserved.</p>
                        </div>
                        <div class="col-md-4">
                            <div class="social-media">
                                Get Connected:
                                <a href="{{url('/')}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{url('/')}}"><i class="fa fa-twitter"></i></a>
                                <a href="{{url('/')}}"><i class="fa fa-instagram"></i></a>
                                <a href="{{url('/')}}"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"crossorigin="anonymous">
        </script> --}}
        <script src="{{ asset('assets/exzoom/jquery.exzoom.js')}}"></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script>
            window.addEventListener('message', event => {
                if (event.detail) {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.notify(event.detail.text, event.detail.type);
                }

            })
            // alertify.set('notifier', 'position', 'top-right');
            // alertify.success('Current position : ' + alertify.get('notifier', 'position'));
        </script>
        @livewireScripts
        @stack('javascript')
</body>

</html>
