@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Footer Content</h4>
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
    @if(isset($footerContents))
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/footer-page-update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        @if($lang_code == 'en')
                        <div class="card border">
                            <div class="card-header mt-3">
                                Footer Logo Section
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @foreach($footerContents as $content)
                                    @if($content->meta_key == 'footer logo')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Footer Logo</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="footer_logo[{{$content->id}}]"
                                                id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('header_logo')
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
                                Footer Descover Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'discover')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Descover Text</label>
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
                                @if($key === 'categories')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Categories</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'top_rated_product')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Top Rated Product</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'expert_guides')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Expert Guides</label>
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
                                Footer Company Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'company')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Company</label>
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
                                @if($key === 'who_we_are')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Who We Are</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'privacy_policy')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Privacy Policy</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'terms_and_conditions')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Terms and Conditions</label>
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
                                Footer Vendors Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'vendors')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Vendors </label>
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
                                @if($key === 'get_listed')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Get Listed</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'vendor_login')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Vendor Login</label>
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
                                Footer Help Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'help')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Expert Guides Text</label>
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
                                @if($key === 'expert_guides')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Expert Guides</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'help_center')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">help Center</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'contact')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Contact</label>
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
                                Footer Follow Us Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'follow_us')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Follow Us </label>
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
                                @if($lang_code === 'en')
                                @foreach($footerContents as $content)
                                @if($content->meta_key == 'facebook icon')
                                <div class="form-group">
                                    <label class="form-label" for="image">Facebook Icon</label>
                                    <div class="dz-message">
                                        <input type="file" class="form-control" name="facebook_icon[{{$content->id}}]"
                                            id="metaValue" value="{{ $content->value ?? ''}}">
                                    </div>
                                    @error('instagram_icon')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(!empty($content->meta_value) &&
                                    file_exists(public_path($content->meta_value)))
                                    <img  class="icon mt-3" src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                    style="width: 100px; height: 50px;">
                                    @endif
                                </div>
                                @elseif($content->meta_key == 'facebook url')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Facebook Url</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{$content->meta_value}}" readonly>
                                        <a href="{{$content->meta_value}}" target="blank">Go to Login </a>
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'instagram logo')
                                <div class="form-group">
                                    <label class="form-label" for="image">Instagram Icon</label>
                                    <div class="dz-message">
                                        <input type="file" class="form-control" name="instagram_icon[{{$content->id}}]"
                                            id="metaValue" value="{{ $content->value ?? ''}}">
                                    </div>
                                    @error('instagram_icon')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(!empty($content->meta_value) &&
                                    file_exists(public_path($content->meta_value)))
                                    <img class="icon mt-3"  src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                        style="width: 100px; height: 50px;">
                                    @endif
                                </div>
                                @elseif($content->meta_key === 'instagram url')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Instagram Url</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{$content->meta_value}}" readonly>
                                        <a href="{{$content->meta_value}}" target="blank">Go to Login </a>
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'twitter logo')
                                <div class="form-group">
                                    <label class="form-label" for="image">Twitter Icon</label>
                                    <div class="dz-message">
                                        <input type="file" class="form-control" name="twitter_icon[{{$content->id}}]"
                                            id="metaValue" value="{{ $content->value ?? ''}}">
                                    </div>
                                    @error('twitter_icon')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    @if(!empty($content->meta_value) &&
                                    file_exists(public_path($content->meta_value)))
                                    <img class="icon mt-3" src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                    style="width: 100px; height: 50px;">
                                    @endif
                                </div>
                                @elseif($content->meta_key === 'twitter url')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Twitter Url</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{$content->meta_value}}" readonly>
                                        <a href="{{$content->meta_value}}" target="blank">Go to Login </a>
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                
                                @endif
                                @endforeach
                                @endif
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'facebook')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Facebook </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'instagram')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Instagram </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'twitter')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Twitter </label>
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