@extends('layouts.app')
@section('title')
    {{$product->meta_title}} | Products
@endsection
@section('meta_keywords')
    {{$product->meta_keywords}}
@endsection
@section('meta_description')
    {{$product->meta_description}}
@endsection
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
        <h3>Product View Page</h3>
        <livewire:frontent.product.product-view  :product="$product" :category="$category"/>
        </div>
    </div>
@endsection