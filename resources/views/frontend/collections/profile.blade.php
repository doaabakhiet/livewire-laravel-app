@extends('layouts.app')
@section('title')
Profile
@endsection
@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <h4> Profile</h4>
            <a href="{{url('change-password')}}" class="btn btn-success float-end">Change Password ?</a>
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    @if (session('message'))
                        <p class="alert alert-success">{{session('message')}}</p>
                    @endif
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{url('profile')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>User Name</label>
                                            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{Auth::user()->userDetails->phone  ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Zip/Pin Code</label>
                                            <input type="text" name="pincode" value="{{Auth::user()->userDetails->pincode ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <input type="text" name="address" value="{{Auth::user()->userDetails->address ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection