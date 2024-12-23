@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Header Content</h4>
        </div>
    </div>
    <?php
        $headerLogo = \App\Models\HeaderContent::where('type','file')->Where('lang_code','en')->first();

        $lang_code = getCurrentLocale(); 
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
                                    <div class="form-group">
                                        <label class="form-label" for="image">Header Logo</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="header_logo[{{$headerLogo->id}}]"
                                                id="metaValue" value="{{ $headerLogo->value ?? ''}}">
                                        </div>
                                        @error('header_logo')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(!empty($headerLogo->meta_value) &&
                                        file_exists(public_path($headerLogo->meta_value)))
                                        <img src="{{ asset($headerLogo->meta_value) }}" alt="{{ $headerLogo->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @foreach($headerContents as $key=> $content)
                        @if($content->meta_key == 'header_logo')
                        <div class="card border">
                            <div class="card-header mt-3">
                                Header Search Placeholer Text
                            </div>
                            <div class="card-body">
                                @elseif($content->meta_key === 'header_search_placeholder')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Search Bar Placeholder Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="header_search_placeholder[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border">
                            <div class="card-header mt-3">
                                Header Auth Section
                            </div>
                            <div class="card-body">
                                @elseif($content->meta_key === 'login_btn_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Login Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="login_btn_lable[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'sign_up_btn_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sign Up Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="sign_up_btn_lable[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'sign_out_btn_lable')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Sign Out Button Lable</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="sign_out_btn_lable[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card border">
                            <div class="card-header mt-3">
                                Header Left Menu Section
                            </div>
                            <div class="card-body">
                                @elseif($content->meta_key === 'categories')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Categories Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="categories[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'exclusive')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Exclusive Deal Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="exclusive[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'top_rated_product')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Exclusive Deal Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="top_rated_product[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border">
                            <div class="card-header mt-3">
                                Header Right Menu Section
                            </div>
                            <div class="card-body">
                                @elseif($content->meta_key === 'expert_guide')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">Expert Guides Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="expert_guide[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                                @elseif($content->meta_key === 'help_center')
                                <div class="form-group col-lg-12">
                                    <label class="form-label" for="{{ $key }}">help Center Text</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control " id="{{ $key }}"
                                            name="help_center[{{ $content->id }}]"
                                            value="{{ $content->meta_value ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="addCategory btn btn-primary  text-center"><em
                                        class="icon ni ni-plus"></em><span>Update Content</span></button>
                            </div>
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