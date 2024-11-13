@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Update Filter and Options : {{ $languageRole ?? '' }}</h4>   
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <form action="{{ url('admin-dashboard/update-filter/updateProcc') }}" class="form-validate" novalidate="novalidate" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-gs">
                    <!-- Name Field -->
                     @if($languageRole === 'global')
                        <input type="hidden" name="id" value="{{ $filter->id ?? '' }}" />
                     @else
                        <input type="hidden" name="id" value="{{ $filter->translations->first()->id ?? '' }} " />
                        <input type="hidden" name="filter_id" value="{{ $filter->id ?? '' }}" />
                     @endif
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <sup>
                                @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $filter->translations->isNotEmpty() ? $filter->translations->first()->name : $filter->name) }}" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ old('slug', $filter->translations->isNotEmpty() ? $filter->translations->first()->slug : $filter->slug) }}" />
                    @if( $filter->translations->first()->language_id ?? '' )
                        <input type="hidden" class="form-control" id="language_id" name="language_id" value="{{  $filter->translations->first()->language_id ?? '' }}" />
                    @else
                        <input type="hidden" class="form-control" id="handle" name="handle" value="{{ Cookie::get('language_code', config('app.locale')) }}" />
                    @endif
                    <!-- Categories Selection -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Categories</label>
                            <sup>
                                @error('category_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" name="category_id" data-search="on"  @if($languageRole !== 'global') disabled @endif>
                                    <option disabled selected>Default Option</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id ?? ''}}" {{ old('category_id', $filter->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $filter->category->translations->isNotEmpty() ? $filter->category->translations->first()->name : $filter->category->name }}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Options Field -->
                    <div class="col-md-12">
                        <label class="form-label">Options</label>
                        <div id="options-container">
                            @foreach ($filter->options as $key => $option)
                                <div class="form-group row option-group mt-2">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <input type="text" name="options[{{ $option->id }}]" class="form-control" placeholder="Enter option" value="{{ old('options.$option->id', $option->translations->isNotEmpty() ? $option->translations->first()->name : $option->name) }}">
                                        @error("options.$option->id")
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                                        @if($languageRole === 'global')
                                            <button type="button" class="btn btn-danger remove-option"><em class="icon ni ni-trash-fill"></em></button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($languageRole === 'global')
                        <button type="button" id="add-option" class="btn btn-primary mt-3">Add More Options</button>
                        @endif
                        <sup>
                            @error('options')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </sup>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
$(document).ready(function(){
    // Update the slug field based on the name field
    $('#name').on('input', function(){
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
        $('#slug').val(slug);
    });

    // Add dynamic option fields
    $('#add-option').click(function() {
        $('#options-container').append(`
            <div class="form-group row option-group mt-2">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" name="new_options[]" class="form-control" placeholder="Enter option">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-option"><em class="icon ni ni-trash-fill"></em></button>
                </div>
            </div>
        `);
    });

    // Remove option field, ensuring at least one remains
    $('#options-container').on('click', '.remove-option', function() {
        if ($('.option-group').length > 1) {
            $(this).closest('.option-group').remove();
        }
    });
});
</script>
@endsection
