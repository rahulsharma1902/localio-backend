@extends('user_layout.master')
@section('content')


    <section class="product_sec">
        <div class="inner_banner_sec">
            <div class="container">
                <div class="inner_banr_content">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Automotive</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $result['name'] }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="asn_main_sec">
        <div class="asn_dv">
            <div class="container">
                <div class="asn_dv_contnt">
                    <div class="row frst_rw">
                        <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="ans_lft">
                                <div class="asn-img">
                                    <img src="{{ asset('ProductIcon/' . $result['product_icon']) }}" alt="Product Icon">

                                </div>
                                <div class="asn-rating">
                                    <div class="an_lkd">
                                        <h6 style="color: #000;">{{ $result['name'] }}</h6>
                                        <p class="wishlist">
                                            <a href=""><i class="fa-regular fa-heart"
                                                    style="color: #06498B ;"></i></a>
                                        </p>
                                    </div>
                                    <div class="rating light">
                                        <span class="rating-text size18">5.0</span>
                                        <div class="rating_str">
                                            <span><i class="fa fa-star"></i></span>
                                            <span> <i class="fa fa-star"></i></span>
                                            <span> <i class="fa fa-star"></i></span>
                                            <span> <i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                        </div>
                                        <span><i class="fa-solid fa-chevron-down"></i></span>
                                        <span>124 ratings</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="ans_ryt">
                                <div class="site_vsit">
                                    <ul class="list-unstyled">
                                        <li><a href="#" class="shr_icn">
                                                <img src="{{ asset('front/img/share-img.svg') }}" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="top-pro-btn tp_visit">
                                        <a href="{{ $result['product_link'] }}"
                                            class="cta cta_orange d-flex align-items-center" tabindex="0">
                                            Visit
                                            Website
                                            <div class="right-arw">
                                                <img src="{{ asset('front/img/right-arrw.svg') }}" alt="">
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
        <div class="container">
            <div class="lcl_text">
                <p class="sml_text">Localio provides independent research and reviews. We may earn affiliate
                    commissions. <a href="#" class="big-bld">Learn more</a>
                </p>
            </div>
            <div class="main_feture">
                <div class=" fetru_row d-flex justify-content-between" data-aos="fade-up" data-aos-duration="1000">
                    <div class="main_feature_lg">
                        <div class="feture_box lft_check_box size18">
                            <ul class="list-unstyled">
                                @if (!empty($result['product_features']))
                                    @foreach ($result['product_features'] as $value)
                                        @if ($value['feature_type'] == 'top_features')
                                        {{-- {{dd($value)}} --}}
                                            <li class="d-flex align-items-center">
                                                <span><img src="{{ asset('front/img/tik-mrk.svg') }}"
                                                        alt="tick mark"></span>
                                                <span>{{ $value['feature_translate']['name'] }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="d-flFex align-items-center">
                                        <span>Not Found</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="main_feature_lg">
                        <div class="feture_box">
                            <h6 class="size22 big-bld">Localio Review Breakdown</h6>
                            <ul class="pro-detail-bar-lst">
                                <li class="d-flex justify-content-between">
                                    <span>Ease of Use
                                    </span>
                                    <div class="prgs_br">
                                        <progress class="progress-bar" id="progress-bar-1" value="10" max="100">10
                                            %</progress>
                                        <output id="progress-output-1">1/5</output>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>
                                        Customer Service
                                    </span>
                                    <div class="prgs_br">
                                        <progress class="progress-bar" id="progress-bar-2" value="20" max="100">20
                                            %</progress>
                                        <output id="progress-output-2">2/5</output>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>
                                        Features
                                    </span>
                                    <div class="prgs_br">
                                        <progress class="progress-bar" id="progress-bar-3" value="30" max="100">30
                                            %</progress>
                                        <output id="progress-output-3">3/5</output>
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span>
                                        Value for Money
                                    </span>
                                    <div class="prgs_br">
                                        <progress class="progress-bar" id="progress-bar-4" value="100"
                                            max="100">100
                                            %</progress>
                                        <output id="progress-output-4">5/5</output>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main_feature_sm">
                        <div class="feture_box str_prc_box">
                            <div class="src_box">
                                <p class="big_text">Starting Price</p>
                                <h3 class="blue-text">${{ $result['product_price'] }}<span class="big_text">/ Month</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="main_feature_sm">
                        <div class="fre_trail feture_box size22">
                            <div class="grn_check_big">
                                <img src="{{ asset('front/img/new-grn-chk.svg') }}">
                            </div>
                            <h6 class="blue-text big-bld">Free Trial
                                Available
                            </h6>
                            <div class="accor-btn">
                                <a href="#" class="cta cta_white">Claim Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section whatis -->
    <section class="is-asana p_120  light">
        <div class="container">
            <div class="is-asana-wrp" data-aos="fade-up" data-aos-duration="1000">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="is-asana-lft">
                            <h3>What is {{ $result['name'] }}</h3>
                            <div class="is_text">
                                {!! $result['description'] !!}
                            </div>
                            <div class="read-more-txt" data-aos="fade-up" data-aos-duration="1000">
                                <a href="" class="">Read More</a>
                            </div>
                            <div class="asana-integration" data-aos="fade-up" data-aos-duration="1000">
                                <h6>Asana Integrations</h6>
                                <ul class="integrtion-lst">
                                    <li><img src="{{ asset('front/img/integration-list-img1.svg') }}" alt="">
                                        Adobe Workfront</li>
                                    <li><img src="{{ asset('front/img/integration-list-img2.svg') }}" alt="">
                                        Confluence</li>
                                    <li><img src="{{ asset('front/img/integration-list-img3.svg') }}" alt="">
                                        Sage Intacct</li>
                                    <li><img src="{{ asset('front/img/integration-list-img4.svg') }}"
                                            alt="">ThriveCart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="is-asana-rgt">
                            <div class="is-asan-slider">
                                <div class="asan-slider slider-for">
                                    <div class="asan-slider-inr"><img src="{{ asset('front/img/video-img.png') }}"
                                            alt=""></div>
                                    <div class="asan-slider-inr"><img src="{{ asset('front/img/video-img3.png') }}"
                                            alt=""></div>
                                    <div class="asan-slider-inr"><img src="{{ asset('front/img/video-img.png') }}"
                                            alt=""></div>
                                    <div class="asan-slider-inr"><img src="{{ asset('front/img/video-img3.png') }}"
                                            alt=""></div>
                                    <div class="asan-slider-inr"><img src="{{ asset('front/img/video-img.png') }}"
                                            alt=""></div>
                                </div>
                                <div class="asan-slider asan-slider-btm slider-nav">
                                    <div><img src="{{ asset('front/img/small-video-img.png') }}" alt=""></div>
                                    <div><img src="{{ asset('front/img/sm-video-img3.png') }}" alt=""></div>
                                    <div><img src="{{ asset('front/img/small-video-img.png') }}" alt=""></div>
                                    <div><img src="{{ asset('front/img/sm-video-img3.png') }}" alt=""></div>
                                    <div><img src="{{ asset('front/img/small-video-img.png') }}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section popular-altrnative -->
    <section class="populr-alternative p_120 light">
        <div class="container">
            <div class="populr-alter-wrp" data-aos="fade-up" data-aos-duration="1000">
                <h3 class="text-center">Compare With A Popular Alternative
                </h3>
                <div class="altr-wrp-inr-txt d-flex" data-aos="fade-up" data-aos-duration="1000">
                    <div class="altr-lft-div">
                        <div class="altr-mid-hd b_btm">
                        </div>
                        <ul class="list-unstyled  m-0">
                            <li class="b_btm h_80 fw_700">Starting Price</li>
                            <li class="b_btm h_80 fw_700">Pricing Options</li>
                            <li class="b_btm h_80 fw_700">Ease Of Use</li>
                            <li class="b_btm h_80 fw_700">Value For Money</li>
                            <li class="b_btm h_80 fw_700">Customer Service</li>
                            <li class="b_btm h_80 fw_700">Exclusives Services</li>
                        </ul>
                    </div>
                    <div class="altr-mid-div">
                        <div class="altr-mid-hd d-flex">
                            <div class="poplr-img">
                                <img src="{{ asset('front/img/poplr-zero.svg') }}" alt="">
                            </div>
                            <div class="poplr-txt">
                                <h6 class="fw_700 h6_26">Xero</h6>
                                <div class="tp-btm d-flex">
                                    <div class="inn_ul">
                                        <li>5.0</li>
                                        <li><img src="{{ asset('front/img/rew_star.png') }}" alt=""></li>
                                        <li><i class="fa-solid fa-angle-down"></i>
                                        </li>
                                    </div>
                                    <div class="rate_box">
                                        124 ratings
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="poplr-span-txt h_80">
                            <p class="m-0"><span>$19</span> /Month</p>
                        </div>
                        <div class="poplr-vrsion-trial h_80">
                            <ul class="list-unstyled d-flex m-0">
                                <li><img src="{{ asset('front/img/tik-mrk.svg') }}">Free Version</li>
                                <li><img src="{{ asset('front/img/tik-mrk.svg') }}">Free Trial</li>
                            </ul>
                        </div>
                        <div class="poplr-progress">
                            <ul class="list-unstyled m-0">
                                <li class=" h_80">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="100"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">5/5</output>
                                    </div>
                                </li>
                                <li class="h_80">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="80"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">4/5</output>
                                    </div>
                                </li>
                                <li class="h_80">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="60"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">3/5</output>
                                    </div>
                                </li>
                                <li class=" h_80">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="80"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">4/5</output>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="poplr-visit-btn">
                            <a href="javascript:void(0) " class="cta cta_orange d-flex align-items-center">
                                Visit Website
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.2647 5.84154C7.08595 5.84154 7.42894 5.84154 13.2205 5.84154C13.2304 5.81429 13.2403 5.78704 13.2403 5.75979C13.1017 5.6962 12.9631 5.63262 12.8245 5.55995C10.9435 4.62434 9.91386 3.14372 9.52775 1.25434C9.50795 1.18167 9.59705 1.09084 9.63665 1C9.72575 1.0545 9.86436 1.09992 9.89406 1.18167C10.0525 1.6086 10.1317 2.06278 10.3198 2.47154C11.1712 4.34275 12.6859 5.45095 14.8738 5.78704C15.0124 5.80521 15.1114 5.97779 15.25 6.0868C14.4778 6.32297 13.7947 6.45922 13.1908 6.72265C11.4286 7.49475 10.4089 8.82095 9.99306 10.5559C9.94356 10.7739 9.97326 11.11 9.51785 10.9647C9.87426 8.82095 10.6861 7.79451 13.3096 6.21397C13.0324 6.21397 12.8443 6.21397 12.6562 6.21397C7.20123 6.21397 7.18494 6.21397 1.7201 6.20488C1.5122 6.20488 1.1756 6.32297 1.2647 5.84154Z"
                                        fill="white" stroke="white" stroke-width="0.8" />
                                    <!-- Code injected by live-server -->
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="altr-rgt-div">
                        <div class="altr-mid-hd d-flex b_btm p_lft">
                            <div class="poplr-img">
                                <img src="{{ asset('front/img/lyt-rd-grey.svg') }}">
                            </div>
                            <div class="poplr-txt">
                                <h6 class="fw_700 h6_26">Asana</h6>
                                <div class="tp-btm d-flex">
                                    <div class="inn_ul">
                                        <li>5.0</li>
                                        <li><img src="{{ asset('front/img/rew_star.png') }}" alt=""></li>
                                        <li><i class="fa-solid fa-angle-down"></i>
                                        </li>
                                    </div>
                                    <div class="rate_box">
                                        124 ratings
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="poplr-span-txt b_btm h_80 p_lft">
                            <p class="m-0"><span>$19</span> /Month</p>
                        </div>
                        <div class="poplr-vrsion-trial b_btm h_80 p_lft">
                            <ul class="list-unstyled d-flex m-0">
                                <li><img src="{{ asset('front/img/tik-mrk.svg') }}">Free Version</li>
                                <li><img src="{{ asset('front/img/tik-mrk.svg') }}">Free Trial</li>
                            </ul>
                        </div>
                        <div class="poplr-progress">
                            <ul class="list-unstyled m-0">
                                <li class="b_btm h_80 p_lft">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="100"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">5/5</output>
                                    </div>
                                </li>
                                <li class="b_btm h_80 p_lft">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="80"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">4/5</output>
                                    </div>
                                </li>
                                <li class="b_btm h_80 p_lft">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="60"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">3/5</output>
                                    </div>
                                </li>
                                <li class="b_btm h_80 p_lft">
                                    <div class="prgs_br d-flex">
                                        <progress class="progress-bar" id="progress-bar-1" value="80"
                                            max="100">10%</progress>
                                        <output id="progress-output-1">4/5</output>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cpa_sec p_140 ">
        <div class="container">
            <div class="cpa_content">
                <div class="row cpa_rw light size18" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-lg-3 col-md-6">
                        <div class="tp_box">
                            <h6 class="big-bld">Typical Customers</h6>
                            <ul class="list-unstyled">
                                @if (!empty($result['product_features']))
                                    @foreach ($result['product_features'] as $value)
                                        @if ($value['feature_type'] == 'typical_custmor')
                                            <li class="d-flex align-items-center">
                                                <span><img src="{{ asset('front/img/tik-mrk.svg') }}"
                                                        alt="tick mark"></span>
                                                <span>{{$value['feature_translate']['name'] }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="d-flFex align-items-center">
                                        <span>Not Found</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="tp_box">
                            <h6 class="big-bld">Platforms Supported</h6>
                            <ul class="list-unstyled">
                                @if (!empty($result['product_features']))
                                    @foreach ($result['product_features'] as $value)
                                        @if ($value['feature_type'] == 'platform_supported')
                                            <li class="d-flex align-items-center">
                                                <span><img src="{{ asset('front/img/tik-mrk.svg') }}"
                                                        alt="tick mark"></span>
                                                <span>{{ $value['feature_translate']['name'] }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="d-flFex align-items-center">
                                        <span>Not Found</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="tp_box">
                            <h6 class="big-bld">Support Options</h6>
                            <ul class="list-unstyled">
                                @if (!empty($result['product_features']))
                                    @foreach ($result['product_features'] as $value)
                                        @if ($value['feature_type'] == 'support_options')
                                            <li class="d-flex align-items-center">
                                                <span><img src="{{ asset('front/img/tik-mrk.svg') }}"
                                                        alt="tick mark"></span>
                                                <span>{{ $value['feature_translate']['name'] }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="d-flFex align-items-center">
                                        <span>Not Found</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="tp_box">
                            <h6 class="big-bld">Training Options</h6>
                            <ul class="list-unstyled">
                                @if (!empty($result['product_features']))
                                    @foreach ($result['product_features'] as $value)
                                        @if ($value['feature_type'] == 'tranning_options')
                                            <li class="d-flex align-items-center">
                                                <span><img src="{{ asset('front/img/tik-mrk.svg') }}"
                                                        alt="tick mark"></span>
                                                <span>{{$value['feature_translate']['name']  }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="d-flFex align-items-center">
                                        <span>Not Found</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="blu_drk_box dark" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="blu_text">
                                <h6 class="big-bld">Location</h6>
                                <p>New York</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="blu_text">
                                <h6 class="big-bld">Year Founded</h6>
                                <p>2020</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="blu_text">
                                <h6 class="big-bld">Languages Supported</h6>
                                <div class="flg_img">
                                    <img src="{{ asset('front/img/flg1.svg') }}">
                                    <img src="{{ asset('front/img/flg2.svg') }}">
                                    <img src="{{ asset('front/img/flg3.svg') }}">
                                    <img src="{{ asset('front/img/flg4.svg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="blu_text">
                                <h6 class="big-bld">Support Options</h6>
                                <p>24/7 Live Chat, Email Support</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row cpa_rw2 size22" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6">
                        <div class="tp_box">
                            <div class="like_img">
                                <img src="{{ asset('front/img/grn-lyt-tmb.png') }}">
                            </div>
                            <h6 class="big-bld">Pros</h6>
                            <ul class="list-unstyled">
                                @foreach ($prss_data as $value)
                                    <li class="d-flex align-items-center">
                                        <span> <img src="{{ asset('front/img/pros-tick.svg') }}" alt=""></span>
                                        <span class="lyt-text">
                                            {{ $value }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tp_box">
                            <div class="dlike_img">
                                <img src="{{ asset('front/img/rd-lyt-tmb..svg') }}">
                            </div>
                            <h6 class="big-bld">Cons</h6>
                            <ul class="list-unstyled">
                                @foreach ($cons_data as $value)
                                    <li class="d-flex align-items-center">
                                        <span> <img src="{{ asset('front/img/cons-cross.svg') }}" alt=""></span>
                                        <span class="lyt-text">{{ $value }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- scetion exclusive deals -->
    <section class="xclusve-deal csd_sec vid_sec light  p_120" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="xclusve-wrp">
                <div class="hd_text">
                    <h2 class="text-center">Video Reviews</h2>
                </div>
                <div class="xclusve-slider">
                    <div class="xclusve-pack csd_box vide-box big_text">
                        <div class="vid_titile">Review by <strong>Adam C.</strong></div>
                        <div class="csd-img">
                            <img src="{{ asset('front/img/vid-rvw1.png') }}">
                            <div class="lyt_blu-bg">
                                <p>Adam C.</p>
                                <p>Managing Director</p>
                            </div>
                        </div>
                        <div class="vid_ftr">
                            <p>“Lorem ipsum dolor”</p>
                            <div class="rating light">
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-pack csd_box vide-box big_text">
                        <div class="vid_titile">Review by <strong>Kay M.</strong></div>
                        <div class="csd-img">
                            <img src="{{ asset('front/img/vid-rvw2.png') }}">
                            <div class="lyt_blu-bg">
                                <p>Kay M.</p>
                                <p>Managing Director</p>
                            </div>
                        </div>
                        <div class="vid_ftr">
                            <p>“Lorem ipsum dolor”</p>
                            <div class="rating light">
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-pack csd_box vide-box big_text">
                        <div class="vid_titile">Review by <strong>Ella W.</strong></div>
                        <div class="csd-img">
                            <img src="{{ asset('front/img/vid-rvw3.png') }}">
                            <div class="lyt_blu-bg">
                                <p>Ella W.</p>
                                <p>Managing Director</p>
                            </div>
                        </div>
                        <div class="vid_ftr">
                            <p>“Lorem ipsum dolor”</p>
                            <div class="rating light">
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xclusve-pack csd_box vide-box big_text">
                        <div class="vid_titile">Review by Adam C.</div>
                        <div class="csd-img">
                            <img src="{{ asset('front/img/vid-rvw1.png') }}">
                            <div class="lyt_blu-bg">
                                <p>Adam C.</p>
                                <p>Managing Director</p>
                            </div>
                        </div>
                        <div class="vid_ftr">
                            <p>“Lorem ipsum dolor”</p>
                            <div class="rating light">
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="review_sec p_120 ">
        <div class="container">
            <div class="review_content" data-aos="fade-up" data-aos-duration="1000">
                <h2>Top Reviews</h2>
                <div class="review_detl">
                    <div class="reviw_hd">
                        <div class="ans_lft">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/vw1.png') }}">
                            </div>
                            <div class="asn-rating">
                                <h6>John Doe</h6>
                                <div class="rating light">
                                    <div class="rating_str">
                                        <img src="{{ asset('front/img/rating-grn.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="m-0">1 month ago</p>
                    </div>
                    <div class="review_text size18">
                        <p class="size22 big-bld">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry!
                        </p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                    <div class="reviw_hd">
                        <div class="ans_lft">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/vw2.png') }}">
                            </div>
                            <div class="asn-rating">
                                <h6>Xero</h6>
                                <div class="rating light">
                                    <span class="rating-text size18">5.0</span>
                                    <div class="rating_str">
                                        <span><i class="fa fa-star"></i></span>
                                        <span> <i class="fa fa-star"></i></span>
                                        <span> <i class="fa fa-star"></i></span>
                                        <span> <i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="m-0">2 month ago</p>
                    </div>
                    <div class="review_text size18">
                        <p class="size22 big-bld">Impressive!</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                    <div class="reviw_hd">
                        <div class="ans_lft">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/vw3.png') }}">
                            </div>
                            <div class="asn-rating">
                                <h6>Xero</h6>
                                <div class="rating light">
                                    <span class="rating-text size18">5.0</span>
                                    <div class="rating_str">
                                        <span><i class="fa fa-star"></i></span>
                                        <span> <i class="fa fa-star"></i></span>
                                        <span> <i class="fa fa-star"></i></span>
                                        <span> <i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="m-0">2 month ago</p>
                    </div>
                    <div class="review_text size18">
                        <p class="size22 big-bld">Great!</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
                <div class="btm-bttn light">
                    <a class="cta cta_white" href="#">View All Reviews</a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="about_asn light  p_120">
        <div class="container">
            <div class="about_asn_content">
                <div class="hd_content asan-text-para">
                    {{ $result['overview'] }}
                </div>
                <div class="asn_dv asv_orng asv_blue" data-aos="fade-up" data-aos-duration="1000">
                    <div class="asn_dv_contnt">
                        <div class="row frst_rw">
                            <div class="col-md-6">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/tdot-rd.svg') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6 class="light">Asana</h6>
                                        <div class="rating light">
                                            <span class="rating-text size18">5.0</span>
                                            <div class="rating_str">
                                                <span><i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                            <span><i class="fa-solid fa-chevron-down"></i></span>
                                            <span>124 ratings</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ans_ryt">
                                    <div class="site_vsit">
                                        <div class="accor-btn acr_wht">
                                            <a href="javascript:void(0)" class="cta cta_orange d-flex align-items-center"
                                                tabindex="0">
                                                Visit
                                                Website
                                                <div class="right-arw">
                                                    <img src="{{ asset('front/img/right-arrw.svg') }}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="asan-text-para" data-aos="fade-up" data-aos-duration="1000">
                    <h6 class="fw_700 h6_26"> Usability and Experience</h6>
                    <p>Asana is well-known for its user-friendly interface. The platform’s layout is intuitive, with a
                        clean design that allows users to easily navigate through projects and tasks. New users can
                        quickly familiarize themselves with the system, making onboarding for teams fast and efficient.
                    </p>
                    <p>The platform's drag-and-drop functionality makes it easy to manage tasks and projects by simply
                        rearranging items within the interface. This feature, combined with the flexibility in how work
                        is visualized, allows teams to tailor their workflow according to their needs.
                    </p>
                    <p>Another key element of Asana’s usability is its mobile application. The mobile app ensures that
                        team members can stay connected and productive while on the go. It mirrors much of the
                        functionality available on the desktop version, allowing users to create tasks, view project
                        updates, and communicate with their teams from anywhere.
                    </p>
                    <p>Asana’s design accommodates both individual contributors and larger teams. Individual users can
                        track personal tasks and deadlines, while teams can focus on collaborative projects and work
                        toward shared goals. This makes the platform adaptable for teams with varying levels of
                        complexity in their workflows.
                    </p>
                </div>
                <div class="asn_dv asv_orng trial-avil" data-aos="fade-up" data-aos-duration="1000">
                    <div class="asn_dv_contnt">
                        <div class="row frst_rw">
                            <div class="col-md-6">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/tick-white.svg') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <p class="m-0">Free Trial Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ans_ryt">
                                    <div class="site_vsit">
                                        <div class="accor-btn acr_wht">
                                            <a href="javascript:void(0)" class="cta  d-flex align-items-center"
                                                tabindex="0">Claim Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="asan-text-para" data-aos="fade-up" data-aos-duration="1000">
                    <h6 class="fw_700 h6_26">Integrations and Compatibility</h6>
                    <p>Asana’s strength lies in its ability to integrate with a wide variety of third-party
                        applications, making it a versatile tool for teams already using different software in their
                        daily operations. The platform supports integrations with popular communication, file-sharing,
                        time-tracking, and project management tools.
                    </p>
                    <p>Communication is essential to any project, and Asana integrates seamlessly with tools like Slack
                        and Microsoft Teams. These integrations allow users to send task updates, assign work, and share
                        progress directly in team chats, keeping everyone informed without needing to switch platforms
                        constantly.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- scetion exclusive deals -->
    <section class="xclusve-deal csd_sec light   p_120 bg-white">
        <div class="container">
            <div class="xclusve-wrp" data-aos="fade-up" data-aos-duration="1000">
                <div class="hd_text">
                    <h2 class="text-center">Case Studies</h2>
                </div>
                <div class="xclusve-slider">
                    <div class="xclusve-pack csd_box big_text">
                        <div class="csd-img">
                            <img src="{{ asset('front/img/csd1.png') }}">
                        </div>
                        <p class="big-bld">Localio Case Study - Lorem Ipsum</p>
                    </div>
                    <div class="xclusve-pack csd_box big_text">
                        <div class="csd-img">
                            <img src="{{ asset('front/img/csd2.png') }}">
                        </div>
                        <p class="big-bld">Localio Case Study - Lorem Ipsum</p>
                    </div>
                    <div class="xclusve-pack csd_box big_text">
                        <div class="csd-img">
                            <img src="{{ asset('front/img/csd3.png') }}">
                        </div>
                        <p class="big-bld">Localio Case Study - Lorem Ipsum</p>
                    </div>
                    <div class="xclusve-pack csd_box big_text">
                        <div class="csd-img">
                            <img src="{{ asset('front/img/csd1.png') }}">
                        </div>
                        <p class="big-bld">Localio Case Study - Lorem Ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section software-like -->
    <section class="software-like p_120 dark ">
        <div class="container">
            <div class="sftwre-like-innr">
                <div class="sftwre-asana-hd text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Software like Asana</h3>
                    <p>Based on other buyer's searches, these are the products that could be a good fit for you.</p>
                </div>
                <div class="sftware-alternative d-flex" data-aos="fade-up" data-aos-duration="1000">
                    <div class="sftware-alternative-pck" data-aos="fade-up" data-aos-duration="1000">
                        <div class="ans_lft p_top_btm_sftwre pt-0">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/sftare-img1.svg') }}">
                            </div>
                            <div class="asn-rating">
                                <h6 class="m-0">Asana</h6>
                            </div>
                        </div>
                        <div class="overall-rate-sftwre p_top_btm_sftwre">
                            <h6 class="fw_700">Overall Rating:</h6>
                            <div class="rating">
                                <span class="rating-text size18">5.0</span>
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                <span>1689 ratings</span>
                            </div>
                        </div>
                        <div class="over-rate-progress p_top_btm_sftwre">
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Ease of Use
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="10"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">1/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Customer Service
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="30"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">2/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Features
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="50"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">3/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Value for Money
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="100"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">5/5</output>
                                </div>
                            </div>
                        </div>
                        <div class="start-from p_top_btm_sftwre">
                            <h6>Starting From:</h6>
                            <p class="m-0"><span>$9</span>/month</p>
                        </div>
                        <div class="pricing-model">
                            <h6>Pricing Model:</h6>
                            <span>Per User</span>
                        </div>
                    </div>
                    <div class="sftware-alternative-pck" data-aos="fade-up" data-aos-duration="1000">
                        <div class="ans_lft p_top_btm_sftwre pt-0">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/top-rate-img2.svg') }}" alt="">
                            </div>
                            <div class="asn-rating">
                                <h6 class="m-0">Adobe Workfront</h6>
                            </div>
                        </div>
                        <div class="overall-rate-sftwre p_top_btm_sftwre">
                            <h6 class="fw_700">Overall Rating:</h6>
                            <div class="rating">
                                <span class="rating-text size18">5.0</span>
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                <span>1689 ratings</span>
                            </div>
                        </div>
                        <div class="over-rate-progress p_top_btm_sftwre">
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Ease of Use
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="10"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">1/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Customer Service
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="30"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">2/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Features
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="50"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">3/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Value for Money
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="100"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">5/5</output>
                                </div>
                            </div>
                        </div>
                        <div class="start-from p_top_btm_sftwre">
                            <h6>Starting From:</h6>
                            <p class="m-0"><span>$9</span>/month</p>
                        </div>
                        <div class="pricing-model  p_top_btm_sftwre pt-0">
                            <h6>Pricing Model:</h6>
                            <span>Per User</span>
                        </div>
                        <div class="sftwre-alt-btn">
                            <a href="javascript:void(0)"
                                class="cta cta_orange d-flex align-items-center justify-content-center">
                                Visit Website
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.2647 5.84154C7.08595 5.84154 7.42894 5.84154 13.2205 5.84154C13.2304 5.81429 13.2403 5.78704 13.2403 5.75979C13.1017 5.6962 12.9631 5.63262 12.8245 5.55995C10.9435 4.62434 9.91386 3.14372 9.52775 1.25434C9.50795 1.18167 9.59705 1.09084 9.63665 1C9.72575 1.0545 9.86436 1.09992 9.89406 1.18167C10.0525 1.6086 10.1317 2.06278 10.3198 2.47154C11.1712 4.34275 12.6859 5.45095 14.8738 5.78704C15.0124 5.80521 15.1114 5.97779 15.25 6.0868C14.4778 6.32297 13.7947 6.45922 13.1908 6.72265C11.4286 7.49475 10.4089 8.82095 9.99306 10.5559C9.94356 10.7739 9.97326 11.11 9.51785 10.9647C9.87426 8.82095 10.6861 7.79451 13.3096 6.21397C13.0324 6.21397 12.8443 6.21397 12.6562 6.21397C7.20123 6.21397 7.18494 6.21397 1.7201 6.20488C1.5122 6.20488 1.1756 6.32297 1.2647 5.84154Z"
                                        fill="white" stroke="white" stroke-width="0.8" />
                                    <!-- Code injected by live-server -->
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="sftware-alternative-pck" data-aos="fade-up" data-aos-duration="1000">
                        <div class="ans_lft p_top_btm_sftwre pt-0 ">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/bluf.svg') }}" alt="">
                            </div>
                            <div class="asn-rating">
                                <h6 class="m-0">Confluence</h6>
                            </div>
                        </div>
                        <div class="overall-rate-sftwre p_top_btm_sftwre">
                            <h6 class="fw_700">Overall Rating:</h6>
                            <div class="rating">
                                <span class="rating-text size18">5.0</span>
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                <span>1689 ratings</span>
                            </div>
                        </div>
                        <div class="over-rate-progress p_top_btm_sftwre">
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Ease of Use
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="10"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">1/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Customer Service
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="30"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">2/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Features
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="50"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">3/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Value for Money
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="100"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">5/5</output>
                                </div>
                            </div>
                        </div>
                        <div class="start-from p_top_btm_sftwre">
                            <h6>Starting From:</h6>
                            <p class="m-0"><span>$9</span>/month</p>
                        </div>
                        <div class="pricing-model  p_top_btm_sftwre pt-0">
                            <h6>Pricing Model:</h6>
                            <span>Per User</span>
                        </div>
                        <div class="sftwre-alt-btn">
                            <a href="javascript:void(0)"
                                class="cta cta_orange d-flex align-items-center justify-content-center">
                                Visit Website
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.2647 5.84154C7.08595 5.84154 7.42894 5.84154 13.2205 5.84154C13.2304 5.81429 13.2403 5.78704 13.2403 5.75979C13.1017 5.6962 12.9631 5.63262 12.8245 5.55995C10.9435 4.62434 9.91386 3.14372 9.52775 1.25434C9.50795 1.18167 9.59705 1.09084 9.63665 1C9.72575 1.0545 9.86436 1.09992 9.89406 1.18167C10.0525 1.6086 10.1317 2.06278 10.3198 2.47154C11.1712 4.34275 12.6859 5.45095 14.8738 5.78704C15.0124 5.80521 15.1114 5.97779 15.25 6.0868C14.4778 6.32297 13.7947 6.45922 13.1908 6.72265C11.4286 7.49475 10.4089 8.82095 9.99306 10.5559C9.94356 10.7739 9.97326 11.11 9.51785 10.9647C9.87426 8.82095 10.6861 7.79451 13.3096 6.21397C13.0324 6.21397 12.8443 6.21397 12.6562 6.21397C7.20123 6.21397 7.18494 6.21397 1.7201 6.20488C1.5122 6.20488 1.1756 6.32297 1.2647 5.84154Z"
                                        fill="white" stroke="white" stroke-width="0.8" />
                                    <!-- Code injected by live-server -->
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="sftware-alternative-pck" data-aos="fade-up" data-aos-duration="1000">
                        <div class="ans_lft p_top_btm_sftwre pt-0">
                            <div class="asn-img">
                                <img src="{{ asset('front/img/sgbk.svg') }}" alt="">
                            </div>
                            <div class="asn-rating">
                                <h6 class="m-0">Sage Intacct</h6>
                            </div>
                        </div>
                        <div class="overall-rate-sftwre p_top_btm_sftwre">
                            <h6 class="fw_700">Overall Rating:</h6>
                            <div class="rating">
                                <span class="rating-text size18">5.0</span>
                                <div class="rating_str">
                                    <span><i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span> <i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span>
                                </div>
                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                <span>1689 ratings</span>
                            </div>
                        </div>
                        <div class="over-rate-progress p_top_btm_sftwre">
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Ease of Use
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="10"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">1/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Customer Service
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="30"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">2/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Features
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="50"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">3/5</output>
                                </div>
                            </div>
                            <div class="ovr-progrs-div d-flex">
                                <p class="m-0">Value for Money
                                </p>
                                <div class="prgs_br d-flex align-items-center">
                                    <progress class="progress-bar" id="progress-bar-1" value="100"
                                        max="100">10%</progress>
                                    <output id="progress-output-1">5/5</output>
                                </div>
                            </div>
                        </div>
                        <div class="start-from p_top_btm_sftwre">
                            <h6>Starting From:</h6>
                            <p class="m-0"><span>$9</span>/month</p>
                        </div>
                        <div class="pricing-model  p_top_btm_sftwre pt-0">
                            <h6>Pricing Model:</h6>
                            <span>Per User</span>
                        </div>
                        <div class="sftwre-alt-btn">
                            <a href="javascript:void(0)"
                                class="cta cta_orange d-flex align-items-center justify-content-center">
                                Visit Website
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.2647 5.84154C7.08595 5.84154 7.42894 5.84154 13.2205 5.84154C13.2304 5.81429 13.2403 5.78704 13.2403 5.75979C13.1017 5.6962 12.9631 5.63262 12.8245 5.55995C10.9435 4.62434 9.91386 3.14372 9.52775 1.25434C9.50795 1.18167 9.59705 1.09084 9.63665 1C9.72575 1.0545 9.86436 1.09992 9.89406 1.18167C10.0525 1.6086 10.1317 2.06278 10.3198 2.47154C11.1712 4.34275 12.6859 5.45095 14.8738 5.78704C15.0124 5.80521 15.1114 5.97779 15.25 6.0868C14.4778 6.32297 13.7947 6.45922 13.1908 6.72265C11.4286 7.49475 10.4089 8.82095 9.99306 10.5559C9.94356 10.7739 9.97326 11.11 9.51785 10.9647C9.87426 8.82095 10.6861 7.79451 13.3096 6.21397C13.0324 6.21397 12.8443 6.21397 12.6562 6.21397C7.20123 6.21397 7.18494 6.21397 1.7201 6.20488C1.5122 6.20488 1.1756 6.32297 1.2647 5.84154Z"
                                        fill="white" stroke="white" stroke-width="0.8" />
                                    <!-- Code injected by live-server -->
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sft_btm">
                <a class="cta " href="#">View All Alternatives</a>
            </div>
        </div>
    </section>

    <!-- scetion crm sec -->
    <section class="crm_sec p_120 ">
        <div class="container">
            <div class="crm_content" data-aos="fade-up" data-aos-duration="1000">
                <div class="crm_hd">
                    <div class="crm_lft">
                        <h2>Localio Sales CRM Reviews</h2>
                    </div>
                    <div class="crm-ryt">
                        <div class="ryt-rvw-btn">
                            <a href="#" class="cta cta_orange">Write Review</a>
                        </div>
                    </div>
                </div>
                <div class="crm-review-innr" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="sales-crm-pack crm-pack-lft">
                                <div class="inn_sl_hed">
                                    <div class="sli_img choice_img">
                                        <img class="slider_img" src="{{ asset('front/img/big-asana.png') }}"
                                            alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h d-flex align-items-center">
                                            <h6 class="head">Asana</h6>
                                            <i class="fa-regular fa-heart" style="color: #06498B;"></i>
                                        </div>
                                        <div class="tp-btm d-flex">
                                            <div class="inn_ul">
                                                <li>5.0</li>
                                                <li><img src="{{ asset('front/img/rew_star.png') }}" alt=""></li>
                                                <li><i class="fa-solid fa-angle-down"></i>
                                                </li>
                                            </div>
                                            <div class="rate_box">
                                                124 ratings
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="sales-crm-pack">
                                <div class="feture_box">
                                    <h6 class="size22 big-bld">Localio Review Breakdown</h6>
                                    <ul class="p-0 m-0">
                                        <li class="d-flex justify-content-between">
                                            <span class="lyt-text">Ease of Use
                                            </span>
                                            <div class="prgs_br">
                                                <progress class="progress-bar" id="progress-bar-1" value="10"
                                                    max="100">10
                                                    %</progress>
                                                <output id="progress-output-1">1/5</output>
                                            </div>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <span class="lyt-text">
                                                Customer Service
                                            </span>
                                            <div class="prgs_br">
                                                <progress class="progress-bar" id="progress-bar-2" value="20"
                                                    max="100">20
                                                    %</progress>
                                                <output id="progress-output-2">2/5</output>
                                            </div>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <span class="lyt-text">
                                                Features
                                            </span>
                                            <div class="prgs_br">
                                                <progress class="progress-bar" id="progress-bar-3" value="30"
                                                    max="100">30
                                                    %</progress>
                                                <output id="progress-output-3">3/5</output>
                                            </div>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <span class="lyt-text">
                                                Value for Money
                                            </span>
                                            <div class="prgs_br">
                                                <progress class="progress-bar" id="progress-bar-4" value="100"
                                                    max="100">100
                                                    %</progress>
                                                <output id="progress-output-4">5/5</output>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="sales-crm-pack">
                                <div class="fre_trail feture_box size22">
                                    <div class="grn_check_big">
                                        <img src="{{ asset('front/img/new-grn-chk.png') }}">
                                    </div>
                                    <h6 class="blue-text big-bld">Free Trial <br>
                                        Available
                                    </h6>
                                    <div class="accor-btn p-0">
                                        <a href="#" class="cta cta_white">Claim Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="crm_review_box review_sec">
                <nav class="d-flex">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link cta active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">All Reviews</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Our
                            Reviews</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Trustpilot
                            Reviews</button>
                    </div>
                    <div class="selct_box">
                        <label for="rating-select">Sort by:</label>
                        <select id="rating-select" name="rating">
                            <option value="best">Best Rating</option>
                            <option value="high-to-low">High to Low</option>
                            <option value="low-to-high">Low to High</option>
                            <option value="most-reviewed">Most Reviewed</option>
                        </select>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                            <div class="reviw_hd">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/vw1.png') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6>John Doe</h6>
                                        <div class="rating light">
                                            <div class="rating_str">
                                                <img src="{{ asset('front/img/rating-grn.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>1 month ago</p>
                            </div>
                            <div class="review_text size18">
                                <p class="size22 big-bld">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting
                                    industry!
                                </p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived
                                    not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus
                                    PageMaker including
                                    versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                            <div class="reviw_hd">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/vw2.png') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6>Xero</h6>
                                        <div class="rating light">
                                            <span class="rating-text size18">5.0</span>
                                            <div class="rating_str">
                                                <span><i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>1 month ago</p>
                            </div>
                            <div class="review_text size18">
                                <p class="size22 big-bld">Impressive!</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived
                                    not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus
                                    PageMaker including
                                    versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                            <div class="reviw_hd">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/vw3.png') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6>Xero</h6>
                                        <div class="rating light">
                                            <span class="rating-text size18">5.0</span>
                                            <div class="rating_str">
                                                <span><i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>1 month ago</p>
                            </div>
                            <div class="review_text size18">
                                <p class="size22 big-bld">Great!</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived
                                    not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus
                                    PageMaker including
                                    versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                            <div class="reviw_hd">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/jon.png') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6>John Doe</h6>
                                        <div class="rating light">
                                            <div class="rating_str">
                                                <img src="{{ asset('front/img/rating-grn.png') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>1 month ago</p>
                            </div>
                            <div class="review_text size18">
                                <p class="size22 big-bld">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting
                                    industry!
                                </p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived
                                    not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus
                                    PageMaker including
                                    versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="btm-bttn light">
                            <a class="cta cta_white" href="#">View All Reviews</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                            <div class="reviw_hd">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/vw2.png') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6>Xero</h6>
                                        <div class="rating light">
                                            <span class="rating-text size18">5.0</span>
                                            <div class="rating_str">
                                                <span><i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>1 month ago</p>
                            </div>
                            <div class="review_text size18">
                                <p class="size22 big-bld">Impressive!</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived
                                    not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus
                                    PageMaker including
                                    versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="btm-bttn light">
                            <a class="cta cta_white" href="#">View All Reviews</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="review_detl" data-aos="fade-up" data-aos-duration="1000">
                            <div class="reviw_hd">
                                <div class="ans_lft">
                                    <div class="asn-img">
                                        <img src="{{ asset('front/img/vw3.png') }}">
                                    </div>
                                    <div class="asn-rating">
                                        <h6>Xero</h6>
                                        <div class="rating light">
                                            <span class="rating-text size18">5.0</span>
                                            <div class="rating_str">
                                                <span><i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span> <i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p>1 month ago</p>
                            </div>
                            <div class="review_text size18">
                                <p class="size22 big-bld">Great!</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived
                                    not only five
                                    centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing
                                    Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus
                                    PageMaker including
                                    versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="btm-bttn light">
                            <a class="cta cta_white" href="#">View All Reviews</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="subs_sec light p_120">
        <div class="container">
            <div class="subs_content">
                <div class="sub_img">
                    <img src="{{ asset('front/img/subs.png') }}">
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
                        <a href="" class="cta cta_white">Subscribe</a>
                    </div>
                </div>
                <p data-aos="fade-up" data-aos-duration="1000">By proceeding, you agree to our <span
                        class="big-bld">Terms Of Use</span> and <span class="big-bld">Privacy Policy.</span></p>
            </div>
        </div>
    </section>
@endsection
