@extends('layouts.admin')
@section('page_name')
    Admin | Update Category
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Category</h4>
            {{ Form::model($category,['route' => ['dashboard.categories.update',$category->id], 'method' => 'PUT', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data']) }}
            {{-- <form class="forms-sample" method="POST" action="{{ route('dashboard.categories.store') }}"
                enctype="multipart/form-data"> --}}
            @csrf
            @method('PUT')
            <div class="form-group row">
                @error('name')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('name', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('name', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-group row">
                @error('slug')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('slug', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('slug', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-group row">
                @error('description')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('description', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::textarea('description', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-group row">
                @error('image')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('image', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-2"><img src="{{asset('admin/'.$category->image)}}" alt="" height="100px" width="100px"></div>
                <div class="col-sm-7">
                    <input type="file" class="form-control" name="image" placeholder="Location">
                    {{-- {{ Form::File('image', ['class' => 'file-upload-default']) }} --}}
                </div>
            </div>
            <h3>SEO Tags</h3>
            <div class="form-group row">
                @error('meta_title')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('meta_title', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('meta_title', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-group row">
                @error('meta_keywords')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('meta_keyword', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('meta_keyword', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-group row">
                @error('meta_description')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('meta_description', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::textarea('meta_description', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    {{ Form::checkbox('status',null,null, array_merge(['class' => 'form-check-input'])) }}
                    Status
                    <i class="input-helper"></i></label>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            {!! Form::close() !!}
            {{-- </form> --}}
        </div>
    </div>
@endsection
