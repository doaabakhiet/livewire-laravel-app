@extends('layouts.app')
@section('title')
    Order Detail
@endsection
@section('content')
@php $totalPrice=0; @endphp
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="shadow bg-white p-3">
                <h4>
                    <i class="fa fa-shopping-cart"></i>Order Detail
                </h4>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <h6>Order Details</h6>
                        <hr>
                        <h6>Full Name:{{ $order->id }}</h6>
                        <h6>Tracking NO.:{{ $order->tracking_no }}</h6>
                        <h6>Email Id:{{ $order->email }}</h6>
                        <h6>Order Created Date:{{ $order->created_at->format('d-m-y h:i A') }}</h6>
                        <h6>Paymeent Mode:{{ $order->payment_mode }}</h6>
                        <h6 class="border p-2 text-success">Order Status Message: <span
                                class="text-uppercase">{{ $order->status_message }}</span></h6>
                    </div>
                    <div class="col-md-6">
                        <h6>User Details</h6>
                        <hr>
                        <h6>Full Name:{{ $order->full_name }}</h6>
                        <h6>Email Id:{{ $order->email }}</h6>
                        <h6>Phone:{{ $order->phone }}</h6>
                        <h6>Address:{{ $order->address }}</h6>
                        <h6>Pin code:{{ $order->pincode }}</h6>
                    </div>
                </div>
                <br>
                <h5>Order Items</h5>
                <hr />
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            {{-- <th>Tracking NO</th> --}}
                            <th>Image</th>
                            <th>Colors</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($order->order_items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $item->tracking_no }}</td> --}}
                                    <td>
                                        @if ($item->products->productImages)
                                            @foreach ($item->products->productImages as $image)
                                                <img src="{{ asset('admin/' . $image->image) }}"
                                                    style="width: 50px; height: 50px" alt="">
                                            @break
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if ($item->colors)
                                        <div class="badge " style="background-color:{{ $item->colors->code }}">
                                            {{ $item->colors->name }}</div>
                                    @else
                                        <span>Not Specified</span>
                                    @endif
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity * $item->price }}</td>
                                @php $totalPrice+=$item->quantity * $item->price; @endphp
                            </tr>
                            <tr>
                                <td colspan="6" class="fw-bold"><h4>Total Amount :</h4></td>
                                <td colspan="1" class="text-danger fw-bold"><span class="float-end">${{$totalPrice}}</span> </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <h1>No Orders Items Yet</h1>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
