@extends('user_layout.master')
{{-- {{ dd($translated_data) }} --}}



@section('content')
    <!-- new html -->
    <style>
        .trust-brnd-marque {
            white-space: nowrap;
            overflow: hidden;
            width: 100%;
        }

        .marq-innr {
            display: inline-block;
            padding-right: 20px;
            animation: marquee 10s linear infinite;

        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* add scroller on front side country */
        ul.options {
            overflow-y: scroll;
            height: 20vh;
            width: 227px !important;
        }
    </style>
    <section class="banner_sec dark" style="background-color: #003F7D;">
        <div class="bubble-wrp">
            <?php
                $headerBackgroundImage = $homeContantImages->get('header_background_img');
                $headerImage = $homeContantImages->get('header_img');
                $trustedBrandImages = $homeContantImages->get('trusted_brands_img');
                $aiLeftImage = $homeContantImages->get('ai_section_left_img');
                $aiRightImage = $homeContantImages->get('ai_section_right_img');
                $findToolRightImage = $homeContantImages->get('find_tool_right_img');
                $findToolLeftImage = $homeContantImages->get('find_tool_left_img');
                $verifiedImage = $homeContantImages->get('user_reviews_img');
                $featureImage = $homeContantImages->get('price_compare_img');
                $indepentImage = $homeContantImages->get('independent_img');
                $reviewRightImage = $homeContantImages->get('review_section_right_img');
                $reviewLeftImage = $homeContantImages->get('review_section_left_img');
                $aiImage = $homeContantImages->get('ai_send_img');
            
            ?>
            @if (isset($headerBackgroundImage))
                <img src="{{ asset($headerBackgroundImage->meta_value) }}" alt="{{ $headerBackgroundImage->meta_key }}">
            @else
                <img src="{{ asset('front/img/bnnr-bg.png') }}" alt="">
            @endif
        </div>
        <div class="banner_content">
            <div class="container">
                <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="banner_text_col">
                        <div class="banner_content_inner">
                            <h1>{{ $homeContents['header_title'] ?? null }}</h1>
                            <p>{{ $homeContents['header_description'] ?? null }}</p>
                            <div class="search-bar-wrp">
                                <div class="search-box">
                                    <input type="text" placeholder="{{ $homeContents['placeholder_text'] ?? null }}">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner_image_col">
                        <div class="banner_image">
                            @if (isset($headerImage))
                                <img src="{{ asset($headerImage->meta_value) }}" alt="{{ $headerImage->meta_key }}">
                            @else
                                <img src="{{ asset('front/img/banner_image.png') }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end  -->
    <!-- section trusted brands marquee -->
    <section class="trusted-brands">
        <div class="container">
            <div class="trst-brnd-wrp">
                <div class="brnd-wrp-lft">
                    <p class="m-0 brnd-p-txt">
                        {{ $homeContents['trusted_brands_text'] ?? null }}
                    </p>
                </div>

                <div class="trust-brnd-marque">
                    @if (isset($trustedBrapPndImages))
                        @php
                            $imageIds = json_decode($trustedBrandImages->meta_value);
                        @endphp
                        @if (is_array($imageIds))
                            @foreach ($imageIds as $imageId)
                                @php
                                    $media = \App\Models\HomeContentMedia::find($imageId);
                                @endphp
                                <div class="marq-innr">
                                    <img src="{{ asset($media->file_path) }}" alt="{{ $media->meta_key }}">
                                </div>
                            @endforeach
                        @else
                            <img src="{{ asset($trustedBrandImages->meta_value) }}"
                                alt="{{ $trustedBrandImages->meta_key }}" style="width: 100px; height: auto;">
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- section most-popular -->

    <section class="most-populr-sec light p_120 pb-0">
        <div class="container">
            <div class="most-popular-wrp" data-aos="fade-up" data-aos-duration="1000">
                <div class="most_hed">
                    <h2 class="text-center">
                        <h2 class="text-center">{{ $homeContents['most_popular'] ?? null }}</h2>
                    </h2>
                </div>

                <div class="popular-accordion-wrp">
                    <div class="accordion" id="accordionExample">
                        @foreach ($translated_data as $key => $value)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapse{{ $key }}">
                                        <div class="accor-img">
                                            <img src="{{ asset('front/img/accordion-img1.png') }}" alt="">
                                        </div> {{ $value['name'] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                                    aria-labelledby="" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-bdy-wrp">
                                            <div class="accor-bdy-hd">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="accor-lft-img">
                                                            <img src="{{ asset('front/img/accor-bdy-img.png') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="accor-txt-contnt">
                                                            {!! $value['description'] !!}
                                                            <div class="accor-btn">
                                                                <a href=""
                                                                    class="cta cta_white">{{ $homeContents['campare_business'] ?? null }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accor-bdy-btm">
                                                <div class="row accor-bdy-row">
                                                    <div class="col-lg-4">
                                                        <div class="review_card light top-rate-card">
                                                            <div class="inner_box_silder  top-rate-innr ">
                                                                <div class="inn_sl_hed mst_hdn">
                                                                    <div class="sli_img">
                                                                        <img class="slider_img"
                                                                            src="{{ asset('front/img/slider1_img.svg') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="sl_h">
                                                                        <div class="inn_h">
                                                                            <div class="sl_main">
                                                                                <h6 class="head">Xero</h6>
                                                                                <div class="wishlist">
                                                                                    <a href="#"
                                                                                        class="heart-container">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tp-btm d-flex">
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
                                                                            <div class="rate_box">5.0 | 124 ratings</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="slider_content_sec">
                                                                    <div class="content_para"> Lorem Ipsum has been the
                                                                        industry's standard
                                                                        dummy text ever since the 1500s, when an unknown
                                                                        printer
                                                                        took a
                                                                        galley of type and scrambled it to make a type
                                                                        specimen
                                                                        book. </div>
                                                                    <div class="view-more-btn">
                                                                        <a href="" class="">Read More</a>
                                                                    </div>
                                                                </div>
                                                                <div class="top-pro-box">
                                                                    <div class="top-pro-btn ">
                                                                        <a href=""
                                                                            class="cta cta_orange d-flex align-items-center">
                                                                            {{ $homeContents['visit_website'] ?? null }}
                                                                            <div class="right-arw">
                                                                                <i class="fa-solid fa-arrow-right"></i>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="review_card light top-rate-card center-card-pack">
                                                            <div class="inner_box_silder  top-rate-innr ">
                                                                <div class="best-value">
                                                                    <p> <img src="img/star.png" alt="">BEST VALUE
                                                                    </p>
                                                                </div>
                                                                <div class="inn_sl_hed mst_hdn mt-4">
                                                                    <div class="sli_img">
                                                                        <img class="slider_img"
                                                                            src="{{ asset('front/img/slider2_img.svg') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="sl_h">
                                                                        <div class="inn_h">
                                                                            <div class="sl_main">
                                                                                <h6 class="head">Xero</h6>
                                                                                <div class="wishlist">
                                                                                    <a href="#"
                                                                                        class="heart-container">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tp-btm d-flex">
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
                                                                            <div class="rate_box">5.0 | 124 ratings</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="slider_content_sec">
                                                                    <div class="content_para"> Lorem Ipsum has been the
                                                                        industry's standard
                                                                        dummy text ever since the 1500s, when an unknown
                                                                        printer
                                                                        took a
                                                                        galley of type and scrambled it to make a type
                                                                        specimen
                                                                        book. </div>
                                                                    <div class="view-more-btn">
                                                                        <a href="" class="">Read More</a>
                                                                    </div>
                                                                </div>
                                                                <div class="top-pro-box">
                                                                    <div class="top-pro-btn ">
                                                                        <a href=""
                                                                            class="cta cta_orange d-flex align-items-center">
                                                                            {{ $homeContents['visit_website'] ?? null }}
                                                                            <div class="right-arw">
                                                                                <i class="fa-solid fa-arrow-right"></i>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="review_card light top-rate-card">
                                                            <div class="inner_box_silder  top-rate-innr ">
                                                                <div class="inn_sl_hed mst_hdn">
                                                                    <div class="sli_img">
                                                                        <img class="slider_img"
                                                                            src="{{ asset('front/img/slider3_img.svg') }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="sl_h">
                                                                        <div class="inn_h">
                                                                            <div class="sl_main">
                                                                                <h6 class="head">Xero</h6>
                                                                                <div class="wishlist">
                                                                                    <a href="#"
                                                                                        class="heart-container">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tp-btm d-flex">
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
                                                                            <div class="rate_box">5.0 | 124 ratings</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="slider_content_sec">
                                                                    <div class="content_para"> Lorem Ipsum has been the
                                                                        industry's standard
                                                                        dummy text ever since the 1500s, when an unknown
                                                                        printer
                                                                        took a
                                                                        galley of type and scrambled it to make a type
                                                                        specimen
                                                                        book. </div>
                                                                    <div class="view-more-btn">
                                                                        <a href="" class="">Read More</a>
                                                                    </div>
                                                                </div>
                                                                <div class="top-pro-box">
                                                                    <div class="top-pro-btn ">
                                                                        <a href=""
                                                                            class="cta cta_orange d-flex align-items-center">
                                                                            {{ $homeContents['visit_website'] ?? null }}
                                                                            <div class="right-arw">
                                                                                <i class="fa-solid fa-arrow-right"></i>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- scetion exclusive deals -->

    <section class="xclusve-deal light p_120 pb-0">
        <div class="section_hed xclu-m">
            <div class="container">
                <div class="slider_h">
                    <div class="head_box">
                        <h2 class="text-center"> {{ $homeContents['exclusive_deals'] ?? null }}</h2>
                    </div>
                    <div class="review_box text-right revw-width">
                        <a class="cta cta_white" href="#"> {{ $homeContents['all_exclusive'] ?? null }}</a>
                        <!-- <a class="cta cta_white" href="#">All Exclusive deals</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="xclusve-wrp" data-aos="fade-up" data-aos-duration="1000">
                <div class="xclusve-slider">
                    <div class="xclusve-pack">
                        <div class="save">
                            <div class="save-txt">
                                <p class="size22">Save 30%</p>
                                <div class="save-img">
                                    <img src="{{ asset('front/img/save-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <a href="" class="">
                            <div class="xclusve-img">
                                <img src="{{ asset('front/img/xclusive-img1.png') }}" alt="">
                            </div>
                        </a>
                        <div class="xclusve-txt">
                            <a href="" class="">
                                <h3>Hostinger -Scalable hosting solutions for fast websites</h3>
                            </a>
                            <p class="grey-txt "><span class="line-through">$459</span><span
                                    class="orange-txt">$367</span>
                            </p>
                            <div class="xclu-txt-btn">
                                <a href="" class="cta cta_white">{{ $homeContents['get_this_deal'] ?? null }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-pack">
                        <div class="save">
                            <div class="save-txt">
                                <p class="size22">Save 30%</p>
                                <div class="save-img">
                                    <img src="{{ asset('front/img/save-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="xclusve-img">
                            <img src="{{ asset('front/img/xclusive-img2.png') }}" alt="">
                        </div>
                        <div class="xclusve-txt">
                            <h3>Namecheap -Budget-friendly hosting plans for every need</h3>
                            <p class="grey-txt"><span class="line-through">$459</span><span
                                    class="orange-txt">$367</span>
                            </p>
                            <div class="xclu-txt-btn">
                                <a href="" class="cta cta_white">{{ $homeContents['get_this_deal'] ?? null }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-pack">
                        <div class="save">
                            <div class="save-txt">
                                <p class="size22">Save 30%</p>
                                <div class="save-img">
                                    <img src="{{ asset('front/img/save-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="xclusve-img">
                            <img src="{{ asset('front/img/xclusive-img3.png') }}" alt="">
                        </div>
                        <div class="xclusve-txt">
                            <h3>IONOS -Fast and secure hosting to help your business grow</h3>
                            <p class="grey-txt"><span class="line-through">$459</span><span
                                    class="orange-txt">$367</span>
                            </p>
                            <div class="xclu-txt-btn">
                                <a href="" class="cta cta_white">{{ $homeContents['get_this_deal'] ?? null }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-pack">
                        <div class="save">
                            <div class="save-txt">
                                <p class="size22">Save 30%</p>
                                <div class="save-img">
                                    <img src="{{ asset('front/img/save-img.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="xclusve-img">
                            <img src="{{ asset('front/img/xclusive-img2.png') }}" alt="">
                        </div>
                        <div class="xclusve-txt">
                            <h3>Namecheap -Budget-friendly hosting plans for every need</h3>
                            <p class="grey-txt"><span class="line-through">$459</span><span
                                    class="orange-txt">$367</span>
                            </p>
                            <div class="xclu-txt-btn">
                                <a href="" class="cta cta_white">{{ $homeContents['get_this_deal'] ?? null }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>`
    <!-- section combined  smart search + top rated -->
    <section class="smart-combined p_120">
        <div class="combined-section-bg">
            <img src="{{ asset('front/img/two-sec-bg.png') }}" alt="">
        </div>
        <div class="container">
            <div class="smart-combined-wrp" data-aos="fade-up" data-aos-duration="1000">
                <!-- section smart search -->
                <div class="smart_search_section dark p_120 pt-0 ">
                    <div class="smart_search_inner">
                        <div class="smart_srch_content text-center size18">
                            <h2>{{ $homeContents['ai_title'] ?? null }}</h2>
                            <p class="smart-p">
                                {{ $homeContents['ai_description'] ?? null }}</p>
                            <div class="smrt-srch-inpt">
                                <textarea rows="3" placeholder="{{ $homeContents['ai_placeholder'] ?? null }}"></textarea>
                                <div class="input-btn">
                                    <button type="" class="">
                                        @if (isset($aiImage))
                                            <img src="{{ asset($aiImage->meta_value) }}" alt="">
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if (isset($aiLeftImage))
                            <div class="back-image1">
                                <img src="{{ asset($aiLeftImage->meta_value) }}" class="image-pattern1"
                                    alt="{{ $aiLeftImage->meta_key }}">
                            </div>
                        @endif
                        @if (isset($aiRightImage))
                            <div class="back-image2">
                                <img src="{{ asset($aiRightImage->meta_value) }}" class="image-pattern2"
                                    alt="{{ $aiRightImage->meta_key }}">
                            </div>
                        @endif
                    </div>
                </div>
                <!-- section top-rated -->
                <div class="top-rated-section light" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section_hed">
                        <div class="container">
                            <div class="slider_h">
                                <div class="head_box">
                                    <h2>{{ $homeContents['top_product'] ?? null }}</h2>
                                </div>
                                <div class="review_box text-right">
                                    <a class="cta cta_white"
                                        href="#">{{ $homeContents['all_top_product'] ?? null }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="top-rated-slider" data-aos="fade-up">
                                <div class="review_card light top-rate-card">
                                    <div class="inner_box_silder  top-rate-innr ">
                                        <div class="inn_sl_hed">
                                            <div class="sli_img">
                                                <img class="slider_img" src="{{ asset('front/img/top-rate-img1.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="sl_h">
                                                <div class="ot_wishlet">
                                                    <div class="inn_h">
                                                        <h6 class="head">Asana</h6>
                                                    </div>
                                                    <div class="wishlist">
                                                        <a href="#" class="heart-container">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tp-btm d-flex">
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
                                                    <div class="rate_box">5.0 | 124 ratings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider_content_sec">
                                            <div class="first_box">
                                                <p class="">1 of 232 <a href="">CRM Software</a></p>
                                            </div>
                                            <div class="content_para"> Lorem Ipsum has been the industry's standard dummy
                                                text ever
                                                since the 1500s, when an unknown printer took a galley. </div>
                                            <div class="view-more-btn">
                                                <a href="" class="">{{ __('home.view_more') }}</a>
                                            </div>
                                        </div>
                                        <div class="top-pro-box">
                                            <div class="top-pro-btn ">
                                                <a href="" class="cta cta_orange d-flex align-items-center">
                                                    {{ $homeContents['visit_website'] ?? null }}
                                                    <div class="right-arw">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="review_card light top-rate-card">
                                    <div class="inner_box_silder  top-rate-innr ">
                                        <div class="inn_sl_hed">
                                            <div class="sli_img">
                                                <img class="slider_img" src="{{ asset('front/img/top-rate-img2.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="sl_h">
                                                <div class="ot_wishlet">
                                                    <div class="inn_h">
                                                        <h6 class="head">Adobe Workfront</h6>
                                                    </div>
                                                    <div class="wishlist">
                                                        <a href="#" class="heart-container" tabindex="0">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tp-btm d-flex">
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
                                                    <div class="rate_box">5.0 | 124 ratings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider_content_sec">
                                            <div class="first_box">
                                                <p class="">1 of 232 <a href="">CRM Software</a></p>
                                            </div>
                                            <div class="content_para"> Lorem Ipsum has been the industry's standard dummy
                                                text ever
                                                since the 1500s, when an unknown printer took a galley. </div>
                                            <div class="view-more-btn">
                                                <a href="" class="">{{ __('home.view_more') }}</a>
                                            </div>
                                        </div>
                                        <div class="top-pro-box">
                                            <div class="top-pro-btn ">
                                                <a href="" class="cta cta_orange d-flex align-items-center">
                                                    {{ $homeContents['visit_website'] ?? null }}
                                                    <div class="right-arw">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="review_card light top-rate-card">
                                    <div class="inner_box_silder  top-rate-innr ">
                                        <div class="inn_sl_hed">
                                            <div class="sli_img">
                                                <img class="slider_img" src="{{ asset('front/img/bluf.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="sl_h">
                                                <div class="ot_wishlet">
                                                    <div class="inn_h">
                                                        <h6 class="head">Confluence</h6>
                                                    </div>
                                                    <div class="wishlist">
                                                        <a href="#" class="heart-container" tabindex="0">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tp-btm d-flex">
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
                                                    <div class="rate_box">5.0 | 124 ratings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider_content_sec">
                                            <div class="first_box">
                                                <p class="">1 of 232 <a href="">CRM Software</a></p>
                                            </div>
                                            <div class="content_para"> Lorem Ipsum has been the industry's standard dummy
                                                text ever
                                                since the 1500s, when an unknown printer took a galley. </div>
                                            <div class="view-more-btn">
                                                <a href="" class="">{{ __('home.view_more') }}</a>
                                            </div>
                                        </div>
                                        <div class="top-pro-box">
                                            <div class="top-pro-btn ">
                                                <a href="" class="cta cta_orange d-flex align-items-center">
                                                    {{ $homeContents['visit_website'] ?? null }}
                                                    <div class="right-arw">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="review_card light top-rate-card">
                                    <div class="inner_box_silder  top-rate-innr ">
                                        <div class="inn_sl_hed">
                                            <div class="sli_img">
                                                <img class="slider_img" src="{{ asset('front/img/sgbk.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="sl_h">
                                                <div class="ot_wishlet">
                                                    <div class="inn_h">
                                                        <h6 class="head">Sage Intacct</h6>
                                                    </div>
                                                    <div class="wishlist">
                                                        <a href="#" class="heart-container" tabindex="0">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tp-btm d-flex">
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
                                                    <div class="rate_box">5.0 | 124 ratings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider_content_sec">
                                            <div class="first_box">
                                                <p class="">1 of 232 <a href="">CRM Software</a></p>
                                            </div>
                                            <div class="content_para"> Lorem Ipsum has been the industry's standard dummy
                                                text ever
                                                since the 1500s, when an unknown printer took a galley. </div>
                                            <div class="view-more-btn">
                                                <a href="" class="">{{ __('home.view_more') }}</a>
                                            </div>
                                        </div>
                                        <div class="top-pro-box">
                                            <div class="top-pro-btn ">
                                                <a href="" class="cta cta_orange d-flex align-items-center">
                                                    {{ $homeContents['visit_website'] ?? null }}
                                                    <div class="right-arw">
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -------------------------------------------slider section start ------------------------------------->
    <section class="outer_slider dark p_120">
        <div class="section_hed" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="slider_h">
                    <div class="head_box">
                        <h2> {{ $homeContents['latest_reviews'] ?? null }}</h2>
                    </div>
                    <div class="review_box text-right">
                        <a class="cta cta_white" href="#">
                            {{ $homeContents['write_review'] ?? null }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="reviews_block" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="latest-reviews-slider reviews_slider  ">
                        <div class="review_card light">
                            <div class="inner_box_silder ">
                                <div class="inn_sl_hed">
                                    <div class="sli_img">
                                        <img class="slider_img" src="{{ asset('front/img/slider1_img.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h">
                                            <div class="sl_main">
                                                <h6 class="head">Xero</h6>
                                                <div class="wishlist">
                                                    <a href="#" class="heart-container">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-btm d-flex">
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
                                            <div class="rate_box">5.0 | 124 ratings</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_content_sec">
                                    <div class="first_box"> Impressive! </div>
                                    <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text
                                        ever
                                        since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a
                                        type specimen book. </div>
                                </div>
                                <div class="joh_box">
                                    <div class="joh_img">
                                        <img src="{{ asset('front/img/joh.png') }}" alt="">
                                    </div>
                                    <div class="joh_sec">
                                        <div class="joh_head"> John Doe </div>
                                        <div class="joh_pos"> Position Here </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_card light">
                            <div class="inner_box_silder ">
                                <div class="inn_sl_hed">
                                    <div class="sli_img">
                                        <img class="slider_img" src="{{ asset('front/img/slider2_img.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h">
                                            <div class="sl_main">
                                                <h6 class="head">odoo</h6>
                                                <div class="wishlist">
                                                    <a href="#" class="heart-container">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-btm d-flex">
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
                                            <div class="rate_box">5.0 | 124 ratings</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_content_sec">
                                    <div class="first_box"> Great </div>
                                    <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text
                                        ever
                                        since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a
                                        type specimen book. </div>
                                </div>
                                <div class="joh_box">
                                    <div class="joh_img">
                                        <img src="{{ asset('front/img/joh.png') }}" alt="">
                                    </div>
                                    <div class="joh_sec">
                                        <div class="joh_head"> John Doe </div>
                                        <div class="joh_pos"> Position Here </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_card light">
                            <div class="inner_box_silder ">
                                <div class="inn_sl_hed">
                                    <div class="sli_img">
                                        <img class="slider_img" src="{{ asset('front/img/slider3_img.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h">
                                            <div class="sl_main">
                                                <h6 class="head">BambooHR</h6>
                                                <div class="wishlist">
                                                    <a href="#" class="heart-container">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-btm d-flex">
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
                                            <div class="rate_box">5.0 | 124 ratings</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_content_sec">
                                    <div class="first_box"> Impressive! </div>
                                    <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text
                                        ever
                                        since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a
                                        type specimen book. </div>
                                </div>
                                <div class="joh_box">
                                    <div class="joh_img">
                                        <img src="{{ asset('front/img/joh.png') }}" alt="">
                                    </div>
                                    <div class="joh_sec">
                                        <div class="joh_head"> John Doe </div>
                                        <div class="joh_pos"> Position Here </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_card light">
                            <div class="inner_box_silder ">
                                <div class="inn_sl_hed">
                                    <div class="sli_img">
                                        <img class="slider_img" src="{{ asset('front/img/slider2_img.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h">
                                            <div class="sl_main">
                                                <h6 class="head">odoo</h6>
                                                <div class="wishlist">
                                                    <a href="#" class="heart-container">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp-btm d-flex">
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
                                            <div class="rate_box">5.0 | 124 ratings</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_content_sec">
                                    <div class="first_box"> Great </div>
                                    <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text
                                        ever
                                        since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a
                                        type specimen book. </div>
                                </div>
                                <div class="joh_box">
                                    <div class="joh_img">
                                        <img src="{{ asset('front/img/joh.png') }}" alt="">
                                    </div>
                                    <div class="joh_sec">
                                        <div class="joh_head"> John Doe </div>
                                        <div class="joh_pos"> Position Here </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -------------------------------------------slider section end ------------------------------------->
    <!----------------------------------------- read section start --------------------------------------- -->
    <section class="read_sec_outer light p_120">
        <div class="section_hed" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="slider_h">
                    <div class="head_box">
                        <h2>{{ $homeContents['read_article'] ?? null }}</h2>
                    </div>
                    <div class="review_box text-right">
                        <a class="cta cta_white" href="#">
                            {{ $homeContents['view_all_article'] ?? null }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="read_content_sec light" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <a href="#" class="in_cont_box">
                            <div class="read_img">
                                <div class="blog_thumb"><img class="r_img" src="{{ asset('front/img/read_img1.png') }}"
                                        alt=""></div>
                            </div>
                            <div class="read_content_in">
                                <div class="read_cont_h">
                                    <h3 class="read_text">Lorem Ipsum has been the industry's standard
                                    </h3>
                                </div>
                                <div class="read_para">
                                    <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        an
                                        unknown printer took a galley. </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="#" class="in_cont_box">
                            <div class="read_img">
                                <div href="#" class="blog_thumb"><img class="r_img"
                                        src="{{ asset('front/img/read_img2.png') }}" alt=""></div>
                            </div>
                            <div class="read_content_in">
                                <div class="read_cont_h">
                                    <h3 class="read_text">Lorem Ipsum has been the industry's standard
                                    </h3>
                                </div>
                                <div class="read_para">
                                    <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        an
                                        unknown printer took a galley. </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="#" class="in_cont_box">
                            <div class="read_img">
                                <div href="#" class="blog_thumb"><img class="r_img"
                                        src="{{ asset('front/img/read_img3.png') }}" alt=""></div>
                            </div>
                            <div class="read_content_in">
                                <div class="read_cont_h">
                                    <h3 class="read_text">Lorem Ipsum has been the industry's standard
                                    </h3>
                                </div>
                                <div class="read_para">
                                    <p> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                        an
                                        unknown printer took a galley. </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section right-tool -->
    <section class="right_tool_sec dark p_80">
        <div class="container">
            <div class="right-tool-wrp text-center" data-aos="fade-up" data-aos-duration="1000">
                <div class="otr_rgtool">
                    <h2>{{ $homeContents['find_tool'] ?? null }}<h2>
                </div>
                <div class="right-tool-pack">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="tool-card">
                                <div class="tool-card-img">
                                    @if (isset($verifiedImage))
                                        <img src="{{ asset($verifiedImage->meta_value) }}" alt="">
                                    @endif

                                    <!-- <img src="{{ asset('front/img/right-tool-img1.png') }}" alt=""> -->
                                </div>
                                <div class="tool-crd-bdy">
                                    <h3 class="tool_hed">{{ $homeContents['verify_user_review'] ?? null }}</h3>
                                    <p class="size18">{{ $homeContents['verify_review_description'] ?? null }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tool-card">
                                <div class="tool-card-img">

                                    @if (isset($featureImage))
                                        <img src="{{ asset($featureImage->meta_value) }}" alt="">
                                    @else
                                        <img src="{{ asset('front/img/right-tool-img2.png') }}" alt="">
                                    @endif
                                    <!-- <img src="{{ asset('front/img/right-tool-img2.png') }}" alt=""> -->
                                </div>
                                <div class="tool-crd-bdy">
                                    <h3 class="tool_hed">{{ $homeContents['feature_price'] ?? null }}</h3>
                                    <p class="size18">
                                        {{ $homeContents['feature_price_description'] ?? null }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tool-card">
                                <div class="tool-card-img">
                                    @if (isset($indepentImage))
                                        <img src="{{ asset($indepentImage->meta_value) }}" alt="">
                                    @endif
                                    <!-- <img src="{{ asset('front/img/right-tool-img3.png') }}" alt=""> -->
                                </div>
                                <div class="tool-crd-bdy">
                                    <h3 class="tool_hed"> {{ $homeContents['independent'] ?? null }}</h3>
                                    <p class="size18">{{ $homeContents['independent_description'] ?? null }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-tool-btn text-center">
                    <a href="" class="cta">
                        {{ $homeContents['get_button_lable'] ?? null }}
                    </a>
                </div>
            </div>
        </div>

        <div class="back-image1">
            @if (isset($findToolLeftImage))
                <img src="{{ asset($findToolLeftImage->meta_value) }}" class="image-pattern1"
                    alt="{{ $findToolLeftImage->meta_key }}">
            @endif
            <!-- <img src="{{ asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt=""> -->
        </div>
        <div class="back-image2">
            @if (isset($findToolRightImage))
                <img src="{{ asset($findToolRightImage->meta_value) }}" class="image-pattern2"
                    alt="{{ $findToolRightImage->meta_key }}">
            @endif
            <!-- <img src="{{ asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt=""> -->
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.trust-brnd-marque').marquee({
                duration: 5000,
                gap: 20
            });
        });
    </script>
@endsection
