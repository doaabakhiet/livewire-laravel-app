@extends('layouts.app')
@section('title')
    Home Page
@endsection
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $item)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

            <div class="carousel-inner">
                @foreach ($sliders as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('admin/' . $item->image) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="custom-carousel-content">
                                <h1>
                                    {{ $item->title }}
                                </h1>
                                <p>
                                    {{ $item->description }}
                                </p>
                                <div>
                                    {{-- <a href="#" class="btn btn-slider">
                                        Get Now
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h4>Welcome To Funda Of Web IT E-commerce</h4>
                    <div class="underline mx-auto"></div>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, ab neque magnam magni ducimus
                        voluptate iste nisi quasi quam inventore ex nam odit accusamus! Eveniet accusamus est perferendis
                        nostrum adipisci!</p>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($trendingProducts as $key => $item)
                            <div class="item">
                                {{-- <div class="col"> --}}
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if ($item->quantity > 0)
                                                <label class="stock bg-success">In Stock</label>
                                            @else
                                                <label class="stock bg-danger">Out Stock</label>
                                            @endif
                                            @if ($item->productImages->count() > 0)
                                                <img src="{{ asset('admin/' . $item->productImages[0]->image) }}"
                                                    height="140px" alt="Laptop">
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $item->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('categories/' . $item->category->slug . '/' . $item->slug) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $item->selling_price }}</span>
                                                <span class="original-price">${{ $item->original_price }}</span>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                                <a href="" class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="py-5 bg-white">
        <div class="container">
            <h4>New Arrival Products</h4>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($newArrivalProducts as $key => $item)
                            <div class="item">
                                <div class="">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                        <label class="badge bg-danger">New</label>
                                           
                                            @if ($item->quantity > 0)
                                                <label class="badge bg-success">In Stock</label>
                                            @else
                                                <label class="badge bg-danger">Out Stock</label>
                                            @endif
                                            @if ($item->productImages->count() > 0)
                                                <img src="{{ asset('admin/' . $item->productImages[0]->image) }}"
                                                    height="140px" alt="Laptop">
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $item->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('categories/' . $item->category->slug . '/' . $item->slug) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $item->selling_price }}</span>
                                                <span class="original-price">${{ $item->original_price }}</span>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                                <a href="" class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}
    <div class="py-5 bg-white">
        <div class="container">
            <h4>Featured Products</h4>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach ($featuredProducts as $key => $item)
                            <div class="item">
                                <div class="">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                        <label class="badge bg-danger">New</label>
                                           
                                            @if ($item->quantity > 0)
                                                <label class="badge bg-success">In Stock</label>
                                            @else
                                                <label class="badge bg-danger">Out Stock</label>
                                            @endif
                                            @if ($item->productImages->count() > 0)
                                                <img src="{{ asset('admin/' . $item->productImages[0]->image) }}"
                                                    height="140px" alt="Laptop">
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $item->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('categories/' . $item->category->slug . '/' . $item->slug) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $item->selling_price }}</span>
                                                <span class="original-price">${{ $item->original_price }}</span>
                                            </div>
                                            <div class="mt-2">
                                                <a href="" class="btn btn1">Add To Cart</a>
                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                                <a href="" class="btn btn1"> View </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container text-center">
            <span class="justify-content-center">
                <a href="{{url('/categories')}}" class="btn btn-warning text-white">View More</a>
            </span>
        </div>
    </div>
@endsection
@push('javascript')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
@endpush
