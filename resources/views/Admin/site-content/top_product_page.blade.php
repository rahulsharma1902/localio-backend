@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Top Product Content</h4>
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
    @if(isset($topProductContents))
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
                                Top Product Header Banner Section
                            </div>
                            <div class="card-body">
                                @foreach($topProductContents as $content)
                                @if($content->meta_key == 'top product banner image')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Header Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_header_image[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_header_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-3"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>

                                </div>
                                @elseif($content->meta_key == 'top product banner background image')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Background Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_background_image[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_background_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-3"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                                @elseif($content->meta_key == 'top product facebook icon')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Facebook Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_fb_icon[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_fb_icon')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-1"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                                @elseif($content->meta_key == 'top product pinterest icon')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Pinterest Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_pt_icon[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_pt_icon')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-1"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                                @elseif($content->meta_key == 'top product twitter icon')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Twitter Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_tw_icon[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_tw_icon')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-1"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                                @elseif($content->meta_key == 'top product copylink icon')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">CopyLink Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_cl_icon[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_cl_icon')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-1"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                                @elseif($content->meta_key == 'top product more icon')
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="image">More Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control"
                                                name="top_product_mr_icon[{{$content->id}}]" id="metaValue"
                                                value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('top_product_mr_icon')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($content->meta_value) &&
                                        file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" class="mt-1"
                                            alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="card border">
                            <div class="card-header mt-3">
                                Top Product Header Title Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'automotive')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Automotive</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'how_to_find_the_right_automotive_software')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">How to find text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'localio_provides_independent_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Localio Provides Independent Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'learn_more')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Learn More</label>
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
                        <div class="card border">
                            <div class="card-header mt-3">
                                Top Product Left Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'search_product_name')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Seach Product Placeholder</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'user_rating')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">User Rating</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    @elseif($key === 'price')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Price</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="card border">
                                <div class="card-header mt-3">
                                    Top Product Pricing Menu Section
                                </div>
                                <div class="card-body">
                                    @foreach($mergedData as $key=>$val)
                                    @if($key === 'pricing_optiosn')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Pricing Options</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($key === 'free')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Free</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($key === 'free_trial')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Free Trail</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($key === 'monthly_subscription')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Monthly Subscription</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($key === 'annual_subscription')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">Annual Subscription</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                                name="{{ $key }}" value="{{ $val ?? '' }}" />
                                            <div style="display:none;" class="spinner-border mt-2" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($key === 'one_time_licence')
                                    <div class="form-group col-lg-12">
                                        <label class="form-label" for="{{ $key }}">One Time Licence</label>
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