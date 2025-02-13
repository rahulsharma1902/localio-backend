@extends('user_layout.master')
@section('content')
    <style>
        .star-rating li {
            display: inline-block;
            margin-right: 5px;
        }

        .star-rating i {
            font-size: 24px;
        }
    </style>
    <section class="banner_sec help-cntr-bnr top-auto-bnr dark " style="background-color: #003F7D;">
        <div class="bubble-wrp" data-aos="fade-up" data-aos-duration="1000">
            <img src="img/small-bnnr-bg.png" alt="">
        </div>
        <div class="banner_content">
            <div class="container">
                <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="banner_text_col">
                        <div class="banner_content_inner">
                            <div class="hd-share-flex d-flex align-items-center">
                                <h1>Automotive</h1>
                            </div>
                            <p class="fw_700">How to find the right Automotive Software </p>
                        </div>
                    </div>
                    <div class="banner_image_col">
                        <div class="banner_image">
                            <img src="{{ asset('front/img/top-rated-bnr-bg.png') }}" class="banner_top_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="abs-txt">
            <div class="container">
                <div class="hd-innr-txt">
                    <div class="inside_text">
                        <p class="m-0">Localio
                            provides independent research and reviews. We may earn affiliate commissions.
                            <a href="" class="">Learn more</a>
                        </p>
                    </div>
                    <div class="inside_sec_text">
                        <div class="sharing_icons">
                            <div class="sharing_ul">
                                <a aria-label="Facebook" class="fb_icon" href="" title="Facebook" target="_blank">
                                    <span class="svg">
                                        <svg style="display:block;border-radius:999px;" focusable="false" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="15px"
                                            height="15px">
                                            <path
                                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                        </svg>
                                </a>
                            </div>
                            <div class="sharing_ul">
                                <a aria-label="Pinterest" class="pin_icon" href="" title="Pinterest" target="_blank">
                                    <span class="svg">
                                        <svg style="display:block;border-radius:999px;" focusable="false" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                            viewBox="-2 -2 35 35">
                                            <path fill="#1E2C4F"
                                                d="M16.539 4.5c-6.277 0-9.442 4.5-9.442 8.253 0 2.272.86 4.293 2.705 5.046.303.125.574.005.662-.33.061-.231.205-.816.27-1.06.088-.331.053-.447-.191-.736-.532-.627-.873-1.439-.873-2.591 0-3.338 2.498-6.327 6.505-6.327 3.548 0 5.497 2.168 5.497 5.062 0 3.81-1.686 7.025-4.188 7.025-1.382 0-2.416-1.142-2.085-2.545.397-1.674 1.166-3.48 1.166-4.689 0-1.081-.581-1.983-1.782-1.983-1.413 0-2.548 1.462-2.548 3.419 0 1.247.421 2.091.421 2.091l-1.699 7.199c-.505 2.137-.076 4.755-.039 5.019.021.158.223.196.314.077.13-.17 1.813-2.247 2.384-4.324.162-.587.929-3.631.929-3.631.46.876 1.801 1.646 3.227 1.646 4.247 0 7.128-3.871 7.128-9.053.003-3.918-3.317-7.568-8.361-7.568z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="sharing_ul">
                                <a aria-label="X" class="twitter_icon" href="" title="Twitter" target="_blank">
                                    <span class="svg">
                                        <svg width="100%" height="100%" style="display:block;border-radius:999px;"
                                            focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32">
                                            <path fill="#1E2C4F"
                                                d="M21.751 7h3.067l-6.7 7.658L26 25.078h-6.172l-4.833-6.32-5.531 6.32h-3.07l7.167-8.19L6 7h6.328l4.37 5.777L21.75 7Zm-1.076 16.242h1.7L11.404 8.74H9.58l11.094 14.503Z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="sharing_ul">
                                <a aria-label="Copy Link" class="copy_link_icon" href="" title="Copylink"
                                    target="_blank">
                                    <span class="svg">
                                        <svg style="display:block;border-radius:999px;" focusable="false" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                            viewBox="-4 -4 40 40">
                                            <path fill="#1E2C4F"
                                                d="M24.412 21.177c0-.36-.126-.665-.377-.917l-2.804-2.804a1.235 1.235 0 0 0-.913-.378c-.377 0-.7.144-.97.43.026.028.11.11.255.25.144.14.24.236.29.29s.117.14.2.256c.087.117.146.232.177.344.03.112.046.236.046.37 0 .36-.126.666-.377.918a1.25 1.25 0 0 1-.918.377 1.4 1.4 0 0 1-.373-.047 1.062 1.062 0 0 1-.345-.175 2.268 2.268 0 0 1-.256-.2 6.815 6.815 0 0 1-.29-.29c-.14-.142-.223-.23-.25-.254-.297.28-.445.607-.445.984 0 .36.126.664.377.916l2.778 2.79c.243.243.548.364.917.364.36 0 .665-.118.917-.35l1.982-1.97c.252-.25.378-.55.378-.9zm-9.477-9.504c0-.36-.126-.665-.377-.917l-2.777-2.79a1.235 1.235 0 0 0-.913-.378c-.35 0-.656.12-.917.364L7.967 9.92c-.254.252-.38.553-.38.903 0 .36.126.665.38.917l2.802 2.804c.242.243.547.364.916.364.377 0 .7-.14.97-.418-.026-.027-.11-.11-.255-.25s-.24-.235-.29-.29a2.675 2.675 0 0 1-.2-.255 1.052 1.052 0 0 1-.176-.344 1.396 1.396 0 0 1-.047-.37c0-.36.126-.662.377-.914.252-.252.557-.377.917-.377.136 0 .26.015.37.046.114.03.23.09.346.175.117.085.202.153.256.2.054.05.15.148.29.29.14.146.222.23.25.258.294-.278.442-.606.442-.983zM27 21.177c0 1.078-.382 1.99-1.146 2.736l-1.982 1.968c-.745.75-1.658 1.12-2.736 1.12-1.087 0-2.004-.38-2.75-1.143l-2.777-2.79c-.75-.747-1.12-1.66-1.12-2.737 0-1.106.392-2.046 1.183-2.818l-1.186-1.185c-.774.79-1.708 1.186-2.805 1.186-1.078 0-1.995-.376-2.75-1.13l-2.803-2.81C5.377 12.82 5 11.903 5 10.826c0-1.08.382-1.993 1.146-2.738L8.128 6.12C8.873 5.372 9.785 5 10.864 5c1.087 0 2.004.382 2.75 1.146l2.777 2.79c.75.747 1.12 1.66 1.12 2.737 0 1.105-.392 2.045-1.183 2.817l1.186 1.186c.774-.79 1.708-1.186 2.805-1.186 1.078 0 1.995.377 2.75 1.132l2.804 2.804c.754.755 1.13 1.672 1.13 2.75z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="sharing_ul">
                                <a aria-label="More" class="more_icon" href="" title="More" target="_blank">
                                    <span class="svg">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="-.3 0 32 32" version="1.1" width="100%" height="100%"
                                            style="display:block;border-radius:999px;" xml:space="preserve">
                                            <g>
                                                <path fill="#1E2C4F" d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z"
                                                    fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section top-rated automaotive -->
    <section class="top-automotive-sec light  ">
        <div class="top-auto-btm">
            <div class="container">
                <div class="top-auto-choice">
                    <div class="auto-choice-row d-flex ">
                        <div class="auto-choice-lft">
                            <div class="search-box">
                                <input type="text" placeholder="Search product name">
                                <i class="fa fa-search"></i>
                            </div>
                            <div class="pricing-options">
                                <h6 class="h6_20">User Rating</h6>
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
                                <h6 class="h6_20">Price</h6>
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
                                        <input type="range" min="0" max="299" value="0"
                                            id="slider-1" oninput="slideOne()">
                                        <input type="range" min="0" max="299" value="299"
                                            id="slider-2" oninput="slideTwo()">
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-options">
                                <h6 class="h6_20">Pricing Options</h6>
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
                                <h6 class="h6_20">Features</h6>
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
                                    <a class="blue-text" href="javascript:void(0)">Show more <i
                                            class="fa-solid fa-chevron-down"></i></a>
                                </div>
                            </div>
                            <div class="pricing-options">
                                <h6 class="h6_20">Deployment</h6>
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
                                    <a class="blue-text" href="javascript:void(0)">Show more <i
                                            class="fa-solid fa-chevron-down"></i></a>
                                </div>
                            </div>
                            <div class="pricing-options">
                                <h6 class="h6_20">Company Size</h6>
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
                                    <option value="automotive">Top Rated Products</option>
                                    <option value="product1">product 1</option>
                                    <option value="product2">product 2</option>
                                </select>
                            </div>
                            {{-- {{ dd($products) }} --}}
                            @if (!empty($Category_products))
                                @foreach ($Category_products as $product)
                                    <div class="automotive-card auto-bg" data-aos="fade-up" data-aos-duration="1000">
                                        <div class="auto-choice-card">
                                            <div class="auto-choice-hd">
                                                <div class="inn_sl_hed">
                                                    <div class="sli_img choice_img">
                                                        <img class="slider_img"
                                                            src="{{ asset('ProductImage/') . '/' . $product['product_image'] }}"
                                                            alt="">
                                                    </div>
                                                    <div class="sl_h">
                                                        <div class="inn_h">
                                                            <div class="sl_main">
                                                                <h6 class="head">{{ $product['name'] }}</h6>
                                                                <div class="wishlist">
                                                                    <a href="#" class="heart-container"
                                                                        tabindex="0">
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
                                                                <div><i class="fa-solid fa-angle-down"></i>
                                                                </div>

                                                            </div>
                                                            <div class="rate_box">
                                                                5.0 | 124 ratings
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="auto-choice-btn">
                                                    <a href="{{ $product['product_link'] }}" class="cta cta_orange">
                                                        Visit Website
                                                        <div class="right-arw">
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="text-choice">
                                                <p>
                                                    {!! $product['description'] !!}
                                                </p>
                                                <a href="javascript:void(0)">Read More</a>
                                            </div>
                                            <div class="key-feature-price d-flex">
                                                <div class="choice-key-features">
                                                    <h6>Key Features</h6>
                                                    <ul class="list-unstyled key-fea-lst">
                                                        @if (!empty($product['product_features']))
                                                            @foreach ($product['product_features'] as $item)
                                                                <li class="d-flex align-items-center">
                                                                    <div class="grn_chk">
                                                                        <img src="{{ asset('front/img/tick-img.png') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <p class="m-0">{!! $item['feature_translation']['name'] !!}</p>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="starting-price">
                                                    <h6 class="m-0">Starting Price</h6>
                                                    <p class="m-0"><span>{{ $product['product_price'] }}</span>/Month
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blue-chkbox">
                                            <input type="checkbox" id="compare" name="compare" value="free">
                                            <label for="compare">Compare Products</label>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @if (!empty($products))
                                    @foreach ($products as $item)
                                        <div class="automotive-card auto-bg" data-aos="fade-up" data-aos-duration="1000">
                                            <div class="auto-choice-card">
                                                <div class="auto-choice-hd">
                                                    <div class="inn_sl_hed">
                                                        <div class="sli_img choice_img">
                                                            <img class="slider_img"
                                                                src="{{ asset('ProductImage/') . '/' . $item['product_image'] }}"
                                                                alt="">
                                                        </div>
                                                        <div class="sl_h">
                                                            <div class="inn_h">
                                                                <div class="sl_main">
                                                                    <h6 class="head">{{ $item['name'] }}</h6>
                                                                    <div class="wishlist">
                                                                        <a href="#" class="heart-container"
                                                                            tabindex="0">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tp-btm d-flex flex-col-mob">
                                                                <div class="inn_ul">

                                                                    <div class="tab_star_li">
                                                                        <span class="rating-on rate-1"
                                                                            data-rating="1"></span>
                                                                        <span class="rating-on rate-2"
                                                                            data-rating="2"></span>
                                                                        <span class="rating-on rate-3"
                                                                            data-rating="3"></span>
                                                                        <span class="rating-on rate-4"
                                                                            data-rating="4"></span>
                                                                        <span class="rating-on rate-5"
                                                                            data-rating="5"></span>

                                                                    </div>
                                                                    <div><i class="fa-solid fa-angle-down"></i>
                                                                    </div>

                                                                </div>
                                                                <div class="rate_box">
                                                                    5.0 | 124 ratings
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="auto-choice-btn">
                                                        <a href="{{ $item['product_link'] }}" class="cta cta_orange">
                                                            Visit Website
                                                            <div class="right-arw">
                                                                <i class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="text-choice">
                                                    <p>
                                                        {!! $item['description'] !!}
                                                    </p>
                                                    <a href="javascript:void(0)">Read More</a>
                                                </div>
                                                <div class="key-feature-price d-flex">
                                                    <div class="choice-key-features">
                                                        <h6>Key Features</h6>
                                                        <ul class="list-unstyled key-fea-lst">
                                                            @if (!empty($item['product_features']))
                                                                @foreach ($item['product_features'] as $value)
                                                                    <li class="d-flex align-items-center">
                                                                        <div class="grn_chk">
                                                                            <img src="{{ asset('front/img/tick-img.png') }}"
                                                                                alt="">
                                                                        </div>
                                                                        <p class="m-0">{!! $value['feature_translation']['name'] !!}</p>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="starting-price">
                                                        <h6 class="m-0">Starting Price</h6>
                                                        <p class="m-0"><span>{{ $item['product_price'] }}</span>/Month
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blue-chkbox">
                                                <input type="checkbox" id="compare" name="compare" value="free">
                                                <label for="compare">Compare Products</label>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="automotive-pagination" data-aos="fade-up" data-aos-duration="1000">
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <li class="page-item pagi-btn disabled"><a class="page-link"><i
                                                            class="fa-solid fa-chevron-left"></i></a></li>
                                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
                                                </li>
                                                <li class="page-item " aria-current="page"><a class="page-link"
                                                        href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">6</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="javascript:void(0)">7</a>
                                                </li>
                                                <li class="page-item pagi-btn"> <a class="page-link" href="javascript:void(0)"><i
                                                            class="fa-solid fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                @endif
                            @endif
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
                    <img src="{{asset('front/img/subs.png')}}">
                </div>
                <h2 data-aos="fade-up" data-aos-duration="1000">Top-rated Products of 2024</h2>
                <p data-aos="fade-up" data-aos-duration="1000">Fill out the form and we'll send a list of the top-rated
                    software based on real user reviews
                    directly to your inbox.
                </p>
                <div class="mail_field" data-aos="fade-up" data-aos-duration="1000">
                    <div class="email_box">
                        <input type="email" id="email" name="email" placeholder="Email Address*">
                    </div>
                    <div class="accor-btn sbs_bttn">
                        <a href="javascript:void(0)" class="cta cta_white">Subscribe</a>
                    </div>
                </div>
                <p data-aos="fade-up" data-aos-duration="1000">By proceeding, you agree to our <span
                        class="big-bld">Terms
                        Of Use</span> and <span class="big-bld">Privacy Policy.</span></p>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const isLoggedIn = @json(auth()->check());
        $(document).ready(function() {
            let hearts = $('.heart-container');
            $('.heart-container').click(function() {
                let id = $(this).data('id');
                console.log(id);
                if (!isLoggedIn) {
                    return
                }
                wishlist(id);
            });
        });

        function wishlist(id) {
            $.ajax({
                url: "{{ url(app()->getLocale() . '/wishlist') }}",
                type: "Post",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },

                success: function(response) {
                    if (response.info) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Info',
                            text: response.info,
                            position: 'top-right',
                            toast: true,
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    } else if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.success,
                            position: 'top-right',
                            toast: true,
                            showConfirmButton: false,
                            timer: 3000,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'An unexpected error occurred';

                    try {
                        const response = JSON.parse(xhr.responseText);
                        if (response.error) {
                            errorMessage = response.error;
                        }
                    } catch (e) {
                        errorMessage = 'Failed to parse error response';
                    }
                    $('#message').text(errorMessage);

                }

            });
        }
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

            $('#slider-1').on('input', debounce(function() {
                minPrice = $(this).val();
                $('#range1').text(minPrice);
                fetchProducts(searchQuery, minPrice, maxPrice);
            }, 500));

            $('#slider-2').on('input', debounce(function() {
                maxPrice = $(this).val();
                $('#range2').text(maxPrice);
                fetchProducts(searchQuery, minPrice, maxPrice);
            }, 500));

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

                            const keyFeatures = productRelationData ? productRelationData.keyFeatures :
                                [];

                            const productName = (product.translations && product.translations[0] &&
                                product.translations[0].name) || product.name;

                            const productDescription = (product.translations && product.translations[
                                0] && product.translations[0].description) || product.description;

                            const averageRating = (product.average_rating);

                            const formattedRating = averageRating.toFixed(1);

                            const roundedRating = Math.round(averageRating);

                            function generateRatingStars(roundedRating) {
                                let stars = '';
                                for (let i = 1; i <= 5; i++) {
                                    // const ratingClass = i <= roundedRating ? 'rating-on' : 'rating-off';
                                    // stars += `<span class="${ratingClass} rate-${i}" data-rating="${i}"></span>`;

                                    const starColor = i <= roundedRating ? '#FF9D28' : '#D9D9D9';
                                    stars +=
                                        `<span class="fa-solid fa-star" style="color: ${starColor}" data-rating="${i}"></span>`;
                                }
                                return stars;
                            }
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
                                                    ${isLoggedIn
                                                        ? `<a href="javascript:void(0)" class="heart-container" data-id="${product.id}" tabindex="0"></a>`
                                                        : `<a href="/login" class="heart-container" data-id="${product.id}" tabindex="0"></a>`
                                                    }
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tp-btm d-flex flex-col-mob">
                                                <div class="inn_ul">
                                                    <div class="tab_star_li">
                                                       ${generateRatingStars(roundedRating)}
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-angle-down"></i>
                                                    </div>
                                                </div>
                                                <div class="rate_box">
                                                    ${formattedRating || ''} | ${product.reviews_count || ''} ${topProductContents['rating'] || ''}
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
                        $('.heart-container').click(function() {
                            let id = $(this).data('id');
                            if (!isLoggedIn) {
                                return
                            }
                            wishlist(id);
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
