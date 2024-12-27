@extends('user_layout.master')
@section('content')
<!-- <div class="header_inner"> -->
<?php
    $files = \App\Models\TopProductContent::where([['lang_code','en'],['type','file']])->pluck('meta_value','meta_key');

?>
<section class="banner_sec help-cntr-bnr top-auto-bnr dark " style="background-color: #003F7D;">
    <div class="bubble-wrp" data-aos="fade-up" data-aos-duration="1000">
        @if(isset($files['banner_bg_image']) && $files['banner_bg_image'])
        <img src="{{ asset($files['banner_bg_image']) }}" alt="Banner Image">
        @endif
    </div>
    <div class="banner_content">
        <div class="container">
            <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                <div class="banner_text_col">
                    <div class="banner_content_inner">
                        <div class="hd-share-flex d-flex align-items-center">
                            <h1>{{$topProductContents['header_title'] ?? ''}}</h1>
                            <!-- <div class="hd-share">
                        <img src="img/white-share-node.svg" alt="">
                    </div> -->
                        </div>
                        <p class="fw_700">{{$topProductContents['header_sub_title'] ?? ''}} </p>
                    </div>
                </div>
                <div class="banner_image_col">
                    <div class="banner_image">
                        @if(isset($files['banner_image']) && $files['banner_image'])
                        <img src="{{asset($files['banner_image']) }}" class="banner_top_image">
                        @else
                        <img src="{{asset('front/img/top-rated-bnr-bg.png') }}" class="banner_top_image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="abs-txt">
        <div class="container">
            <div class="hd-innr-txt">
                <div class="inside_text">
                    <p class="m-0">{{$topProductContents['header_bottom_text'] ?? ''}}
                        <a href="" class="">{{$topProductContents['learn_more'] ?? ''}}</a>
                    </p>
                </div>
                <div class="inside_sec_text">
                    <div class="sharing_icons">
                        <div class="sharing_ul">
                            <a aria-label="Facebook" class="fb_icon" href="" title="Facebook" target="_blank">
                                @if(isset($files['facebook_icon']) && $files['facebook_icon'])
                                <img src="{{asset($files['facebook_icon']) }}" class="banner_top_image">
                                @else
                                <img src="{{asset('header_logo/1734611650_Facebook.svg') }}" class="banner_top_image">
                                @endif
                            </a>
                        </div>
                        <div class="sharing_ul">
                            <a aria-label="Pinterest" class="pin_icon" href="" title="Pinterest" target="_blank">
                                @if(isset($files['pinterest_icon']) && $files['pinterest_icon'])
                                <img src="{{asset($files['pinterest_icon']) }}" class="banner_top_image">
                                @else
                                <img src="{{asset('header_logo/1734611691_Pinterest.svg') }}" class="banner_top_image">
                                @endif
                            </a>
                        </div>
                        <div class="sharing_ul">
                            <a aria-label="X" class="twitter_icon" href="" title="Twitter" target="_blank">
                                @if(isset($files['twitter_icon']) && $files['twitter_icon'])
                                <img src="{{asset($files['twitter_icon']) }}" class="banner_top_image">
                                @else
                                <img src="{{asset('header_logo/1734611712_Twitter.svg') }}" class="banner_top_image">
                                @endif
                            </a>
                        </div>
                        <div class="sharing_ul">
                            <a aria-label="Copy Link" class="copy_link_icon" href="" title="Copylink" target="_blank">
                                @if(isset($files['copylink_icon']) && $files['copylink_icon'])
                                <img src="{{asset($files['copylink_icon']) }}" class="banner_top_image">
                                @else
                                <img src="{{asset('header_logo/1734611735_Link.svg') }}" class="banner_top_image">
                                @endif
                            </a>
                        </div>
                        <div class="sharing_ul">
                            <a aria-label="More" class="more_icon" href="" title="More" target="_blank">
                                @if(isset($files['more_icon']) && $files['more_icon'])
                                <img src="{{asset($files['more_icon']) }}" class="banner_top_image">
                                @else
                                <img src="{{asset('header_logo/1734611756_More.svg') }}" class="banner_top_image">
                                @endif
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- </div> -->
<!-- section top-rated automaotive -->
<section class="top-automotive-sec light p_120 ">
    <div class="top-auto-btm">
        <div class="container">
            <!-- top-automotive-choices -->
            <div class="top-auto-choice">
                <div class="auto-choice-row d-flex ">
                    <div class="auto-choice-lft">
                        <div class="search-box">
                            <input type="text" name="top_product" id="productSearch"
                                placeholder="{{$topProductContents['search_placeholder'] ?? ''}}">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="pricing-options">
                            <h6 class="h6_20">{{$topProductContents['user_rating'] ?? ''}}</h6>
                            <div class="rating-pack">
                                <div class="rating-pck-txt d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" id="s1" name="s1" value="free">
                                        <label class="d-flex align-items-center gap-2" for="s1">
                                            <ul class="star-div d-flex p-0 m-0">
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                            </ul>
                                            &up
                                        </label>
                                    </div>
                                    <span>(215)</span>
                                </div>
                            </div>
                            <div class="rating-pack">
                                <div class="rating-pck-txt d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" id="s2" name="s2" value="free">
                                        <label class="d-flex align-items-center gap-2" for="s2">
                                            <ul class="star-div d-flex p-0 m-0">
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #D9D9D9;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #D9D9D9;"></i>
                                                </li>
                                            </ul>
                                            &up
                                        </label>
                                    </div>
                                    <span>(150)</span>
                                </div>
                            </div>
                            <div class="rating-pack">
                                <div class="rating-pck-txt d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="checkbox" id="s3" name="s3" value="free">
                                        <label class="d-flex align-items-center gap-2" for="s3">
                                            <ul class="star-div d-flex p-0 m-0">
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #FF9D28;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #D9D9D9;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #D9D9D9;"></i>
                                                </li>
                                                <li><i class="fa-solid fa-star" style="color: #D9D9D9;"></i>
                                                </li>
                                            </ul>
                                            &up
                                        </label>
                                    </div>
                                    <span>(151)</span>
                                </div>
                            </div>
                        </div>
                        <!-- filter by price -->
                        <div class="pricing-options">
                            <h6 class="h6_20">{{$topProductContents['price'] ?? ''}}</h6>
                            <div class="range-wrapper">
                                <div class="values">
                                    <div class="range-txt">
                                        <span class="crrncy-icon">$</span> <span id="range1">0</span>
                                    </div>
                                    <div class="range-txt">
                                        <span class="crrncy-icon">$</span> <span id="range2">299</span>
                                    </div>
                                </div>
                                <div class="range-container">
                                    <div class="range-slider-track"></div>
                                    <input type="range" min="0" max="{{$productMaxPrice ?? ''}}" value="0" id="slider-1"
                                        oninput="slideOne()">
                                    <input type="range" min="0" max="{{$productMaxPrice ?? ''}}"
                                        value="{{$productMaxPrice ?? ''}}" id="slider-2" oninput="slideTwo()">

                                </div>
                            </div>
                        </div>
                        <div class="pricing-options">
                            <h6 class="h6_20">{{$topProductContents['price_option'] ?? ''}}</h6>
                            <ul class="p-0 m-0">
                                <li><input type="checkbox" id="opt1" name="opt1" value="free">
                                    <label for="opt1">Free</label>
                                </li>
                                <li><input type="checkbox" id="opt2" name="opt2" value="free">
                                    <label for="opt2">Free Trial </label>
                                </li>
                                <li><input type="checkbox" id="opt3" name="opt3" value="free">
                                    <label for="opt3">Monthly Subscription </label>
                                </li>
                                <li><input type="checkbox" id="opt4" name="opt4" value="free">
                                    <label for="opt4">Annual Subscription </label>
                                </li>
                                <li><input type="checkbox" id="opt5" name="opt5" value="free">
                                    <label for="opt5">One-Time License</label>
                                </li>
                            </ul>
                        </div>
                        <div class="pricing-options feature">
                            <h6 class="h6_20">{{$topProductContents['features'] ?? ''}}</h6>
                            <ul class="p-0">
                                <li><input type="checkbox" id="f1" name="f1" value="free">
                                    <label for="f1">Anonymous Feedback</label>
                                </li>
                                <li><input type="checkbox" id="f2" name="f2" value="free">
                                    <label for="f2">Continuous Feedback </label>
                                </li>
                                <li><input type="checkbox" id="f3" name="f3" value="free">
                                    <label for="f3">Customizable Forms </label>
                                </li>
                                <li><input type="checkbox" id="f4" name="f4" value="free">
                                    <label for="f4">Dashboard </label>
                                </li>
                                <li><input type="checkbox" id="f5" name="f5" value="free">
                                    <label for="f5">Data Import/Export </label>
                                </li>
                                <li><input type="checkbox" id="f6" name="f6" value="free">
                                    <label for="f6">Employee Database </label>
                                </li>
                                <li><input type="checkbox" id="f7" name="f7" value="free">
                                    <label for="f7">Feedback Management </label>
                                </li>
                            </ul>
                            <div class="show-more-txt">
                                <a class="blue-text"
                                    href="javascript:void(0)">{{$topProductContents['show_more'] ?? ''}} <i
                                        class="fa-solid fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="pricing-options">
                            <h6 class="h6_20">{{$topProductContents['deployment'] ?? ''}}</h6>
                            <ul class="p-0 ">
                                <li><input type="checkbox" id="dp1" name="dp1" value="free">
                                    <label for="dp1">Cloud, SaaS, Web-Based </label>
                                </li>
                                <li><input type="checkbox" id="dp2" name="dp2" value="free">
                                    <label for="dp2">Desktop Mac </label>
                                </li>
                                <li><input type="checkbox" id="dp3" name="dp3" value="free">
                                    <label for="dp3">Desktop Windows </label>
                                </li>
                                <li><input type="checkbox" id="dp4" name="dp4" value="free">
                                    <label for="dp4">Desktop Linux </label>
                                </li>
                                <li><input type="checkbox" id="dp5" name="dp5" value="free">
                                    <label for="dp5">On-Premise Windows </label>
                                </li>
                                <li><input type="checkbox" id="dp6" name="dp6" value="free">
                                    <label for="dp6">On-Premise Linux</label>
                                </li>
                                <li><input type="checkbox" id="dp7" name="dp7" value="free">
                                    <label for="dp7">Desktop Chromebook </label>
                                </li>
                            </ul>
                            <div class="show-more-txt">
                                <a class="blue-text"
                                    href="javascript:void(0)">{{$topProductContents['show_more'] ?? ''}} <i
                                        class="fa-solid fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="pricing-options">
                            <h6 class="h6_20">{{$topProductContents['company_size'] ?? ''}}</h6>
                            <ul class="p-0 m-0">
                                <li><input type="checkbox" id="c1" name="c1" value="free">
                                    <label for="c1">Small Business (1 - 200) </label>
                                </li>
                                <li><input type="checkbox" id="c2" name="c2" value="free">
                                    <label for="c2">Mid Size Business (201 - 500) </label>
                                </li>
                                <li><input type="checkbox" id="c3" name="c3" value="free">
                                    <label for="c3">Enterprise (500+) </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="auto-choice-rgt">
                        <div class="select-box">
                            <select name="automotive" id="auto-products">
                                <option value="automotive">{{$topProductContents['drop_down_text'] ?? ''}}</option>
                                <option value="product1">product 1</option>
                                <option value="product2">product 2</option>
                            </select>
                        </div>
                        <div id="productContainer">
                            @if(isset($products) && !$products->isEmpty())
                            @foreach($products as $product)
                            <div class="automotive-card auto-bg" data-aos="fade-up" data-aos-duration="1000">
                                <div class="auto-choice-card">
                                    <div class="auto-choice-hd">
                                        <div class="inn_sl_hed">
                                            @if(isset($product->product_icon))
                                            <div class="sli_img choice_img">
                                                <img class="slider_img"
                                                    src="{{asset('ProductIcon/' .$product->product_icon) }}" alt="">
                                            </div>
                                            @endif
                                            <div class="sl_h">
                                                <div class="inn_h">
                                                    <div class="sl_main">
                                                        <h6 class="head">
                                                            {{$product->translations->isNotEmpty() ? $product->translations->first()->name : $product->name ?? ''}}
                                                        </h6>
                                                        <div class="wishlist">
                                                            <a href="#" class="heart-container" tabindex="0">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tp-btm d-flex flex-col-mob">
                                                    <div class="inn_ul">
                                                        <div class="tab_star_li">
                                                            <span class="rating-on rate-1" data-rating="1"></span>
                                                            <span class="rating-on rate-2" data-rating="2"></span>
                                                            <span class="rating-on rate-3" data-rating="3"></span>
                                                            <span class="rating-on rate-4" data-rating="4"></span>
                                                            <span class="rating-on rate-5" data-rating="5"></span>
                                                        </div>
                                                        <div>
                                                            <i class="fa-solid fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                    <div class="rate_box">
                                                        5.0 | 124 {{$topProductContents['rating'] ?? ''}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="auto-choice-btn">
                                            <a href="{{$product->product_link ?? ''}}" target="blank"
                                                class="cta cta_orange">
                                                {{$topProductContents['visit_website'] ?? ''}}
                                                <div class="right-arw">
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-choice">
                                        <p>
                                            {{ strip_tags($product->translations->isNotEmpty() ? $product->translations->first()->description : $product->description ?? '')}}

                                        </p>
                                        <a href="javascript:void(0)">{{$topProductContents['read_more'] ?? ''}}</a>
                                    </div>
                                    <div class="key-feature-price d-flex">
                                        <div class="choice-key-features">
                                            <h6>{{$topProductContents['key_features'] ?? ''}}</h6>
                                            <ul class="list-unstyled key-fea-lst">
                                                @foreach ($product->keyFeatures as $keyFeature)
                                                <li class="d-flex align-items-center">
                                                    <div class="grn_chk">
                                                        @if(isset($files['green_tick_img']) && $files['green_tick_img'])
                                                        <img src="{{asset($files['green_tick_img']) }}"
                                                            class="banner_top_image">
                                                        @else
                                                        <img src="{{asset('front/img/tick-img.png') }}"
                                                            class="banner_top_image">
                                                        @endif
                                                    </div>
                                                    <p>
                                                        {{$keyFeature->translations->isNotEmpty() ? $keyFeature->translations->first()->feature : ($keyFeature->feature ?? '')}}
                                                    </p>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="starting-price">
                                            <h6 class="m-0">{{$topProductContents['starting_price'] ?? ''}}</h6>
                                            <p class="m-0">
                                                <span>${{ formatInr($product->product_price ?? 0) }}</span>/{{$topProductContents['month'] ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="blue-chkbox">
                                    <input type="checkbox" id="compare" name="compare" value="free">
                                    <label for="compare">{{$topProductContents['compare_products'] ?? ''}}</label>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="pagination">
                            @if(isset($products) && !$products->isEmpty())
                            <div class="automotive-pagination" data-aos="fade-up" data-aos-duration="1000">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($products->onFirstPage())
                                        <li class="page-item pagi-btn disabled">
                                            <a class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @else
                                        <li class="page-item pagi-btn">
                                            <a class="page-link" href="{{ $products->previousPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-left"></i></a>
                                        </li>
                                        @endif

                                        {{-- Page Number Links --}}
                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                        <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($products->hasMorePages())
                                        <li class="page-item pagi-btn">
                                            <a class="page-link" href="{{ $products->nextPageUrl() }}"><i
                                                    class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                        @else
                                        <li class="page-item pagi-btn disabled">
                                            <a class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="subs_sec light p_120 ">
    <div class="container">
        <div class="subs_content">
            <div class="sub_img">
                @if(isset($files['mail_image']) && $files['mail_image'])
                <img src="{{asset($files['mail_image']) }}" class="banner_top_image">
                @else
                <img src="{{asset('front/img/subs.png') }}">
                @endif

            </div>
            <h2 data-aos="fade-up" data-aos-duration="1000">{{$topProductContents['footer_title'] ?? ''}}
                <?php echo date('Y');?></h2>
            <p data-aos="fade-up" data-aos-duration="1000">{{$topProductContents['footer_sub_title'] ?? ''}}
            </p>
            <div class="mail_field" data-aos="fade-up" data-aos-duration="1000">
                <div class="email_box">
                    <input type="email" id="email" name="email"
                        placeholder="{{$topProductContents['email_placeholder'] ?? ''}}">
                </div>
                <div class="accor-btn sbs_bttn">
                    <a href="javascript:void(0)"
                        class="cta cta_white">{{$topProductContents['subscribe_lable'] ?? ''}}</a>
                </div>
            </div>
            <p data-aos="fade-up" data-aos-duration="1000">{{$topProductContents['you_agree'] ?? ''}} <span
                    class="big-bld">{{$topProductContents['terms_of_use'] ?? ''}}</span>{{$topProductContents['privacy_policy'] ?? ''}}
                <span class="big-bld">{{$topProductContents['and'] ?? ''}}</span>
            </p>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
//   function updateRange() {
//     const slider1 = document.getElementById('slider-1');

//     const slider2 = document.getElementById('slider-2');
//     const minPrice = Math.min(parseInt(slider1.value), parseInt(slider2.value));

//     const maxPrice = Math.max(parseInt(slider1.value), parseInt(slider2.value));
//     document.getElementById('price-range').innerText = `${minPrice} - ${maxPrice}`;

// }


$(document).ready(function() {
    let minPrice = 0;
    let maxPrice = 1000;
    let searchQuery = '';

    function debounce(func, delay) {
        let timer;
        return function() {
            clearTimeout(timer);
            const context = this;
            const args = arguments;
            timer = setTimeout(function() {
                func.apply(context, args);
            }, delay);

        };
    }

    $('#slider-1').on('input',debounce( function() {
        minPrice = $(this).val();
        $('#range1').text(minPrice);
        fetchProducts(searchQuery, minPrice, maxPrice);
    },500));

    $('#slider-2').on('input',debounce(function() {
        maxPrice = $(this).val();
        $('#range2').text(maxPrice);
        fetchProducts(searchQuery, minPrice, maxPrice);
    },500));

    $('#productSearch').on('keyup', debounce(function() {
        searchQuery = $(this).val().trim();
        if (searchQuery && isNaN(searchQuery)) {
            fetchProducts(searchQuery, minPrice, maxPrice);
        } else if (isNaN(searchQuery)) {
            console.log('Search query is a number, search will not run.');
        } else {
            console.log('Search query is empty or contains only spaces.');

        }
    }, 500));
});

function fetchProducts(searchQuery, minPrice, maxPrice) {
    $.ajax({
        url: "{{ url(app()->getLocale() . '/fetch-product') }}",
        type: "POST",
        data: {
            searchQuery: searchQuery,
            min: minPrice,
            max: maxPrice,
            _token: "{{ csrf_token() }}",
        },

        success: function(response) {
            const topProductContents = response.topProductContents || {};
            const files = response.files || {};
            const products = response.products || [];
            const formattedProductRelations = response.formattedProductRelations || [];

            const productContainer = $('#productContainer');
            const pagination = $('.pagination');
            pagination.empty();
            productContainer.empty();
            if (Array.isArray(products) && products.length > 0) {
                products.forEach((product) => {
                    const productRelationData = formattedProductRelations.find(pr => pr.product
                        .id === product.id);
                    const keyFeatures = productRelationData ? productRelationData.keyFeatures : [];

                    const productName = (product.translations && product.translations[0] && product
                        .translations[0].name) || product.name;
                    const productDescription = (product.translations && product.translations[0] &&
                        product.translations[0].description) || product.description;

                    const productHTML = `
                        <div class="automotive-card auto-bg" data-aos="fade-up" data-aos-duration="1000">
                            <div class="auto-choice-card">
                                <div class="auto-choice-hd">
                                    <div class="inn_sl_hed">
                                        ${product.product_icon ? `
                                            <div class="sli_img choice_img">
                                                <img class="slider_img" src="{{ asset('ProductIcon/') }}/${product.product_icon}" alt="${productName}">
                                            </div>` : ''}
                                        <div class="sl_h">
                                            <div class="inn_h">
                                                <div class="sl_main">
                                                    <h6 class="head">${productName}</h6>
                                                    <div class="wishlist">
                                                        <a href="#" class="heart-container" tabindex="0"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-btm d-flex flex-col-mob">
                                                <div class="inn_ul">
                                                    <div class="tab_star_li">
                                                        <span class="rating-on rate-1" data-rating="1"></span>
                                                        <span class="rating-on rate-2" data-rating="2"></span>
                                                        <span class="rating-on rate-3" data-rating="3"></span>
                                                        <span class="rating-on rate-4" data-rating="4"></span>
                                                        <span class="rating-on rate-5" data-rating="5"></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-angle-down"></i>
                                                    </div>
                                                </div>
                                                <div class="rate_box">
                                                    5.0 | 124 ${topProductContents['rating'] || ''}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="auto-choice-btn">
                                        <a href="${product.product_link || '#'}" target="blank" class="cta cta_orange">
                                            ${topProductContents['visit_website'] || ''}
                                            <div class="right-arw">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="text-choice">
                                    <p>${productDescription}</p>
                                    <a href="javascript:void(0)">${topProductContents['read_more'] || ''}</a>
                                </div>
                                <div class="key-feature-price d-flex">
                                    <div class="choice-key-features">
                                        <h6>${topProductContents['key_features'] || ''}</h6>
                                     <ul class="list-unstyled key-fea-lst">
                                        ${keyFeatures.map((keyFeature) => {
                                            return `
                                                <li class="d-flex align-items-center">
                                                    <div class="grn_chk">
                                                        ${files.green_tick_img 
                                                            ? `<img src="${files.green_tick_img}" class="banner_top_image" alt="Green Tick">` 
                                                            : `<img src="{{ asset('front/img/tick-img.png') }}" class="banner_top_image" alt="Green Tick">`}
                                                    </div>
                                                    <p>${keyFeature.feature || 'No key feature'}</p>
                                                </li>
                                            `;
                                        }).join('')}
                                    </ul>
                                    </div>
                                    <div class="starting-price">
                                        <h6 class="m-0">${topProductContents['starting_price'] || ''}</h6>
                                        <p class="m-0">
                                             <span>$${(parseFloat(product.product_price) || 0).toFixed()}</span>/${topProductContents['month'] || ''}
                                        </p>
                                    </div>
                                </div>
                                <div class="blue-chkbox">
                                    <input type="checkbox" id="compare" name="compare" value="free">
                                    <label for="compare">${topProductContents['compare_products'] || ''}</label>
                                </div>
                            </div>
                        </div>`;

                    productContainer.append(productHTML);
                });
            } else {
                console.log('No products available or invalid response format.');
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: ", error);
        }
    });
}
</script>

@endsection