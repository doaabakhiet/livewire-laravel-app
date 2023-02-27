@extends('layouts.app')
@section('title')
Featured Products
@endsection
@section('content')
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
@endsection

@push('javascript')
    <script>
        $('.owl-carousel').owlCarousel({
            // loop: true,
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
                    items: 5
                }
            }
        });
    </script>
@endpush
