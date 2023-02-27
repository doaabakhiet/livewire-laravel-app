<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $todayDate=Carbon::now();
        // $orders=Order::whereDate('created_at' ,$todayDate)->paginate(4);
        $todayDate=Carbon::now()->format('Y-m-d');
        $orders=Order::when($request->date !=null,function($q)use($request){
                                return $q->orWhereDate('created_at' ,$request->date);
                            },function($q)use($todayDate){
                                $q->orWhereDate('created_at' ,$todayDate);
                            
                            })->when($request->status !=null,function($q)use($request){
                                return $q->whereDate('status_message' ,$request->status);
                            })->paginate(4);
        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::where('id',$id)->first();
        return view('admin.orders.view',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::where('id',$id)->first();
        $order->update([
            'status_message'=>$request->status
        ]);
        return redirect()->back()->with(['status'=>'status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
