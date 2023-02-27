@extends('layouts.app')
@section('title')
    Categories
@endsection
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>
                @forelse($categories as $key=>$item)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{url('/categories/'.$item->slug)}}">
                                <div class="category-card-img">
                                    <img src="{{ asset('admin/' . $item->image) }}" class="w-100" alt="{{ $item->name }}">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <h2>No Collection Available...!</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection