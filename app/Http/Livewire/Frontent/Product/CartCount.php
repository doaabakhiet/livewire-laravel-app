<?php

namespace App\Http\Livewire\Frontent\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{
    public $cartCount;
    protected $listeners = ['cartUpdated' => 'mount'];
    public function mount()
    {
        if(Auth::check()){
            $user=User::where('id',Auth::user()->id)->first();
            return $this->cartCount=$user->carts()->count();
        }else{
            return $this->cartCount=0;
        }
    }
    public function render()
    {
        return view('livewire.frontent.product.cart-count',['cartCount'=>$this->cartCount]);
    }
}
