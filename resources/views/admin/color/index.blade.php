@extends('layouts.admin')
@section('page_name')
    Admin | Colors
@endsection
@section('content')
    <div>
        <div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
        
                <a href="{{ route('dashboard.colors.create') }}" class="btn btn-primary mt-2 mt-xl-0">Generate Color</a>
            </div>
            @if (session('status'))
                <h3 class="alert alert-success">{{ session('status') }}</h3>
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Color
                            </th>
                            <th>
                                name
                            </th>
                            <th>
                                status
                            </th>
                            <th>
                                Update
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                        <tbody>
                            @forelse ($colors as $item)
                                <tr>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->code }}
                                    </td>
                                    <td>
                                        {{ $item->status=='0'?'Hidden':'Visible' }}
                                    </td>
                                    <td>
                                        <a href="{{route('dashboard.colors.edit', $item->id) }}"
                                            class="btn btn-success btn-rounded btn-icon"><i class="fa fa-pen"></i></a>
                                    </td>
                                    <td>
                                            {!! Form::open([
                                                'route' => ['dashboard.colors.destroy', $item->id],
                                                'method' => 'delete',
                                                'class' => 'delete-form ',
                                                'onclick'=>"return confirm('Are You Sure, You Want To Delete This Product ')"
                                            ]) !!}
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon"><i
                                                    class="fa fa-trash"></i></button>
                                            {!! Form::close() !!}
                                        <!-- Button trigger modal -->
                                        {{-- <form action="{{route('dashboard.products.destroy',$item->id)}}" method="delete">
                                            <button type="submit" onclick="return confirm('Are You Sure, You Want To Delete This Product ')" class="btn btn-danger btn-rounded btn-icon" >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form> --}}
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No Colors Available</td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                    <div>{{$colors->links()}}</div>
                </div>
            </div>
   

    </div>
@endsection

@push('javascript')
<script>
        window.addEventListener('close-modal',event =>{
            $('#staticBackdrop').modal('hide');
        });
</script>
@endpush