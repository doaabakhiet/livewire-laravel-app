@section('page_name')
    Admin / Brands
@endsection
<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert">×</a>
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-between align-items-end flex-wrap">

        <a href="#" wire:click="resetInput()" class="btn btn-primary mt-2 mt-xl-0" data-bs-toggle="modal"
            data-bs-target="#addBrand">Generate
            Brand</a>
        <!-- Modal Add -->
        @include('livewire.admin.brand.modal-form')
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        name
                    </th>
                    <th>
                        Slug
                    </th>
                    <th>
                        Category
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
                @foreach ($brands as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->slug }}
                        </td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            {{ $item->status == '0' ? 'Hidden' : 'Visible' }}
                        </td>
                        <td>
                            <a href="#" wire:click="edit({{ $item->id }})" data-bs-toggle="modal"
                                data-bs-target="#updateBrand" class="btn btn-success btn-rounded btn-icon"><i
                                    class="fa fa-pen"></i></a>
                            @include('livewire.admin.brand.modal_form_update')
                        </td>
                        <td>


                            {{-- <!-- Button trigger modal --> --}}
                            <button type="button" wire:click="delete({{ $item->id }})"
                                class="btn btn-danger btn-rounded btn-icon" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="fa fa-trash"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade modal-delete" wire:ignore.self id="staticBackdrop"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div wire:loading class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                          </div>
                                        <div wire:loading.remove class="modal-body">
                                            Are You Sure to Delete this ....!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button wire:click.prevent="destroyBrand()" type="button"
                                                class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>{{ $brands->links() }}</div>
    </div>
</div>



@push('javascript')
    <script>
        window.addEventListener('modal-close', event => {
            $('#addBrand').modal('hide');
            $('#updateBrand').modal('hide');
        })
    </script>
@endpush
