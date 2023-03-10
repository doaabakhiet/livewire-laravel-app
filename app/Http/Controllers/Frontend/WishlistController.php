<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('frontend.collections.wishlists.index');
    }

    public function cart()
    {
        return view('frontend.collections.carts.index');
    }
}
