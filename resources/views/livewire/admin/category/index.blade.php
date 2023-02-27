<div>
    <div class="d-flex justify-content-between align-items-end flex-wrap">

        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary mt-2 mt-xl-0">Generate Category</a>
    </div>
    @if (session('status'))
        <h3 class="alert alert-success">{{ session('status') }}</h3>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Category
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
                        Update
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td class="py-1">
                            <img src="{{ asset('admin/' . $item->image) }}" alt="image">
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
                            <a href="{{ Route('dashboard.categories.edit', $item) }}"
                                class="btn btn-success btn-rounded btn-icon"><i class="fa fa-pen"></i></a>
                            &nbsp;
                        </td>
                        <td>
                       

                            <!-- Button trigger modal -->
                            <button type="button" wire:click="delete({{$item->id}})" class="btn btn-danger btn-rounded btn-icon" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fa fa-trash"></i>
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade modal-delete" wire:ignore.self id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Are You Sure to Delete this ....!
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form wire:submit.prevent="destroy()">
                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" >Delete</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{$category->links()}}</div>
    </div>
</div>
@push('javascript')
    <script>
            window.addEventListener('close-modal',event =>{
                $('#staticBackdrop').modal('hide');
            });
    </script>
@endpush