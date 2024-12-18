@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Home Content</h4>
        </div>
    </div>
    @php
    $homeContents = \App\Models\HomeContent::where('lang_code','en')->get();
    @endphp
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
    @if(isset($homeContents))
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/home-page-update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Home Banner Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'home_page_heading')
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
                                @elseif($key === 'home_page_header_description')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Description</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'home_page_search_placeholder')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Home Page Search Placeholder</label>
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
                                @if($lang_code == 'en')
                                <div class="col-md-12">

                                    @foreach($homeContents as $content)
                                    @if($content->meta_key == 'header image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Header Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="header_image[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('header_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(isset($content->meta_key))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                    @elseif($content->meta_key == 'header background image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Header Background Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="header_backgound_image[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('header_backgound_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(isset($content->meta_key))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Trusted Brands Section
                            </div>
                            <div class="card-body">

                                @if($lang_code == 'en')
                                @foreach($homeContents as $content)
                                @if($content->meta_key == 'trusted brands image')
                                <div class="form-group">
                                    <label class="form-label" for="image">Trusted brand images</label>
                                    <div class="dz-message">
                                        <!-- Allow multiple file uploads -->
                                        <input type="file" class="form-control" name="brand_image[{{$content->id}}][]"
                                            id="metaValue" value="{{ $content->meta_value ?? '' }}" multiple>
                                    </div>
                                    @error('brand_image')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(isset($content->meta_value) && !empty($content->meta_value))
                                    @php
                                    $imageIds = json_decode($content->meta_value);
                                    @endphp
                                    @if(is_array($imageIds))
                                    @foreach($imageIds as $imageId)
                                    @php
                                    $media = \App\Models\HomeContentMedia::find($imageId); // Retrieve image by ID
                                    @endphp
                                    @if($media)
                                    <img src="{{ asset($media->file_path) }}" alt="{{ $content->meta_key }}"
                                        style="width: 100px; height: auto;">
                                    @endif
                                    @endforeach
                                    @else
                                    <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                        style="width: 100px; height: auto;">

                                    @endif
                                    @endif

                                </div>
                                @endif
                                @endforeach
                                @endif
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'trusted_brands_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Trusted Brnads Text</label>
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
                    </div>
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Most Popular Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key => $val)
                                @if($key === 'most_popular_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Most Popular text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'compare_business_software')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Compare Software Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'visit_website')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Visit Website Text</label>
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
                    </div>
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Exclusive deals
                                Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key => $val)
                                @if($key === 'exclusive_deals_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Exclusive Deals Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'all_exclusive_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">All Exclusive Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'get_deal_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Get Deal Lable</label>
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
                    </div>
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                AI Search Section
                            </div>
                            <div class="card-body">
                                @if($lang_code == 'en')
                                @foreach($homeContents as $content)
                                @if($content->meta_key == 'ai section left image')
                                <div class="form-group">

                                    <label class="form-label" for="image">Ai Section Left Image</label>
                                    <div class="dz-message">
                                        <input type="file" class="form-control" name="ai_left_image[{{$content->id}}]"
                                            id="metaValue" value="{{ $content->value ?? ''}}">
                                    </div>
                                    @error('ai_left_image')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror

                                    @if(isset($content->meta_key))
                                    <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                        style="width: 100px; height: auto;">
                                    @endif
                                </div>
                                @elseif($content->meta_key == 'ai section right image')
                                <div class="form-group">

                                    <label class="form-label" for="image">Ai Section Right Image</label>
                                    <div class="dz-message">
                                        <input type="file" class="form-control" name="ai_right_image[{{$content->id}}]"
                                            id="metaValue" value="{{ $content->value ?? ''}}">
                                    </div>
                                    @error('ai_right_image')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror

                                    @if(isset($content->meta_key))
                                    <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                        style="width: 100px; height: auto;">
                                    @endif
                                </div>
                                @endif
                                @endforeach

                                @endif
                                @foreach($mergedData as $key => $val)
                                @if($key === 'ai_search_title')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">AI Search Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'ai_search_description')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">AI Search Description</label>
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
                    </div>

                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Top Product Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key => $val)
                                @if($key === 'top_product_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Top Product Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'all_product_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">All Product Lable</label>
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
                    </div>
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Latest Review Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key => $val)
                                @if($key === 'latest_reviews_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Latest Reviews Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'write_review_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Write Review Lable</label>
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
                    </div>
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Read Article Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key => $val)
                                @if($key === 'read_article_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Read Article Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'view_article_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">View Article Lable</label>
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
                    </div>
                    @if($lang_code == 'en')
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header mt-3">
                                Find Right Tool Section
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @foreach($homeContents as $content)
                                    @if($content->meta_key == 'find tool left image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Find Tool Section Left Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="find_tool_left_image[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('find_tool_left_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(isset($content->meta_key))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                    @elseif($content->meta_key == 'find tool right image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Find Tool Section Right Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="find_tool_right_image[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('find_tool_right_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(isset($content->meta_key))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                    @foreach($mergedData as $key => $val)
                                    @if($key === 'find_tool_text')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Find Tool Text</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($key === 'get_button_lable')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Get Button Lable</label>
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
                        </div>
                        @endif
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