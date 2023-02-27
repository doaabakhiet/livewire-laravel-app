<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;
    protected $listeners = ['wishlistUpdated' => 'mount'];
    public function mount()
    {
        if(Auth::check()){
            $user=User::where('id',Auth::user()->id)->first();
            return $this->wishlistCount=$user->products()->count();
        }else{
            return $this->wishlistCount=0;
        }
    }
    public function render()
    {
        return view('livewire.frontent.product.wishlist-count',['wishlistCount'=>$this->wishlistCount]);
    }
}
