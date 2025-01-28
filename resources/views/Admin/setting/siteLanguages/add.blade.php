@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Add Site Language</h4>
            </div>
            <div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ url('admin-dashboard/site-languages/addProcc') }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
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

                        <!-- Slug Field -->
                        <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="slug">Slug</label>
                                            <sup>
                                                @error('slug')
        <div class="error text-danger">{{ $message }}</div>
    @enderror
                                            </sup>
                                            <div class="form-control-wrap"> -->
                        <input type="hidden" class="form-control" id="slug" name="slug"
                            value="{{ old('slug') }}" />
                        <!-- </div>
                                        </div>
                                    </div> -->

                        <!-- handle Field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="handle">Handle Name</label>
                                <sup>
                                    @error('handle')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="handle" name="handle"
                                        value="{{ old('handle') }}" />
                                </div>
                            </div>
                        </div>
                        <!-- Country Selection -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <sup>
                                    @error('country_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="country_id" data-search="on">
                                        <option disabled selected>Default Option</option>
                                        @if ($countries)
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary btn-localio">Save</button>
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
                let slug = name.replace(/\s+/g, "-");
                slug = slug.replace(/\//g, "-");
                $('#slug').val(slug);
            });

            // Slug input: sanitize spaces and slashes
            $('#slug').on('change', function() {
                this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
            });

            // Handel input: Allow only alphanumeric characters and dashes
            $('#handel').on('input', function() {
                var value = $(this).val();
                var validValue = value.replace(/[^a-zA-Z0-9-]/g, ''); // Allow only alphanumeric and dash
                $(this).val(validValue);
            });
        });
    </script>
@endsection
