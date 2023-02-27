<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id',auth()->user()->id)->orderBy('created_at' ,'DESC')->paginate(4);
        return view('frontend.collections.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $order=Order::where('id',$id)->where('user_id',auth()->user()->id)->first();
        return view('frontend.collections.orders.view',compact('order'));
    }
}
