<div>
    <div class="row">
        <div class="col-md-2">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $item)
                            <label class="d-block">
                                <input type="checkbox" wire:model='brandInputs' value="{{ $item->id }}" />
                                {{ $item->id }}{{ $item->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="pricesort" wire:model='priceInput' value="highToLaw" />
                            High To Law
                        </label>
                        <label class="d-block">
                            <input type="radio" name="pricesort" wire:model='priceInput' value="lawToHigh" />
                            Law To High
                        </label>
                </div>
            </div>

        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                @forelse($products as $key=>$item)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($item->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out Stock</label>
                                @endif
                                @if ($item->productImages->count() > 0)
                                    <img src="{{ asset('admin/' . $item->productImages[0]->image) }}" alt="Laptop">
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $item->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('categories/' . $item->category->slug . '/' . $item->slug) }}">
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
                @empty
                    <h2>No Collection Available Of This Category {{ $category->name }}...!</h2>
                @endforelse
            </div>
        </div>
    </div>
</div>
