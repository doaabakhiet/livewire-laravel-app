@extends('layouts.app')
@section('title')
    Change Password
@endsection
@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <h4>Change Password</h4>
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    @if (session('message'))
                        <p class="alert alert-success">{{ session('message') }}</p>
                    @endif
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ url('change-password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            @error('last_password')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                            <label>Current Password</label>
                                            <input type="password" name="last_password" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            @error('password')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                            <label>New Password</label>
                                            <input type="password" name="password" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            @error('password_confirmation')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" value=""
                                                class="form-control">
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
