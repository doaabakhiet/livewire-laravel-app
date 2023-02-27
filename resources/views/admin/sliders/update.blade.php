@extends('layouts.admin')
@section('page_name')
    Admin | Add Sliders
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Slider</h4>
            {{ Form::model($slider,['route' => ['dashboard.sliders.update',$slider], 'method' => 'POST', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data']) }}
            @csrf
            @method('PUT')
            <div class="form-group row">
                @error('title')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('title', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
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
                <div class="col-sm-3">
                    <img src="{{asset('admin/'. $slider->image) }}" height="70px" width="70px" alt="">
                </div>
                <div class="col-sm-6">
                    <input type="file" multiple class="form-control" name="image" placeholder="Location">
                </div>
            </div>
        
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    {{ Form::checkbox('status','1',array_merge(['class' => 'form-check-input','style'=>'height:40px;width:40px;'])) }}
                    Status
                    <i class="input-helper"></i></label>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            {!! Form::close() !!}
            {{-- </form> --}}
        </div>
    </div>
@endsection
