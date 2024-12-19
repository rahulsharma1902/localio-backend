@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Category Content</h4>
        </div>
    </div>
    <?php
        $lang_code = getCurrentLocale(); 
        $languagePath = resource_path("lang/{$lang_code}/home.php"); 
        $defaultLanguagePath = resource_path('lang/en/home.php');


        if (file_exists($languagePath)) {

            $homeData = include($languagePath);
        } else {

            $homeData = include($defaultLanguagePath);
        }

        $defaultData = include($defaultLanguagePath);

        $mergedData = array_merge($defaultData, $homeData);
    ?>
    @if(isset($categoryPageContents))
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/category-page-update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        @if($lang_code == 'en')
                        <div class="card border">
                            <div class="card-header mt-3">
                               Category Header Banner Section
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @foreach($categoryPageContents as $content)
                                    @if($content->meta_key == 'header image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Header Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="category_header_image[{{$content->id}}]"
                                                id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('category_header_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="col-md-12">
                                    @foreach($categoryPageContents as $content)
                                    @if($content->meta_key == 'header background image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Background Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="category_background_image[{{$content->id}}]"
                                                id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('category_background_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="card border">
                            <div class="card-header mt-3">
                                Category Heading Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'browse_our_software_categories')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Heading</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'find_your_software_in_one')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sub Heading</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'category_page_search_placeholder')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Search Placeholder text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'what_type_of_software')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Category Page Heading</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="addCategory btn btn-primary  text-center"><em
                                        class="icon ni ni-plus"></em><span>Update Content</span></button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
$(document).ready(function() {
    $(".site_text_input").on('keyup', function(e) {
        e.preventDefault();
        var buttonElement = $('<button>', {
            'text': 'save',
            'class': 'btn btn-primary mt-2 save_btn'
        });
        thisObj = $(this);
        // console.log(thisObj.next('button').length < 1);
        if (thisObj.next('button').length < 1) {
            thisObj.after(buttonElement);
        }
    });
    $(document).on('click', '.save_btn', function(e) {
        e.preventDefault();
        btnObj = $(this);
        let textVal = btnObj.siblings('.site_text_input').val();
        let textID = btnObj.siblings('.site_text_input').attr('id');
        btnObj.siblings('.spinner-border').show();
        btnObj.hide();
        $.ajax({
            url: '{{ url("/admin-dashboard/update-lang-file") }}',
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                data: {
                    'textVal': textVal,
                    'textID': textID,
                }
            },
            success: function(response) {

                btnObj.siblings('.spinner-border').hide();
                btnObj.remove();
            }
        });
    });
});
</script>

@endsection