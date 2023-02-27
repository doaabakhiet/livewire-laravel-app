@extends('layouts.admin')
@section('page_name')
    Admin | Add User
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add User</h4>
            {{ Form::model($user,['route' => ['dashboard.users.update',$user], 'method' => 'POST', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data']) }}
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
                @error('email')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('email', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('email', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
            <div class="form-group row">
                @error('password')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                {{ Form::label('password', null, ['class' => 'col-sm-3 col-form-label']) }}
                <div class="col-sm-9">
                    {{ Form::text('password', null, array_merge(['class' => 'form-control'])) }}
                </div>
            </div>
     
        
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    {{ Form::checkbox('role_as',null,null, array_merge(['class' => 'form-check-input','style'=>'height:40px;width:40px;'])) }}
                    Is Admin
                    <i class="input-helper"></i></label>
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            {!! Form::close() !!}
            {{-- </form> --}}
        </div>
    </div>
@endsection
