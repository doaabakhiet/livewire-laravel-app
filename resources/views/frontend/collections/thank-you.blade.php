@extends('layouts.app')
@section('title')
    Thank You
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="p-4 shadow bg-white">
                <h2></h2>
                <h4>Thank You For Shopping With Our E-commerce</h4><br>
                <span><a href="{{url('categories')}}" class="btn btn-primary w-100">Shop Now</a></span>
            </div>
        </div>
    </div>
@endsection
