@extends('user_layout.master')
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
</style>
<section class="banner_sec dark" style="background-color: #003F7D;">
    <div class="bubble-wrp">
        <?php
            $homeContantImages = \App\Models\HomeContent::where('lang_code','en')
                  ->whereIn('meta_key',
                  ['header background image','header image','trusted brands image','ai section left image','ai section right image','find tool right image','find tool left image','verified user reviews image','feature price image','independent image'])
                  ->get();
            $headerBackgroundImage = $homeContantImages->where('meta_key','header background image')->first();
            $headerImage           = $homeContantImages->where('meta_key','header image')->first();
            $trustedBrandImages = $homeContantImages->where('meta_key','trusted brands image')->first();
       
            $aiLeftImage = $homeContantImages->where('meta_key','ai section left image')->first();
            $aiRightImage = $homeContantImages->where('meta_key','ai section right image')->first();
            $findToolRightImage = $homeContantImages->where('meta_key','find tool right image')->first();
            $findToolLeftImage = $homeContantImages->where('meta_key','find tool left image')->first();
            $verifiedImage = $homeContantImages->where('meta_key','verified user reviews image')->first();

            $featureImage = $homeContantImages->where('meta_key','feature price image')->first();
            $indepentImage = $homeContantImages->where('meta_key','independent image')->first();
            
         ?>
        @if(isset($headerBackgroundImage))
        <img src="{{ asset($headerBackgroundImage->meta_value) }}" alt="{{ $headerBackgroundImage->meta_key }}">
        @else
        <img src="{{asset('front/img/bnnr-bg.png')}}" alt="">
        @endif
    </div>
    <div class="banner_content">
        <div class="container">
            <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                <div class="banner_text_col">
                    <div class="banner_content_inner">
                        <h1>{{__('home.home_page_heading')}}</h1>
                        <p>{{ __('home.home_page_header_description') }}</p>
                        <div class="search-bar-wrp">
                            <div class="search-box">
                                <input type="text" placeholder="{{__('home.home_page_search_placeholder')}}">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_image_col">
                    <div class="banner_image">
                        @if(isset($headerImage))
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
                    {{__('home.trusted_brands_text')}}
                </p>
            </div>

            <div class="trust-brnd-marque">
                @if(isset($trustedBrandImages))
                @php
                $imageIds = json_decode($trustedBrandImages->meta_value);
                @endphp
                @if(is_array($imageIds))
                @foreach($imageIds as $imageId)
                @php
                $media = \App\Models\HomeContentMedia::find($imageId);
                @endphp
                <div class="marq-innr">
                    <img src="{{ asset($media->file_path) }}" alt="{{ $media->meta_key }}">
                </div>
                @endforeach
                @else
                <img src="{{ asset($trustedBrandImages->meta_value) }}" alt="{{ $trustedBrandImages->meta_key }}"
                    style="width: 100px; height: auto;">
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
                    <h2 class="text-center">{{ __('home.most_popular_text')}}</h2>
                </h2>
            </div>
            <div class="popular-accordion-wrp">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="accor-img">
                                    <img src="{{ asset('front/img/accordion-img1.png') }}" alt="">
                                </div> Business Software
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="accordion-bdy-wrp">
                                    <div class="accor-bdy-hd">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="accor-lft-img">
                                                    <img src="{{asset('front/img/accor-bdy-img.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="accor-txt-contnt">
                                                    <h3>Lorem Ipsum has been the industry's standard dummy</h3>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever
                                                        since the
                                                        1500s, when an unknown printer took a galley of type and
                                                        scrambled it to
                                                        make a type specimen book, It has survived not only five
                                                        centuries, but
                                                        also the leap into electronic typesetting. </p>
                                                    <div class="accor-btn">
                                                        <a href="" class="cta cta_white">Compare Business Software</a>
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
                                                                    src="{{asset('front/img/slider1_img.svg') }}"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                                                            <p> <img src="img/star.png" alt="">BEST VALUE</p>
                                                        </div>
                                                        <div class="inn_sl_hed mst_hdn mt-4">
                                                            <div class="sli_img">
                                                                <img class="slider_img"
                                                                    src="{{asset('front/img/slider2_img.svg') }}"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                                                                    src="{{asset('front/img/slider3_img.svg') }}"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="accor-img">
                                    <img src="{{asset('front/img/accordion-img2.png') }}" alt="">
                                </div> Marketing & Sales
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="accordion-bdy-wrp">
                                    <div class="accor-bdy-hd">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="accor-lft-img">
                                                    <img src="{{asset('front/img/accor-bdy-img.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="accor-txt-contnt">
                                                    <h3>Lorem Ipsum has been the industry's standard dummy</h3>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever
                                                        since the
                                                        1500s, when an unknown printer took a galley of type and
                                                        scrambled it to
                                                        make a type specimen book, It has survived not only five
                                                        centuries, but
                                                        also the leap into electronic typesetting. </p>
                                                    <div class="accor-btn">
                                                        <a href="" class="cta cta_white">Compare Business Software</a>
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
                                                                    src="{{asset('front/img/slider1_img.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="sl_h">
                                                                <div class="inn_h">
                                                                    <div class="sl_main">
                                                                        <h6 class="head">Xero</h6>
                                                                        <div class="wishlist">
                                                                            <a href="">
                                                                                <div class="right-arw">
                                                                                    <img src="img/right-arrw.svg"
                                                                                        alt="">
                                                                                </div>
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                                                            <p> <img src="{{asset('front/img/star.png') }}" alt="">BEST
                                                                VALUE</p>
                                                        </div>
                                                        <div class="inn_sl_hed mst_hdn mt-4">
                                                            <div class="sli_img">
                                                                <img class="slider_img"
                                                                    src="{{asset('front/img/slider2_img.svg') }}"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                                                                <img class="slider_img" src="img/slider3_img.png"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="accor-img">
                                    <img src="{{asset('front/img/accordion-img3.png') }}" alt="">
                                </div> Finance & Accounting
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="accordion-bdy-wrp">
                                    <div class="accor-bdy-hd">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="accor-lft-img">
                                                    <img src="{{asset('front/img/accor-bdy-img.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="accor-txt-contnt">
                                                    <h3>Lorem Ipsum has been the industry's standard dummy</h3>
                                                    <p>Lorem Ipsum has been the industry's standard dummy text ever
                                                        since the
                                                        1500s, when an unknown printer took a galley of type and
                                                        scrambled it to
                                                        make a type specimen book, It has survived not only five
                                                        centuries, but
                                                        also the leap into electronic typesetting. </p>
                                                    <div class="accor-btn">
                                                        <a href="" class="cta cta_white">Compare Business Software</a>
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
                                                                    src="{{asset('front/img/slider1_img.png') }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="sl_h">
                                                                <div class="inn_h">
                                                                    <div class="sl_main">
                                                                        <h6 class="head">Xero</h6>
                                                                        <div class="wishlist">
                                                                            <a href="">
                                                                                <div class="right-arw">
                                                                                    <img src="img/right-arrw.svg"
                                                                                        alt="">
                                                                                </div>
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                                                            <p> <img src="{{asset('front/img/star.png') }}" alt="">BEST
                                                                VALUE</p>
                                                        </div>
                                                        <div class="inn_sl_hed mst_hdn mt-4">
                                                            <div class="sli_img">
                                                                <img class="slider_img"
                                                                    src="{{asset('front/img/slider2_img.svg') }}"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                                                                <img class="slider_img" src="img/slider3_img.png"
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
                                                                dummy text ever since the 1500s, when an unknown printer
                                                                took a
                                                                galley of type and scrambled it to make a type specimen
                                                                book. </div>
                                                            <div class="view-more-btn">
                                                                <a href="" class="">Read More</a>
                                                            </div>
                                                        </div>
                                                        <div class="top-pro-box">
                                                            <div class="top-pro-btn ">
                                                                <a href=""
                                                                    class="cta cta_orange d-flex align-items-center">
                                                                    {{ __('home.visit_website' )}}
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
                    <h2 class="text-center">{{ __('home.exclusive_deals_text' )}}</h2>
                </div>
                <div class="review_box text-right revw-width">
                    <a class="cta cta_white" href="#">{{ __('home.all_exclusive_lable' )}}</a>
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
                                <img src="{{asset('front/img/save-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <a href="" class="">
                        <div class="xclusve-img">
                            <img src="{{asset('front/img/xclusive-img1.png') }}" alt="">
                        </div>
                    </a>
                    <div class="xclusve-txt">
                        <a href="" class="">
                            <h3>Hostinger -Scalable hosting solutions for fast websites</h3>
                        </a>
                        <p class="grey-txt "><span class="line-through">$459</span><span class="orange-txt">$367</span>
                        </p>
                        <div class="xclu-txt-btn">
                            <a href="" class="cta cta_white">{{ __('home.get_deal_lable') }}</a>
                        </div>
                    </div>
                </div>
                <div class="xclusve-pack">
                    <div class="save">
                        <div class="save-txt">
                            <p class="size22">Save 30%</p>
                            <div class="save-img">
                                <img src="{{asset('front/img/save-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-img">
                        <img src="{{asset('front/img/xclusive-img2.png') }}" alt="">
                    </div>
                    <div class="xclusve-txt">
                        <h3>Namecheap -Budget-friendly hosting plans for every need</h3>
                        <p class="grey-txt"><span class="line-through">$459</span><span class="orange-txt">$367</span>
                        </p>
                        <div class="xclu-txt-btn">
                            <a href="" class="cta cta_white">{{ __('home.get_deal_lable') }}</a>
                        </div>
                    </div>
                </div>
                <div class="xclusve-pack">
                    <div class="save">
                        <div class="save-txt">
                            <p class="size22">Save 30%</p>
                            <div class="save-img">
                                <img src="{{asset('front/img/save-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-img">
                        <img src="{{asset('front/img/xclusive-img3.png') }}" alt="">
                    </div>
                    <div class="xclusve-txt">
                        <h3>IONOS -Fast and secure hosting to help your business grow</h3>
                        <p class="grey-txt"><span class="line-through">$459</span><span class="orange-txt">$367</span>
                        </p>
                        <div class="xclu-txt-btn">
                            <a href="" class="cta cta_white">{{ __('home.get_deal_lable') }}</a>
                        </div>
                    </div>
                </div>
                <div class="xclusve-pack">
                    <div class="save">
                        <div class="save-txt">
                            <p class="size22">Save 30%</p>
                            <div class="save-img">
                                <img src="{{asset('front/img/save-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-img">
                        <img src="{{asset('front/img/xclusive-img2.png') }}" alt="">
                    </div>
                    <div class="xclusve-txt">
                        <h3>Namecheap -Budget-friendly hosting plans for every need</h3>
                        <p class="grey-txt"><span class="line-through">$459</span><span class="orange-txt">$367</span>
                        </p>
                        <div class="xclu-txt-btn">
                            <a href="" class="cta cta_white">{{ __('home.get_deal_lable') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section combined  smart search + top rated -->
<section class="smart-combined p_120">
    <div class="combined-section-bg">
        <img src="{{asset('front/img/two-sec-bg.png') }}" alt="">
    </div>
    <div class="container">
        <div class="smart-combined-wrp" data-aos="fade-up" data-aos-duration="1000">
            <!-- section smart search -->
            <div class="smart_search_section dark p_120 pt-0 ">
                <div class="smart_search_inner">
                    <div class="smart_srch_content text-center size18">
                        <h2>{{ __('home.ai_search_title')}}</h2>
                        <p class="smart-p">
                            {{ __('home.ai_search_description') }}</p>
                        <div class="smrt-srch-inpt">
                            <textarea rows="3" placeholder="{{__('home.home_page_search_placeholder')}}"></textarea>
                            <div class="input-btn">
                                <button type="" class=""><img src="{{asset('front/img/btn-img.svg') }}" alt=""></button>
                            </div>
                        </div>
                    </div>
                    @if(isset($aiLeftImage->meta_key))
                    <div class="back-image1">
                        <img src="{{asset($aiLeftImage->meta_value) }}" class="image-pattern1"
                            alt="{{$aiLeftImage->meta_key}}">
                    </div>
                    @endif
                    @if(isset($aiRightImage->meta_key))
                    <div class="back-image2">
                        <img src="{{asset($aiRightImage->meta_value) }}" class="image-pattern2"
                            alt="{{$aiRightImage->meta_key}}">
                    </div>
                    @endif

                    <!-- <div class="back-image1">
                  <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt="">
               </div>
               <div class="back-image2">
                  <img src="{{asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt="">
               </div> -->
                </div>
            </div>
            <!-- section top-rated -->
            <div class="top-rated-section light" data-aos="fade-up" data-aos-duration="1000">
                <div class="section_hed">
                    <div class="container">
                        <div class="slider_h">
                            <div class="head_box">
                                <h2>{{ __('home.top_product_text') }}</h2>
                            </div>
                            <div class="review_box text-right">
                                <a class="cta cta_white" href="#">{{ __('home.all_product_lable')}}</a>
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
                                            <img class="slider_img" src="{{asset('front/img/top-rate-img1.svg') }}"
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
                                            <a href="" class="">{{__('home.view_more')}}</a>
                                        </div>
                                    </div>
                                    <div class="top-pro-box">
                                        <div class="top-pro-btn ">
                                            <a href="" class="cta cta_orange d-flex align-items-center">
                                                {{ __('home.visit_website' )}}
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
                                            <img class="slider_img" src="{{asset('front/img/top-rate-img2.svg') }}"
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
                                            <a href="" class="">{{__('home.view_more')}}</a>
                                        </div>
                                    </div>
                                    <div class="top-pro-box">
                                        <div class="top-pro-btn ">
                                            <a href="" class="cta cta_orange d-flex align-items-center">
                                                {{ __('home.visit_website' )}}
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
                                            <img class="slider_img" src="{{asset('front/img/bluf.svg') }}" alt="">
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
                                            <a href="" class="">{{__('home.view_more')}}</a>
                                        </div>
                                    </div>
                                    <div class="top-pro-box">
                                        <div class="top-pro-btn ">
                                            <a href="" class="cta cta_orange d-flex align-items-center">
                                                {{ __('home.visit_website' )}}
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
                                            <img class="slider_img" src="{{asset('front/img/sgbk.svg') }}" alt="">
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
                                            <a href="" class="">{{__('home.view_more')}}</a>
                                        </div>
                                    </div>
                                    <div class="top-pro-box">
                                        <div class="top-pro-btn ">
                                            <a href="" class="cta cta_orange d-flex align-items-center">
                                                {{ __('home.visit_website' )}}
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
                    <h2>{{__('home.latest_reviews_text')}}</h2>
                </div>
                <div class="review_box text-right">
                    <a class="cta cta_white" href="#">
                        {{__('home.write_review_lable')}}
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
                                    <img class="slider_img" src="{{asset('front/img/slider1_img.svg') }}" alt="">
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
                                <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a
                                    type specimen book. </div>
                            </div>
                            <div class="joh_box">
                                <div class="joh_img">
                                    <img src="{{asset('front/img/joh.png') }}" alt="">
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
                                    <img class="slider_img" src="{{asset('front/img/slider2_img.svg') }}" alt="">
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
                                <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a
                                    type specimen book. </div>
                            </div>
                            <div class="joh_box">
                                <div class="joh_img">
                                    <img src="{{asset('front/img/joh.png') }}" alt="">
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
                                    <img class="slider_img" src="{{asset('front/img/slider3_img.svg') }}" alt="">
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
                                <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a
                                    type specimen book. </div>
                            </div>
                            <div class="joh_box">
                                <div class="joh_img">
                                    <img src="{{asset('front/img/joh.png') }}" alt="">
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
                                    <img class="slider_img" src="{{asset('front/img/slider2_img.svg') }}" alt="">
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
                                <div class="content_para"> “Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a
                                    type specimen book. </div>
                            </div>
                            <div class="joh_box">
                                <div class="joh_img">
                                    <img src="{{asset('front/img/joh.png') }}" alt="">
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
                    <h2>{{__('home.read_article_text')}}</h2>
                </div>
                <div class="review_box text-right">
                    <a class="cta cta_white" href="#">
                        {{__('home.view_article_lable')}}
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
                            <div class="blog_thumb"><img class="r_img" src="{{asset('front/img/read_img1.png') }}"
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
                            <!-- <div class="box_footer">
                        <div class="more_read">
                           <a href="">Read More</a>
                        </div>
                     </div> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="#" class="in_cont_box">
                        <div class="read_img">
                            <div href="#" class="blog_thumb"><img class="r_img"
                                    src="{{asset('front/img/read_img2.png') }}" alt=""></div>
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
                            <!-- <div class="box_footer">
                        <div class="more_read">
                           <a href="">Read More</a>
                        </div>
                     </div> -->
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="#" class="in_cont_box">
                        <div class="read_img">
                            <div href="#" class="blog_thumb"><img class="r_img"
                                    src="{{asset('front/img/read_img3.png') }}" alt=""></div>
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
                            <!-- <div class="box_footer">
                        <div class="more_read">
                           <a href="">Read More</a>
                        </div>
                     </div> -->
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
                <h2>{{__('home.find_tool_text')}}<h2>
            </div>
            <div class="right-tool-pack">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="tool-card">
                            <div class="tool-card-img">
                                @if(isset($verifiedImage))
                                <img src="{{asset($verifiedImage->meta_value) }}" alt="">
                                @endif

                                <!-- <img src="{{asset('front/img/right-tool-img1.png') }}" alt=""> -->
                            </div>
                            <div class="tool-crd-bdy">
                                <h3 class="tool_hed">{{__('home.verified_user_reviews')}}</h3>
                                <p class="size18">{{__('home.read_real_feedback_from_verified_users')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tool-card">
                            <div class="tool-card-img">

                                @if(isset($featureImage))
                                <img src="{{asset($featureImage->meta_value) }}" alt="">
                                @else
                                <img src="{{asset('front/img/right-tool-img2.png') }}" alt="">
                                @endif
                                <!-- <img src="{{asset('front/img/right-tool-img2.png') }}" alt=""> -->
                            </div>
                            <div class="tool-crd-bdy">
                                <h3 class="tool_hed">{{__('home.feature_and_price_comparisons')}}</h3>
                                <p class="size18">
                                    {{__('home.easily_compare_software')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tool-card">
                            <div class="tool-card-img">
                                @if(isset($indepentImage))
                                <img src="{{asset($indepentImage->meta_value) }}" alt="">
                                @endif
                                <!-- <img src="{{asset('front/img/right-tool-img3.png') }}" alt=""> -->
                            </div>
                            <div class="tool-crd-bdy">
                                <h3 class="tool_hed"> {{__('home.independent_insights')}}</h3>
                                <p class="size18">{{__('home.access_unbiased_data_driven')}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-tool-btn text-center">
                <a href="" class="cta">
                    {{__('home.get_button_lable')}}
                </a>
            </div>
        </div>
    </div>

    <div class="back-image1">
        @if(isset($findToolLeftImage))
        <img src="{{ asset($findToolLeftImage->meta_value) }}" class="image-pattern1"
            alt="{{ $findToolLeftImage->meta_key }}">
        @endif
        <!-- <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt=""> -->
    </div>
    <div class="back-image2">
        @if(isset($findToolRightImage))
        <img src="{{ asset($findToolRightImage->meta_value) }}" class="image-pattern2"
            alt="{{ $findToolRightImage->meta_key }}">
        @endif
        <!-- <img src="{{asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt=""> -->
    </div>

</section>
<script type="text/javascript"></script>
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

</script>
@endsection