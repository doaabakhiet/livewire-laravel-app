<div>
    <div class="d-flex justify-content-between align-items-end flex-wrap">

        <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary mt-2 mt-xl-0">Generate Product</a>
    </div>
    @if (session('status'))
        <h3 class="alert alert-success">{{ session('status') }}</h3>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Product
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        status
                    </th>
                    <th>
                        category
                    </th>
                    <th>
                        brand
                    </th>
                    <th>
                        Update
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>
                <tbody>
                    @forelse ($products as $item)
                        <tr>
                            <td class="py-1">
                                <img src="{{ asset($item->image) }}" alt="image">
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->slug }}
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td>
                                {{ $item->status=='0'?'Hidden':'Visible' }}
                            </td>
                            <td>
                                {{ $item->category->name}}
                            </td>
                            <td>
                                {{ $item->brand }}
                            </td>
                            <td>
                                <a href="{{route('dashboard.products.edit', $item) }}"
                                    class="btn btn-success btn-rounded btn-icon"><i class="fa fa-pen"></i></a>
                            </td>
                            <td>
                                    {!! Form::open([
                                        'route' => ['dashboard.products.destroy', $item->id],
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
                            <td>No Products Available</td>
                        </tr>
                    @endforelse 
                </tbody>
            </table>
            <div>{{$products->links()}}</div>
        </div>
    </div>
    @push('javascript')
        <script>
                window.addEventListener('close-modal',event =>{
                    $('#staticBackdrop').modal('hide');
                });
        </script>
    @endpush