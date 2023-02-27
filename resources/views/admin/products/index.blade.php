@extends('layouts.admin')
@section('page_name')
    Admin | Product
@endsection
@section('content')
    <div>
        <livewire:admin.products.index />

    </div>
@endsection