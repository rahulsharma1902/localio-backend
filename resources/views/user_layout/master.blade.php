<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
        integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- dashicon link //////////////////////////////// -->

    <link data-minify="1" rel='stylesheet' id='dashicons-css'
        href='https://documentos-legales.mx/wp-content/cache/min/1/wp-includes/css/dashicons.min.css?ver=1729539507'
        media='all' />

    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <title>home page</title>
</head>

<body>
    <?php
    $lang = getCurrentLocale();
    
    $headerLogo = \App\Models\HeaderContent::where([['lang_code', 'en'], ['meta_key', 'header_logo']])->first();
    $headerContent = \App\Models\HeaderContent::where([['lang_code', $lang], ['type', 'text']])->pluck('meta_value', 'meta_key');
    
    if ($headerContent->isEmpty()) {
        $headerContent = \App\Models\HeaderContent::where([['lang_code', 'en'], ['type', 'text']])->pluck('meta_value', 'meta_key');
    }
    $footerLogo = \App\Models\FooterContent::where([['lang_code', 'en'], ['meta_key', 'footer_logo']])->first();
    $icons = \App\Models\FooterContent::where('lang_code', 'en')
        ->whereIn('meta_key', ['facebook_icon', 'instagram_icon', 'twitter_icon'])
        ->get();
    
    $facebookIcon = $icons->where('meta_key', 'facebook_icon')->first();
    $instagramIcon = $icons->where('meta_key', 'instagram_icon')->first();
    $twitterIcon = $icons->where('meta_key', 'twitter_icon')->first();
    
    $footerContents = \App\Models\FooterContent::where('lang_code', $lang)->where('type', 'text')->pluck('meta_value', 'meta_key');
    $footerMediaUrls = \App\Models\FooterContent::where('lang_code', $lang)->where('type', 'url')->where('lang_code', 'en')->pluck('meta_value', 'meta_key');
    
    if ($footerContents->isEmpty()) {
        $footerContents = \App\Models\FooterContent::where('lang_code', 'en')->where('type', 'text')->pluck('meta_value', 'meta_key');
    }
    
    ?>
    <header>
        <section class="sec_head">
            <div class="bottom_header dark">
                <div class="container-fluid">
                    <div class="header_row">
                        <div class="search_logo">
                            <div class="logo_col">
                                <!-- <a href="{{ url('/' ?? '') }}" class="brand"><img src="{{ asset('front/img/logo.svg') }}"></a>               -->
                                @if (isset($headerLogo) && $headerLogo)
                                    <a href="{{ url('/' ?? '') }}" class="brand"><img
                                            src="{{ asset($headerLogo->meta_value) }}"
                                            alt="{{ $headerLogo->meta_key }}"></a>
                                @else
                                    <a href="{{ url('/' ?? '') }}" class="brand"><img
                                            src="{{ asset('front/img/logo.svg') }}"></a>
                                @endif
                            </div>
                        </div>
                        <div id="myID" class="search-box">
                            <input type="text"
                                placeholder="{{ $headerContent['header_search_placeholder'] ?? '' }}">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="header_button_col">
                            <div class="Header_buttons">
                                @if (!auth()->user())
                                    <a href="{{ route('login', ['locale' => session('locale', 'en-us')]) }}"
                                        class="cta cta_trans">{{ $headerContent['login_btn_lable'] ?? '' }}</a>
                                    <a href="{{ route('register', ['locale' => session('locale', 'en-us')]) }}"
                                        class="cta cta_orange">{{ $headerContent['sign_up_btn_lable'] ?? '' }}</a>
                                @else
                                    <a href="{{ url('/logout') }}"
                                        class="cta cta_orange">{{ $headerContent['sign_out_btn_lable'] ?? '' }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top_header dark">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </button>
                        <?php
                        use App\Models\CategoryTranslation;
                        use App\Models\Language;
                        if (Session::has('userDetails')) {
                            $lang_id = Session::get('userDetails')['lang_id'];
                        } else {
                            $lang_id = 1;
                        }
                        // dd($lang_code);
                        $categories = CategoryTranslation::where('language_id', $lang_id)->get()->toArray();
                        ?>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="left_menu">
                                <ul class="menu">
                                    <li class=" menu-item cat_menu_item dropdown dropdown-6  mobile-drop">
                                        <a href="jasfhaks"
                                            class="cat_menu">{{ $headerContent['categories'] ?? '' }}</a>
                                        <span class="dropdown_toggle"><i class="fa-solid fa-chevron-down"></i></span>
                                        <ul
                                            class="dropdown_menu dropdown_menu--animated dropdown_menu-6 mob-drp-contnt">
                                            @foreach ($categories as $category)
                                                <li class="dropdown_item-1">
                                                    <a
                                                        href="#">{{ $category['name'] ?? 'not category found' }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <?php
                                    use App\Models\Product;
                                    $products = Product::all();
                                    
                                    ?>
                                    <li class=" menu-item dropdown dropdown-6 mobile-drop">
                                        <a href="#">{{ $headerContent['top_rated_product'] ?? '' }}</a>
                                        <span class="dropdown_toggle"><i class="fa-solid fa-chevron-down"></i></span>
                                        <ul
                                            class="dropdown_menu dropdown_menu--animated dropdown_menu-6 mob-drp-contnt">
                                            @if (isset($products) && !$products->isEmpty())
                                                @foreach ($products as $product)
                                                    <li class="dropdown_item-1">
                                                        <a href="javascript:void(0)" class="product-name"
                                                            data-id="{{ $product->id }}"
                                                            data-slug="{{ $product->slug }}">{{ $product->name ?? '' }}</a>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </li>
                                    <li class=" menu-item dropdown dropdown-6 mobile-drop">
                                        <a href="#">{{ $headerContent['exclusive'] ?? '' }}</a>
                                        <span class="dropdown_toggle"><i class="fa-solid fa-chevron-down"></i></span>
                                        <ul
                                            class="dropdown_menu dropdown_menu--animated dropdown_menu-6 mob-drp-contnt">
                                            <li class="dropdown_item-1">
                                                <a href="#">Item 1</a>
                                            </li>
                                            <li class="dropdown_item-2">
                                                <a href="#">Item 2</a>
                                            </li>
                                            <li class="dropdown_item-3">
                                                <a href="#">Item 3</a>
                                            </li>
                                            <li class="dropdown_item-4">
                                                <a href="#">Item 4</a>
                                            </li>
                                            <li class="dropdown_item-5">
                                                <a href="#">Item 5</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="right_menu">
                                <ul>
                                    <li>
                                        <a
                                            href="{{ route('expert-guide') }}">{{ $headerContent['expert_guide'] ?? '' }}</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('help-center') }}">{{ $headerContent['help_center'] ?? '' }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </section>
    </header>
    <!-- header section end -->
    <!-- content section start -->
    @yield('content')
    <!-- content section end -->
    <!-- footer  -->
    <footer class="dark">
        <div class="container">
            <div class="footer-wrp ">
                <div class="row foot-row">
                    <div class="col-lg-9">
                        <div class="foot-row-lft p_80">
                            <div class="foot-logo">

                                @if (isset($footerLogo) && $footerLogo)
                                    <a href="{{ url('/' ?? '') }}" class="brand"><img
                                            src="{{ asset($footerLogo->meta_value) }}"
                                            alt="{{ $footerLogo->meta_key }}"></a>
                                @else
                                    <a href="{{ url('/' ?? '') }}" class="brand"><img
                                            src="{{ asset('front/img/foot-logo.svg') }}"></a>
                                @endif
                            </div>
                            <div class="foot-col">
                                <h6> {{ $footerContents['discover'] ?? '' }}</h6>
                                <ul class="foot-col-list">
                                    <li>
                                        <a
                                            href="{{ route('category', ['locale' => session('lang_code', 'en-us')]) }}">
                                            {{ $footerContents['categories'] ?? '' }}
                                        </a>
                                    </li>
                                    <li><a
                                            href="{{ route('top-rated-product', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['top_rated_product'] ?? '' }}
                                        </a>
                                    </li>
                                    <li><a href="javascript:void(0)">{{ $footerContents['exclusive_deal'] ?? '' }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="foot-col">
                                <h6>{{ $footerContents['company'] ?? '' }}</h6>
                                <ul class="foot-col-list">
                                    <li><a
                                            href="{{ route('who-we-are', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['who_we_are'] ?? '' }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('privacy-policy', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['privacy_policy'] ?? '' }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('terms-condition', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['terms_and_conditions'] ?? '' }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="foot-col">
                                <h6>{{ $footerContents['vendors'] ?? '' }}</h6>
                                <ul class="foot-col-list">
                                    <li><a
                                            href="{{ route('vendor-get-listed', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['get_listed'] ?? '' }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('login', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['vendor_login'] ?? '' }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="foot-col">
                                <h6>{{ $footerContents['help'] ?? '' }}</h6>
                                <ul class="foot-col-list">
                                    <li>
                                        <a
                                            href="{{ route('expert-guide', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['expert_guides'] ?? '' }}</a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('help-center', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['help_center'] ?? '' }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('contact', ['locale' => session('lang_code', 'en-us')]) }}">{{ $footerContents['contact'] ?? '' }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="foot-row-right foot-col p_80">
                            <h6> {{ $footerContents['follow_us'] ?? '' }}</h6>
                            <ul class="foot-right-list">
                                <li><a href="{{ $footerMediaUrls['facebook_url'] ?? '' }}" target="blank"
                                        class="d-flex align-items-center">

                                        @if (isset($facebookIcon))
                                            <img class="media_icon" src="{{ asset($facebookIcon->meta_value) }}"
                                                alt="{{ $facebookIcon->meta_key }}"
                                                style="width: 19px; height: 17px; color: #ffffff;">
                                        @else
                                            <i class="fa-brands fa-facebook-f" style="color: #ffffff;">
                                            </i>
                                        @endif
                                        {{ $footerContents['facebook'] ?? '' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $footerMediaUrls['instagram_url'] ?? '' }}" target="blank"
                                        class="d-flex align-items-center">
                                        @if (isset($instagramIcon))
                                            <img class="media_icon" src="{{ asset($instagramIcon->meta_value) }}"
                                                alt="{{ $instagramIcon->meta_key }}"
                                                style="width: 19px; height: 17px; color: #ffffff;">
                                        @else
                                            <i class="fa-brands fa-instagram" style="color: #ffffff;">
                                            </i>
                                        @endif
                                        {{ $footerContents['instagram'] ?? '' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $footerMediaUrls['twitter_url'] ?? '' }}" target="blank"
                                        class="d-flex align-items-center">
                                        @if (isset($twitterIcon))
                                            <img class="media_icon" src="{{ asset($twitterIcon->meta_value) }}"
                                                alt="{{ $twitterIcon->meta_key }}"
                                                style="width: 19px; height: 17px; color: #ffffff;">
                                        @else
                                            <i class="fa-brands fa-twitter" style="color: #ffffff;">
                                            </i>
                                        @endif
                                        {{ $footerContents['twitter'] ?? '' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="foot-btm d-flex justify-content-between">
                    <div class="ft-btm-lft">
                        <p>©<?php echo date('Y'); ?> Localio. All rights reserved.</p>
                    </div>
                    <div class="ft-btm-rgt">
                        <div class="select-menu ">
                            <div class="select-btn">
                                <span class="sBtn-text">{{ 'United State- English' }}</span>
                                <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
                            </div>

                            <ul class="options">
                                @foreach ($languages as $language)
                                    <li class="option {{ 'en-us' == $language->lang_code ? 'selected' : '' }}">
                                        <span class="option-text">
                                            <a
                                                href="{{ route('switch-language', ['lang_code' => $language->lang_code]) }}">
                                                {{ $language->name }}
                                            </a>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!----------------------------------------- read section end --------------------------------------- -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        $(function() {
            AOS.init();
        });
    </script>
    <script type="text/javascript"></script>
    <!-- header search js -->
    <script>
        $(document).ready(function() {
            function checkScroll() {
                const $myElement = $('#myID');

                if ($(window).scrollTop() > 460) {
                    $myElement.show();
                } else {
                    $myElement.hide();
                }
            }
            checkScroll();
            $(window).on('scroll', checkScroll);
        });
    </script>
    @session('success')
        {{-- $session = session('success'); --}}
        <script>
            @if (Session::has('success'))
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                    text: '{{ Session::get('sy                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        success ') }}',
                    position: 'top-right',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000, // Auto close after 3 seconds
                });
            @endif
        </script>
    @endsession
    <!-- <script>
        @if (Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ Session::get('
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        error ') }}',
                position: 'top-right',
                toast: true,
                showConfirmButton: false,
                timer: 3000, // Auto close after 3 seconds
            });
        @endif
    </script> -->
</body>

</html>
