@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Update Site Language</h4>
            </div>
            <div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ route('country.updateProcc') }}" class="form-validate" novalidate="novalidate" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $countryid->id }}" id="id">
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
                                        value="{{ old('name', $countryid->name) }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
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
        $(document).ready(function() {
            // Update the slug field based on the name field
            $('#name').on('input', function() {
                let name = $(this).val().toLowerCase();
                let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
                $('#slug').val(slug);
            });

            // Slug input: sanitize spaces and slashes
            $('#slug').on('change', function() {
                this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
            });

            // Handle input: Allow only alphanumeric characters and dashes
            $('#handle').on('input', function() {
                var value = $(this).val();
                var validValue = value.replace(/[^a-zA-Z0-9-]/g, ''); // Allow only alphanumeric and dash
                $(this).val(validValue);
            });
        });
    </script>
@endsection
