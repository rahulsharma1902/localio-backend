@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Add Filter and Options</h4>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ url('admin-dashboard/filter/addProcc') }}" class="form-validate" novalidate="novalidate"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-gs">
                        <!-- Name Field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <sup>
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" />
                                </div>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="slug" name="slug"
                            value="{{ old('slug') }}" />

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
                                    <select class="form-select js-select2" name="category_id" data-search="on">
                                        <option disabled selected>Default Option</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Options Field -->
                        <div class="col-md-12">
                            <label class="form-label">Options</label>
                            <div id="options-container">
                                @if (old('options'))
                                    @foreach (old('options') as $key => $option)
                                        <div class="form-group row option-group mt-2">
                                            <div class="col-lg-10 col-md-10 col-sm-10">
                                                <input type="text" name="options[]" class="form-control"
                                                    placeholder="Enter option" value="{{ $option }}">
                                                @error("options.$key")
                                                    <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                                                <button type="button" class="btn btn-danger remove-option"><em
                                                        class="icon ni ni-trash-fill"></em></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="form-group row option-group">
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                            <input type="text" name="options[]" class="form-control"
                                                placeholder="Enter option">
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                                            <button type="button" class="btn btn-danger remove-option"><em
                                                    class="icon ni ni-trash-fill"></em></button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="add-option" class="btn btn-primary btn-localio mt-3">Add More
                                Options</button>
                            <sup>
                                @error('options')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </sup>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $(document).ready(function() {
            // Update the slug field based on the name field
            $('#name').on('input', function() {
                let name = $(this).val().toLowerCase();
                let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
                $('#slug').val(slug);
            });

            // Add dynamic option fields
            $('#add-option').click(function() {
                $('#options-container').append(`
            <div class="form-group row option-group mt-2">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" name="options[]" class="form-control" placeholder="Enter option">
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
