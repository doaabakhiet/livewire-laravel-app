<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartView extends Component
{
    public $quantityCount,$cartTotalPrice=0;

    public function removeCartItem($id)
    {
        $user=User::where('id',Auth::user()->id)->first();
        $remove=$user->carts()->where('carts.id',$id)->delete();
        $this->emit('cartUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Already Deleted From Wishlist',
            'type' => 'info',
            'status' => '409'
        ]);
    }
    public function decrementQuantity($cart_id, $product_id)
    {
        // dd($product_id);
        $cart = Cart::where('id', $cart_id)->where('user_id', Auth::user()->id)->first();
        if ($cart) {
            if ($cart->quantity > 1) {
                $qty = Product::where('id', $product_id)->first();
                $cart->decrement('quantity');
            }
        }
    }
    public function incrementQuantity($cart_id, $product_id)
    {
        $cart = Cart::where('id', $cart_id)->where('user_id', Auth::user()->id)->first();
        if ($cart) {
            if ($cart->quantity < 10) {
                if ($cart->colors) {
                    $product=Product::where('id',$product_id)->first();
                    if($cart->quantity <= $product->colors()->where('color_id',$cart->color_id)->first()->pivot->color_quantity){
                        $cart->increment('quantity');
                    }else{
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Your Quantity Exceeded Existed Color Quantity',
                            'type' => 'info',
                            'status' => '200'
                        ]);
                    }
                } else {
                    if ($cart->quantity < $cart->products->quantity) {
                        $cart->increment('quantity');
                    } else {

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Your Quantity Exceeded Existed Quantity',
                            'type' => 'info',
                            'status' => '200'
                        ]);
                    }
                }
            }
        }
    }
    public function render()
    {
        $this->user = User::where('id', Auth::user()->id)->first();
        $carts = $this->user->carts()->get();

        return view('livewire.frontent.product.cart-view', compact('carts'));
    }
}
