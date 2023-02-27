@extends('layouts.admin')
@section('page_name')
    Admin | Add Product
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Product</h4>
            {{ Form::model(null, ['route' => ['dashboard.products.store'], 'method' => 'POST', 'class' => 'forms-sample', 'enctype' => 'multipart/form-data']) }}
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false">Seo Tags</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#details" type="button"
                        role="tab" aria-controls="details" aria-selected="false">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#images" type="button"
                        role="tab" aria-controls="images" aria-selected="false">images</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#color" type="button"
                        role="tab" aria-controls="color" aria-selected="false">Color</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane p-5 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        @error('quantity')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('quantity', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {{ Form::number('quantity', null, array_merge(['class' => 'form-control'])) }}
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
                        @error('brand')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('brand', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {!! Form::select('brand', $brands->pluck('name', 'id')->toArray(), null, [
                                'class' => 'custom-select',
                                'placeholder' => 'Pick Brand',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        @error('category_id')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('category', null, ['class' => 'col-sm-3 col-form-label']) }}
                        {!! Form::select('category_id', $categories->pluck('name', 'id')->toArray(), null, [
                            'class' => 'custom-select',
                            'placeholder' => 'Pick Category',
                        ]) !!}
                    </div>
                </div>

                <div class="tab-pane fade p-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                        {{ Form::label('meta_keywords', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {{ Form::text('meta_keywords', null, array_merge(['class' => 'form-control'])) }}
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
                </div>

                <div class="tab-pane fade p-5" id="details" role="tabpanel" aria-labelledby="details-tab">
                    <div class="form-group row">
                        @error('original_price')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('original price', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {{ Form::text('original_price', null, array_merge(['class' => 'form-control'])) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        @error('selling_price')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('selling price', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {{ Form::text('selling_price', null, array_merge(['class' => 'form-control'])) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        @error('small_description')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('small_description', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            {{ Form::textarea('small_description', null, array_merge(['class' => 'form-control'])) }}
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
                    
        
                    <div class="form-check form-check-primary">
                        <label class="form-check-label">
                            {{ Form::checkbox('status', null,false, array_merge(['class' => 'form-check-input'])) }}
                            Status
                            <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check form-check-primary">
                        <label class="form-check-label">
                            {{ Form::checkbox('trending', null,false, array_merge(['class' => 'form-check-input'])) }}
                            trending
                            <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check form-check-primary">
                        <label class="form-check-label">
                            {{ Form::checkbox('featured', null,false, array_merge(['class' => 'form-check-input'])) }}
                            featured
                            <i class="input-helper"></i></label>
                    </div>
                </div>

                <div class="tab-pane fade p-5" id="images" role="tabpanel" aria-labelledby="images-tab">
                    <div class="form-group row">
                        @error('image')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        {{ Form::label('image', null, ['class' => 'col-sm-3 col-form-label']) }}
                        <div class="col-sm-9">
                            <input type="file" multiple class="form-control" name="image[]" placeholder="Location">
                            {{-- {{ Form::File('image', ['class' => 'file-upload-default']) }} --}}
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade p-5" id="color" role="tabpanel" aria-labelledby="color-tab">
                    @forelse($colors as $color)
                        <div class="col-md-3">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">color:
                                    {{ Form::checkbox('color[ ]',$color->id,false, array_merge(['class' => 'form-check-input'])) }}
                                    {{$color->name}}
                                    <i class="input-helper"></i></label>
                                    <br/> qty: {{ Form::number('color_quantity[]',0, array_merge(['class' => 'form-control','style'=>"width:100px;border:1px solid rgb(51, 126, 187);"])) }}
                            </div>
                        </div>
                    @empty
                        <h3>No Colors</h3>
                    @endforelse
                </div>
            </div>

           

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            {!! Form::close() !!}
            {{-- </form> --}}
        </div>
    </div>
@endsection
