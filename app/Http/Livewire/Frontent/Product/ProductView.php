<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductView extends Component
{
    public $product, $category, $colorSelectedQuantity, $colorId, $addedToWishList, $quantityCount = 1, $addedAddedToCart = false;

    public function addToCart($product_id)
    {

        if (Auth::check()) {
            if ($this->product->where('status', '1')->where('id', $product_id)->exists()) {
                //check color 
                if ($this->product->colors()->count() > 1) {
                    if ($this->product->carts()->where('color_id', $this->colorId)->where('product_id', $product_id)->where('user_id', Auth::user()->id)->exists()) {
                        $this->product->carts()->where('color_id', $this->colorId)->where('product_id', $product_id)->where('user_id', Auth::user()->id)->delete();
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Removed From Cart',
                            'type' => 'info',
                            'status' => '200'
                        ]);
                        $this->addedAddedToCart = false;
                    } else {
                        if ($this->colorSelectedQuantity != null) {
                            $productColor = $this->product->colors()->where('color_id', $this->colorId)->first();
                            if ($productColor->pivot->color_quantity) {
                                if ($this->quantityCount <= $productColor->pivot->color_quantity) {
                                    Cart::create([
                                        'quantity' => $this->quantityCount,
                                        'user_id' => Auth::user()->id,
                                        'product_id' => $product_id,
                                        'color_id' => $this->colorId
                                    ]);
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added To Cart',
                                        'type' => 'success',
                                        'status' => '200'
                                    ]);
                                    $this->addedAddedToCart = true;
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only' . $productColor->pivot->color_quantity . 'Quantity Available',
                                        'type' => 'info',
                                        'status' => '401'
                                    ]);
                                    $this->addedAddedToCart = false;
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'This Color Out Of Stock',
                                    'type' => 'info',
                                    'status' => '401'
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Select product Color',
                                'type' => 'info',
                                'status' => '401'
                            ]);
                        }
                    }
                } else {
                    if ($this->product->carts()->exists()) {
                        $this->product->carts()->where('product_id', $product_id)->where('user_id', Auth::user()->id)->delete();
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Removed From Cart',
                            'type' => 'info',
                            'status' => '200'
                        ]);
                        $this->addedAddedToCart = false;
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->quantityCount <= $this->product->quantity) {
                                Cart::create([
                                    'quantity' => $this->quantityCount,
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $product_id,
                                    // 'color_id'=>$this->colorId
                                ]);
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added To Cart',
                                    'type' => 'success',
                                    'status' => '200'
                                ]);
                                $this->addedAddedToCart = true;
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only' . $this->product->quantity . 'Quantity Available',
                                    'type' => 'info',
                                    'status' => '401'
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'info',
                                'status' => '401'
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not Exist',
                    'type' => 'info',
                    'status' => '401'
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'U are Not Authunticated',
                'type' => 'info',
                'status' => '401'
            ]);
        }
        $this->emit('cartUpdated');
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function addToWishlist($productId)
    {
        if (Auth::check()) {
            if ($this->addedToWishList == "true") {
                $wishlist = $this->product->users()->detach(Auth::user()->id);
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Deleted To Wishlist',
                    'type' => 'info',
                    'status' => '409'
                ]);
                $this->addedToWishList = null;
                $this->emit('wishlistUpdated');
            } else {
                $wishlist = $this->product->users()->attach(Auth::user()->id);
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added To Wishlist Successfully',
                    'type' => 'info',
                    'status' => '200'
                ]);
                $this->addedToWishList = "true";
                $this->emit('wishlistUpdated');
            }
        } else {
            session()->flash('status', 'U are Not Authunticated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'U are Not Authunticated',
                'type' => 'info',
                'status' => '401'
            ]);
            return false;
        }
    }
    public function colorSelected($colorId)
    {
        $this->colorId = $colorId;

        $productColor = $this->product->colors()->where('color_id', $colorId)->first();
        $this->colorSelectedQuantity = $productColor->pivot->color_quantity;
        if ($this->colorSelectedQuantity == 0) {
            $this->colorSelectedQuantity = "Out Of Stock";
        } else {
            $this->colorSelectedQuantity = "In Stock";
        }
    }

    public function mount($category, $product)
    {
        $this->product = $product;
        $this->category = $category;

        if (Auth::check()) {
            if ($this->product->users()->first()) {
                $this->addedToWishList = "true";
            } else {
                $this->addedToWishList = "false";
            }
            if ($this->product->carts()->where('user_id', Auth::user()->id)->first()) {
                $this->addedAddedToCart = true;
            } else {
                $this->addedAddedToCart = false;
            }
            // dd($this->addedToWishList);
        }
    }
    public function render()
    {
        return view(
            'livewire.frontent.product.product-view',
            [
                'product' => $this->product, 'category' => $this->category, 'wishlist' => $this->addedToWishList,
                'cart' => $this->addedAddedToCart
            ]
        );
    }
}
