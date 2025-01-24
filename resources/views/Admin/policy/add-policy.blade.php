@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Policy</h4>   
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/policy-add') ?? '' }}" class="form-validate" novalidate="novalidate" method="post">
                @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{ isset($policy) ? $policy->id : '' }}">
                            <div class="form-group">
                                <label class="form-label" for="name">Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title', isset($policiesTranslation) ? $policiesTranslation->title : ($policy->title ?? '')) }}">

                                </div>
                                @error('title')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="description" id="description" rows="4" cols="50">{{ strip_tags(old('description', isset($policiesTranslation) ? $policiesTranslation->description : ($policy->description ?? ''))) }}
                                    </textarea>
                                </div>
                                @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if($policiesTranslation->language ?? '')
                            <input type="hidden" name="handle" value="{{ $policiesTranslation->language->handle ?? '' }}">
                        @else
                            <input type="hidden" class="form-control" id="language_id" name="handle" value="{{ Cookie::get('language_code', config('app.locale')) }}" />
                        @endif
                        <input type="hidden" name="policy_tr_id" value="{{ $policiesTranslation->id ?? '' }}">
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button class="addCategory btn btn-primary btn-localio text-center"><em class="icon ni ni-plus"></em><span>Add Policy</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<!-- <script>
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
</script> -->
@endsection
