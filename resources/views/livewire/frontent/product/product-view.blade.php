<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages->count() > 0)
                            {{-- <img src="{{ asset('admin/' . $product->productImages[0]->image) }}" class="w-100"
                                alt="Img"> --}}

                            <div class="exzoom" id="exzoom">
                                <!-- Images -->
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $image)
                                            <li><img src="{{ asset('admin/' . $image->image) }}" /></li>
                                        @endforeach
                                        ...
                                    </ul>
                                </div>
                                <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                                <div class="exzoom_nav"></div>
                                <!-- Nav Buttons -->
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">${{ $product->selling_price }}</span>
                            <span class="original-price">${{ $product->original_price }}</span>
                        </div>
                        <div >
                            @if ($product->colors->count() > 0)
                                @foreach ($product->colors as $item)
                                    {{-- <input type="radio" value="{{$item->id}}" name="colorSelection"/>{{$item->name}} --}}
                                    <label class="colorSelection badge" style="background-color: {{ $item->code }}"
                                        wire:click="colorSelected({{ $item->id }})">{{ $item->name }}</label>
                                @endforeach
                                <div>
                                    @if ($this->colorSelectedQuantity == 'Out Of Stock')
                                        <label class="colorSelection badge bg-danger ">Out Of Stock</label>
                                    @elseif($this->colorSelectedQuantity == 'In Stock')
                                        <label class="colorSelection badge bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class=" btn-sm py-2 mt-2 text-white badge bg-success">In Stock</label>
                                @else
                                    <label class=" btn-sm py-2 mt-2 text-white badge bg-danger">Out Of Stock</label>
                                @endif
                            @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" readonly
                                    value="{{ $this->quantityCount }}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <span wire:click="addToCart({{ $product->id }})"
                                class="btn btn1 {{ $cart == 'true' ? 'btn-primary' : '' }}"> <i
                                    class="fa fa-shopping-cart"></i> Add To
                                Cart</span>
                            <button wire:click="addToWishlist({{ $product->id }})"
                                class="btn btn1 {{ $wishlist == 'true' ? 'btn-primary' : '' }}">
                                <span wire:loading.remove wire:target="addToWishlist"><i class="fa fa-heart"></i>Add To
                                    Wishlist</span>
                                <span wire:loading wire:target="addToWishlist">Loading...!</span> </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="py-5 bg-white">
                    <div class="container">
                        <h4> Related {{$category!=null?$category->name:''}} Products</h4>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($category->relatedProducts->take(15) as $key => $item)
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
            </div>

            <div class="row">
                <div class="py-5 bg-white">
                    <div class="container">
                        <h4> Related {{$product->brands}} Brands</h4>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($category->relatedProducts->take(15) as $key => $item)
                                        @if($product->brand==$item->brand)
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
                                         
                                       @endif 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('javascript')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": true,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 4000

            });

        });
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
                    items: 4
                }
            }
        });

    </script>
@endpush
