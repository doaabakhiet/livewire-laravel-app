@inject('orders', 'App\Models\Order')
@inject('products', 'App\Models\Product')
@inject('brands', 'App\Models\Brand')
@inject('users', 'App\Models\User')
@extends('layouts.admin')
@section('page_name')
    Admin
@endsection
@section('content')

    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Your Analytics Dashboard Template</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 stretch-card text-white">
                <div class="card">
                    <div class="card-body bg-primary">
                    <label>Total Orders</label>
                    <h1>{{$orders->count()}}</h1>
                    <a href="{{url('dashboard/orders')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card text-white">
                <div class="card">
                    <div class="card-body bg-warning">
                    <label>Total Products</label>
                    <h1>{{$products->count()}}</h1>
                    <a href="{{url('dashboard/products')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card text-white">
                <div class="card">
                    <div class="card-body bg-danger">
                    <label>Total Brands</label>
                    <h1>{{$brands->count()}}</h1>
                    <a href="{{url('dashboard/brands')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card text-white">
                <div class="card">
                    <div class="card-body bg-success">
                    <label>Total Users</label>
                    <h1>{{$users->where('role_as','0')->count()}}</h1>
                    <a href="{{url('dashboard/users')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
