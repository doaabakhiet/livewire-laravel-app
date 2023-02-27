@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>#</th>
                    <th>Tracking NO</th>
                    <th>Username</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Status Message</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($orders as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tracking_no}}</td>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->payment_mode}}</td>
                        <td>{{$item->created_at->format('d-m-y')}}</td>
                        <td>{{$item->status_message}}</td>
                        <td><a href="{{url('order/'.$item->id)}}" class="btn btn-success">View</a></td>
                    </tr> 
                    @empty 
                    <tr>
                        <td><h1>No Orders Yet</h1></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
@endsection

