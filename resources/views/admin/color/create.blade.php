@extends('layouts.admin')
@section('page_name')
    Admin | Add Color
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Color</h4>
            {{ Form::model(null,['route' => ['dashboard.colors.store'], 'method' => 'POST', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data']) }}
            @csrf
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
                @error('code')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('code', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('code', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
     
        
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    {{ Form::checkbox('status','1', array_merge(['class' => 'form-check-input','style'=>'height:40px;width:40px;'])) }}
                    Status
                    <i class="input-helper"></i></label>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            {!! Form::close() !!}
            {{-- </form> --}}
        </div>
    </div>
@endsection
