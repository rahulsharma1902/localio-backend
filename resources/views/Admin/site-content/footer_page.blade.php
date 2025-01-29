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
        ?>
        @if (isset($footerContents))
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-block">
                        <form action="{{ url('admin-dashboard/footer-page-update') ?? '' }}" class="form-validate"
                            novalidate="novalidate" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                @if ($lang_code == 'en-us')
                                    <div class="card border">
                                        <div class="card-header mt-3">
                                            Footer Logo Section
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                @if ($footerLogo->meta_key == 'footer_logo')
                                                    <div class="form-group">
                                                        <label class="form-label" for="image">Footer Logo</label>
                                                        <div class="dz-message">
                                                            <input type="file" class="form-control"
                                                                name="footer_logo[{{ $footerLogo->id }}]" id="metaValue"
                                                                value="{{ $footerLogo->meta_value ?? '' }}">
                                                        </div>
                                                        @error('header_logo')
                                                            <div class="error text-danger">{{ $message }}</div>
                                                        @enderror
                                                        @if (!empty($footerLogo->meta_value) && file_exists(public_path($footerLogo->meta_value)))
                                                            <img src="{{ asset($footerLogo->meta_value) }}"
                                                                alt="{{ $footerLogo->meta_key }}"
                                                                style="width: 100px; height: auto;">
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="card border">
                                    <div class="card-header mt-3">
                                        Footer Descover Menu Section
                                    </div>
                                    <div class="card-body">
                                        @foreach ($footerContents as $key => $val)
                                            @if ($val->meta_key === 'discover')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Descover
                                                        Text</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="discover[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'categories')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Categories</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="categories[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'top_rated_product')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Top Rated
                                                        Product</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="top_rated_product[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'exclusive_deal')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Expert
                                                        Guides</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="exclusive_deal[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
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
                                        @foreach ($footerContents as $key => $val)
                                            @if ($val->meta_key === 'company')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Company</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="company[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'who_we_are')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Who We Are</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="who_we_are[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'privacy_policy')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Privacy
                                                        Policy</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="{{ $key }}"
                                                            name="privacy_policy[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'terms_and_conditions')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Terms and
                                                        Conditions</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="terms_and_conditions[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
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
                                        @foreach ($footerContents as $key => $val)
                                            @if ($val->meta_key === 'vendors')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Vendors </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}" name="vendors[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'get_listed')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Get
                                                        Listed</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="get_listed[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'vendor_login')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Vendor
                                                        Login</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="vendor_login[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
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
                                        @foreach ($footerContents as $key => $val)
                                            @if ($val->meta_key === 'help')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Help</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}" name="help[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'expert_guides')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Expert
                                                        Guides</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="expert_guides[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'help_center')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">help
                                                        Center</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="help_center[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'contact')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Contact</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}" name="contact[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
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
                                        @foreach ($footerContents as $key => $val)
                                            @if ($val->meta_key === 'follow_us')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Follow Us
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="follow_us[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        @if ($lang_code === 'en-us')
                                            @foreach ($footerFiles as $key => $file)
                                                @if ($file->meta_key == 'facebook_icon')
                                                    <div class="form-group">
                                                        <label class="form-label" for="image">Facebook Icon</label>
                                                        <div class="dz-message">
                                                            <input type="file" class="form-control"
                                                                name="facebook_icon[{{ $file->id }}]" id="metaValue"
                                                                value="{{ $file->meta_value ?? '' }}">
                                                        </div>
                                                        @error('facebook_icon')
                                                            <div class="error text-danger">{{ $message }}</div>
                                                        @enderror
                                                        @if (!empty($file->meta_value) && file_exists(public_path($file->meta_value)))
                                                            <img class="icon mt-3" src="{{ asset($file->meta_value) }}"
                                                                alt="{{ $file->meta_key }}"
                                                                style="width: 100px; height: 50px;">
                                                        @endif
                                                    </div>
                                                @elseif($file->meta_key == 'facebook_url')
                                                    <div class="form-group col-lg-12">
                                                        <label class="form-label" for="{{ $key }}">Facebook
                                                            Url</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                id="{{ $key }}"
                                                                name="facebook_url[{{ $file->id }}]"
                                                                value="{{ $file->meta_value ?? '' }}" />
                                                        </div>
                                                    </div>
                                                @elseif($file->meta_key === 'instagram_icon')
                                                    <div class="form-group">
                                                        <label class="form-label" for="image">Instagram Icon</label>
                                                        <div class="dz-message">
                                                            <input type="file" class="form-control"
                                                                name="instagram_icon[{{ $file->id }}]" id="metaValue"
                                                                value="{{ $file->meta_value ?? '' }}">
                                                        </div>
                                                        @error('instagram_icon')
                                                            <div class="error text-danger">{{ $message }}</div>
                                                        @enderror
                                                        @if (!empty($file->meta_value) && file_exists(public_path($file->meta_value)))
                                                            <img class="icon mt-3" src="{{ asset($file->meta_value) }}"
                                                                alt="{{ $file->meta_key }}"
                                                                style="width: 100px; height: 50px;">
                                                        @endif
                                                    </div>
                                                @elseif($file->meta_key === 'instagram_url')
                                                    <div class="form-group col-lg-12">
                                                        <label class="form-label" for="{{ $key }}">Instagram
                                                            Url</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                id="{{ $key }}"
                                                                name="instagram_url[{{ $val->id }}]"
                                                                value="{{ $file->meta_value ?? '' }}" />
                                                        </div>
                                                    </div>
                                                @elseif($file->meta_key === 'twitter_icon')
                                                    <div class="form-group">
                                                        <label class="form-label" for="image">Twitter Icon</label>
                                                        <div class="dz-message">
                                                            <input type="file" class="form-control"
                                                                name="twitter_icon[{{ $file->id }}]" id="metaValue"
                                                                value="{{ $file->meta_value ?? '' }}">
                                                        </div>
                                                        @error('twitter_icon')
                                                            <div class="error text-danger">{{ $message }}</div>
                                                        @enderror
                                                        @if (!empty($file->meta_value) && file_exists(public_path($file->meta_value)))
                                                            <img class="icon mt-3" src="{{ asset($file->meta_value) }}"
                                                                alt="{{ $file->meta_key }}"
                                                                style="width: 100px; height: 50px;">
                                                        @endif
                                                    </div>
                                                @elseif($file->meta_key === 'twitter_url')
                                                    <div class="form-group col-lg-12">
                                                        <label class="form-label" for="{{ $key }}">Twitter
                                                            Url</label>
                                                        <div class="dz-message">
                                                            <input type="text" class="form-control"
                                                                name="twitter_url[{{ $file->id }}]" id="metaValue"
                                                                value="{{ $file->meta_value ?? '' }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        @foreach ($footerContents as $key => $val)
                                            @if ($val->meta_key === 'facebook')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Facebook </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="facebook[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'instagram')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Instagram
                                                    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="instagram[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @elseif($val->meta_key === 'twitter')
                                                <div class="form-group col-lg-12">
                                                    <label class="form-label" for="{{ $key }}">Twitter </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control"
                                                            id="{{ $key }}"
                                                            name="twitter[{{ $val->id }}]"
                                                            value="{{ $val->meta_value ?? '' }}" />
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <button class="addCategory btn btn-primary btn-localio  text-center"><em
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
                    url: '{{ url('/admin-dashboard/update-lang-file') }}',
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
