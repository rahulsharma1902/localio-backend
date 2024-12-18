@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Header Content</h4>
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
    @if(isset($headerContents))
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/header-page-update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        @if($lang_code == 'en')
                        <div class="card border">
                            <div class="card-header mt-3">
                                Header Logo Section
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    @foreach($headerContents as $content)
                                    @if($content->meta_key == 'header logo')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Header Logo</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="header_logo[{{$content->id}}]"
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
                                Header Search Placeholer Text
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'header_page_search_placeholder')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Search Bar Placeholder Text</label>
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
                                Header Auth Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'login')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Login Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Login Button Link</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{ url('') }}/login" readonly>
                                        <a href="{{ url('') }}/login">Go to Login</a>
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'sign_up')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sign Up Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sign Up Button Link</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{ url('') }}/register" readonly>
                                        <a href="{{ url('') }}/register">Go to Sign Up</a>
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'sign_out')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sign Out Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sign Out Button Link</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{ url('') }}/logout" readonly>
                                        <a href="{{ url('') }}/logout">Go to Sign Out</a>
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
                                Header Left Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'categories')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Categories Text</label>
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
                                    <label class="form-label" for="{{ $key }}">Exclusive Deal Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control site_text_input" id="{{ $key }}"
                                            name="{{ $key }}" value="{{ $val ?? '' }}" />
                                        <div style="display:none;" class="spinner-border mt-2" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                @elseif($key === 'exclusive_deals_text')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Exclusive Deal Text</label>
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
                                Header Right Menu Section
                            </div>
                            <div class="card-body">
                                @foreach($mergedData as $key=>$val)
                                @if($key === 'expert_guides')
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
                                @elseif($key === 'help_center')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">help Center Text</label>
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