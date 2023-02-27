<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistView extends Component
{ 
    public $user;
    public function removeWishlistItem($id)
    {
        $remove=$this->user->products()->where('products.id',$id)->detach($id);
        $this->emit('wishlistUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Already Deleted From Wishlist',
            'type' => 'info',
            'status' => '409'
        ]);
        
        // dd($remove);
    }
    public function render()
    {

        $this->user=User::where('id',Auth::user()->id)->first();
        $wishlists=$this->user->products()->get();
        return view('livewire.frontent.product.wishlist-view',compact('wishlists'));
    }
}
