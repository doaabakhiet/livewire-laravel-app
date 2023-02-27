@extends('layouts.admin')
@section('page_name')
    Admin | Orders
@endsection
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <form action="{{url('dashboard/orders')}}" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <label>Filter By Date</label>
                    <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Filter By Status</label>
                    <select name="status" id="" class="form-select">
                        <option value="">Select Option</option>
                        <option value="In progress">In progress</option>
                        <option value="completed">Completed</option>
                        <option value="pending">Pending</option>
                        <option value="canceled">Canceled</option>
                        <option value="out-for-delivery">Out For Delivery</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <br/>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <hr/>
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
                    <td>{{$item->tracking_number}}</td>
                    <td>{{$item->full_name}}</td>
                    <td>{{$item->payment_mode}}</td>
                    <td>{{$item->created_at->format('d-m-y')}}</td>
                    <td>{{$item->status_message}}</td>
                    <td><a href="{{url('dashboard/orders/'.$item->id)}}" class="btn btn-success">View</a></td>
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