@extends('layouts.app')
@section('title')
    {{$category->meta_title}} | Products
@endsection
@section('meta_keywords')
    {{$category->meta_keywords}}
@endsection
@section('meta_description')
    {{$category->meta_description}}
@endsection
@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <livewire:frontent.product.index  :category="$category"/>
        </div>
    </div>
@endsection
