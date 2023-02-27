<div wire:ignore.self class="modal fade " id="addBrand" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{ Form::model(null, ['wire:submit.prevent' => 'storeBrand()', 'class' => 'forms-sample']) }}
                        {{-- @csrf --}}

                        <div class="form-group row">
                            @error('name')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            {{ Form::label('name', null, ['class' => 'col-sm-3 col-form-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('name', null, array_merge(['wire:model.defer'=>'name','class' => 'form-control'])) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            @error('slug')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                            {{ Form::label('slug', null, ['class' => 'col-sm-3 col-form-label']) }}
                            <div class="col-sm-9">
                                {{ Form::text('slug', null, array_merge(['wire:model.defer'=>'slug','class' => 'form-control'])) }}
                            </div>
                        </div>

                        <div class="form-group">
                            @error('category_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        {{-- <input type="text" name="category_id" value="" id=""> --}}

                            {{-- {{ Form::label('category', null, ['class' => 'col-sm-3 col-form-label']) }} --}}
                            {!! Form::select('category_id', $categories->pluck('name', 'id')->toArray(), null,[
                                'wire:model.defer'=>'category_id',
                                'class' => 'form-control',
                                'placeholder' => 'Pick Category',
                            ]) !!}
                        </div>

                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                {{-- <input type="checkbox" wire:model.defer='status' class='form-control'> --}}
                                {{ Form::checkbox('status', '1',false, array_merge(['wire:model.defer'=>'status','class' => 'form-check-input'])) }}
                                Status
                                <i class="input-helper"></i></label>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>