<div>
    <div>
        {{-- In work, do what you enjoy. --}}
        <div class="py-3 py-md-5 bg-light">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">

                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price For Peace</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Total Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Color</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>
                            @forelse ($carts as $item)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-2 my-auto">
                                            <a
                                                href="{{ url('categories/' . $item->products->category->slug . '/' . $item->products->slug) }}">
                                                <label class="product-name">
                                                    @if ($item->products->productImages)
                                                        @foreach ($item->products->productImages as $image)
                                                            <img src="{{ asset('admin/' . $image->image) }}"
                                                                style="width: 50px; height: 50px" alt="">
                                                            @break
                                                        @endforeach
                                                    @endif
                                                {{ $item->products->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{ $item->products->selling_price }}</label>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label
                                            class="price">${{ $item->products->selling_price * $item->quantity }}</label>
                                        @php $cartTotalPrice+=$item->products->selling_price * $item->quantity @endphp
                                    </div>
                                    <div class="col-md-2 col-12 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <button class="btn btn1" wire:loading.attr="disabled"
                                                    wire:click="decrementQuantity({{ $item->id }},{{ $item->products->id }})"><i
                                                        class="fa fa-minus"></i></button>
                                                <input type="text" readonly value="{{ $item->quantity }}"
                                                    class="input-quantity" />
                                                <button class="btn btn1" wire:loading.attr="disabled"
                                                    wire:click="incrementQuantity({{ $item->id }},{{ $item->products->id }})"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 my-auto">
                                        <div class="color">
                                            @if ($item->colors)
                                                <div class="badge "
                                                    style="background-color:{{ $item->colors->code }}">
                                                    {{ $item->colors->name }}</div>
                                            @else
                                                <span>Not Specified</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:loading.attr="disabled"
                                                wire:click="removeCartItem({{ $item->id }})"
                                                class="btn btn-danger btn-sm">
                                                <span wire:loading.remove
                                                    wire:target="removeCartItem({{ $item->id }})">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading
                                                    wire:target="removeCartItem({{ $item->id }})">Loading...!</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4>No products Added To Cart</h4>
                        @endforelse

                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-8 my-md-auto mt-3">Get The Best Deals & Offers</div>
                                <div class="col-md-4 mt-3">
                                    <div class="shadow-sm bg-white p-3">
                                        <h4>Total Price: <span class="text-danger">${{ $cartTotalPrice }}</span>
                                        </h4>
                                        <hr>
                                        <a href="{{ url('checkout') }}" class="btn btn-warning w-100">Check Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
