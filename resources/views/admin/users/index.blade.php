@extends('layouts.admin')
@section('page_name')
    Admin | Users
@endsection
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap">
        
            <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary mt-2 mt-xl-0">Generate User</a>
        </div>
        @if (session('status'))
            <h3 class="alert alert-success">{{ session('status') }}</h3>
        @endif
        <hr/>
        <table class="table table-bordered table-striped">
            <thead>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Creation Date</th>
                <th>Action</th>
            </thead>
            <tbody>
                @forelse ($users as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><label class="badge bg-primary">{{$item->role_as=='1'?'Admin':'user'}}</label></td>
                    <td>{{$item->created_at->format('d-m-y')}}</td>
                    <td>
                        {!! Form::open([
                            'route' => ['dashboard.users.destroy', $item->id],
                            'method' => 'delete',
                            'class' => 'delete-form ',
                            'onclick'=>"return confirm('Are You Sure, You Want To Delete This Product ')"
                        ]) !!}
                        <button type="submit" class="btn btn-danger btn-rounded btn-icon"><i
                                class="fa fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>
                    <td><a href="{{route('dashboard.users.edit', $item->id) }}"
                        class="btn btn-success btn-rounded btn-icon"><i class="fa fa-pen"></i></a></td>
                </tr> 
                @empty 
                <tr>
                    <td><h1>No users Yet</h1></td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
@endsection