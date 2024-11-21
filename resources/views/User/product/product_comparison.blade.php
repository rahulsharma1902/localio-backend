@extends('user_layout.master')
@section('content')
<section class="inner_banner_sec cmpari_inner">
    <div class="container">
        <div class="inner_banr_content">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Automotive</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Xero vs Asana</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
      <!-- section product comparison -->
<section class="product_comp_sec p_120 light">
    <div class="container">
        <div class="asn_dv xeo_dv"  data-aos="fade-up" data-aos-duration="1000">
            <div class="xeo_lft">
                <h2>Xero vs Asana: Which is a better fit?</h2>
            </div>
            <div class="ans_ryt">
                <div class="site_vsit">
                    <ul class="list-unstyled">
                    <li><a href="#" class="shr_icn">
                        <img src="{{asset('front/img/share-img.svg') }}" alt="">
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pro-row-gp versus-row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-lg-9">
                <div class="asn_tprw">
                    <div class="pdc_box">
                    <div class="pdc_choice">
                        <div class="auto-choice-hd">
                            <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                <img class="slider_img" src="{{asset('front/img/slider1_img.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                <div class="inn_h d-flex align-items-center">
                                    <h6 class="head">Xero</h6>
                                    <div class="heart-svg">
                                        <img src="img/heart-svg.svg" alt="">
                                    </div>
                                </div>
                                <div class="tp-btm d-flex">
                                    <div class="inn_ul">
                                        <li>5.0</li>
                                        <li><img src="{{asset('front/img/rew_star.png') }}" alt=""></li>
                                        <li><i class="fa-solid fa-angle-down"></i>
                                        </li>
                                    </div>
                                    <div class="rate_box">
                                        124 ratings
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="auto-choice-btn fit-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                Visit Website
                                <div class="right-arw">
                                    <img src="{{asset('front/img/right-arrw.svg') }}" alt="">
                                </div>
                                </a>
                            </div>
                        </div>
                        <span class="ct_icn"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <div class="versus-box ">
                        <p class="d-flex m-0">vs</p>
                    </div>
                    <div class="pdc_choice">
                        <div class="auto-choice-hd">
                            <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                <img class="slider_img" src="{{asset('front/img/fitimg2.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                <div class="inn_h d-flex align-items-center">
                                    <h6 class="head">Asana</h6>
                                    <div class="heart-svg">
                                        <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="tp-btm d-flex">
                                    <div class="inn_ul">
                                        <li>5.0</li>
                                        <li><img src="{{asset('front/img/rew_star.png') }}" alt=""></li>
                                        <li><i class="fa-solid fa-angle-down"></i>
                                        </li>
                                    </div>
                                    <div class="rate_box">
                                        124 ratings
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="auto-choice-btn fit-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                Visit Website
                                <div class="right-arw">
                                    <img src="{{asset('front/img/right-arrw.svg') }}" alt="">
                                </div>
                                </a>
                            </div>
                        </div>
                        <span class="ct_icn"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <a class="pdc_ryt">
                    <div href="#" class="ad_lnk">
                    <img src="{{asset('front/img/pls-add.png') }}">
                    Add product
                    </div>
                </a>
            </div>
        </div>
        <div class="row localio-brkdwn">
            <div class="col-lg-9">
                <!-- localio breakdown -->
                <div class="main_feture  compari-feature" data-aos="fade-up" data-aos-duration="1000">
                    <div class="feture_box black-hding">
                    <h6 class="size22 big-bld">Localio Review Breakdown</h6>
                    <ul>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">Ease of Use
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-1" value="10" max="100">10
                                %</progress>
                                <output id="progress-output-1">1/5</output>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">
                            Customer Service
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-2" value="20" max="100">20
                                %</progress>
                                <output id="progress-output-2">2/5</output>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">
                            Features
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-3" value="30" max="100">30
                                %</progress>
                                <output id="progress-output-3">3/5</output>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">
                            Value for Money
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-4" value="100" max="100">100
                                %</progress>
                                <output id="progress-output-4">5/5</output>
                            </div>
                        </li>
                    </ul>
                    </div>
                    <div class="feture_box  black-hding">
                    <h6 class="size22 big-bld">Localio Review Breakdown</h6>
                    <ul>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">Ease of Use
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-1" value="10" max="100">10
                                %</progress>
                                <output id="progress-output-1">1/5</output>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">
                            Customer Service
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-2" value="20" max="100">20
                                %</progress>
                                <output id="progress-output-2">2/5</output>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">
                            Features
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-3" value="30" max="100">30
                                %</progress>
                                <output id="progress-output-3">3/5</output>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="lyt-text">
                            Value for Money
                            </span>
                            <div class="prgs_br">
                                <progress class="progress-bar" id="progress-bar-4" value="100" max="100">100
                                %</progress>
                                <output id="progress-output-4">5/5</output>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
                <!-- key features div -->
                <div class="cpa_rw cpa_bg light size18 pro-row-gp d-flex" data-aos="fade-up"
                    data-aos-duration="1000">
                    <div class="cpa_bg_div">
                    <div class="tp_box cpa_tp_box " >
                        <h6 class="big-bld">Key Features</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front//img/pros-tick.svg') }}" alt=""></span>
                                <span>
                                Free domain & SSL certificate
                                </span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>Customizable automatic updates</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>
                                Scalable performance management</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>
                                DDoS & malware protection</span>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="cpa_bg_div p_left">
                    <div class="tp_box cpa_tp_box">
                        <h6 class="big-bld">Key Features</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>
                                Free domain & SSL certificate
                                </span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>Customizable automatic updates</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>
                                Scalable performance management</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span>
                                DDoS & malware protection</span>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <!-- what is xero -->
                <div class="row xrro_dv light pro-row-gp" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-lg-6 xrro_bordr">
                    <div class="xro_box">
                        <h6>What is Xero?</h6>
                        <div class="xro_text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                recently.
                            </p>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="xro_box p_left">
                        <h6>What is Asana?</h6>
                        <div class="xro_text">
                            <p>Asana is a powerful and versatile tool for managing projects and tasks, offering
                                a wide range of features that cater to different team sizes and industries. Its
                                user-friendly interface, combined with flexible project views and customizable
                                workflows, makes it an attractive option for teams looking to streamline their
                                work and stay organized. With extensive integration options and features
                                designed to promote collaboration and productivity, Asana helps ensure that
                                teams can work together efficiently.
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- price start from -->
                <div class="prc_dv" data-aos="fade-up" data-aos-duration="1000">
                    <div class="hd_text">
                    <h2>Price Starts From</h2>
                    </div>
                    <div class="prc_bx">
                    <div class="prc_contnt">
                        <div class="sli_img">
                            <img class="slider_img" src="{{asset('front/img/slider1_img.png') }}" alt="">
                        </div>
                        <div class="inn_h d-flex align-items-center">
                            <h6 class="head">Xero</h6>
                            <i class="fa-regular fa-heart white-heart" style="color: #06498B;"></i>
                        </div>
                        <p class="m-0"><span>$7</span>/user</p>
                        <p>Monthly subscription</p>
                        <div class="auto-choice-btn">
                            <a href="javascript:void(0)" class="cta cta_orange fw_500">Try for Free</a>
                        </div>
                    </div>
                    <div class="prc_contnt">
                        <div class="sli_img">
                            <img class="slider_img" src="{{asset('front/img/top-rate-img2.png') }}" alt="">
                        </div>
                        <div class="inn_h d-flex align-items-center">
                            <h6 class="head">Asana</h6>
                            <i class="fa-regular fa-heart white-heart" style="color: #06498B;"></i>
                        </div>
                        <p class="m-0"><span>$2</span>/user</p>
                        <p>Monthly subscription</p>
                        <div class="auto-choice-btn">
                            <a href="javascript:void(0)" class="cta cta_orange fw_500">Try for Free</a>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- pros div -->
                <div class="row cpa_rw2 size22 pro-row-gp" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6">
                    <div class="tp_box tp_font">
                        <div class="like_img">
                            <img src="{{asset('front/img/grn-lyt-tmb.svg') }}">
                        </div>
                        <h6 class="big-bld">Pros</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">
                                Modern user interface
                                </span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">Customizable</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">
                                Offers in-app automations</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">
                                Includes templates</span>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="tp_box tp_font">
                        <div class="like_img">
                            <img src="{{asset('front/img/grn-lyt-tmb.svg') }}">
                        </div>
                        <h6 class="big-bld">Pros</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">
                                Modern user interface
                                </span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">Customizable</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">
                                Offers in-app automations</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span><img src="{{asset('front/img/pros-tick.svg') }}" alt=""></span>
                                <span class="lyt-text">
                                Includes templates</span>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <!-- cons div -->
                <div class="row cpa_rw2 size22 pro-row-gp m-0" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6">
                    <div class="tp_box tp_font">
                        <div class="dlike_img">
                            <img src="{{asset('front/img/rd-lyt-tmb..svg') }}">
                        </div>
                        <h6 class="big-bld">Cons</h6>
                        <ul class="list-unstyled cons-ul">
                            <li class="d-flex align-items-center">
                                <span> <img src="{{asset('front/img/cons-cross.svg') }}" alt=""></span>
                                <span class="lyt-text">Confusing pricing and plans</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span> <img src="{{asset('front/img/cons-cross.svg') }}" alt=""></span>
                                <span class="lyt-text">Inconsistent and Byzantine navigation options</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span> <img src="{{asset('front/img/cons-cross.svg') }}" alt=""></span>
                                <span class="lyt-text">Free plan isn't designed for serious business use</span>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="tp_box tp_font">
                        <div class="dlike_img">
                            <img src="{{asset('front/img/rd-lyt-tmb..svg') }}">
                        </div>
                        <h6 class="big-bld">Cons</h6>
                        <ul class="list-unstyled cons-ul">
                            <li class="d-flex align-items-center">
                                <span> <img src="{{asset('front/img/cons-cross.svg') }}" alt=""></span>
                                <span class="lyt-text">Confusing pricing and plans</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span> <img src="{{asset('front/img/cons-cross.svg') }}" alt=""></span>
                                <span class="lyt-text">Inconsistent and Byzantine navigation options</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span> <img src="{{asset('front/img/cons-cross.svg') }}" alt=""></span>
                                <span class="lyt-text">Free plan isn't designed for serious business use</span>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <!-- review tabination -->
                <div class="crm_sec p_120 light pb-0 rev-tabi">
                    <div class="container">
                    <div class="crm_content" data-aos="fade-up" data-aos-duration="1000">
                        <div class="crm_hd">
                            <div class="crm_lft">
                                <h2>Reviews</h2>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-duration="1000">
                            <div class="col-md-6">
                                <div class="sales-crm-pack crm-pack-lft compari_crm_pck">
                                <div class="inn_sl_hed">
                                    <div class="sli_img choice_img">
                                        <img src="{{asset('front/img/poplr-zero.svg') }}" alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h d-flex align-items-center">
                                            <h6 class="head">Xero</h6>
                                            <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="tp-btm d-flex">
                                            <div class="inn_ul">
                                            <li>5.0</li>
                                            <li><img src="{{asset('front/img/rew_star.png') }}" alt=""></li>
                                            <li><i class="fa-solid fa-angle-down"></i>
                                            </li>
                                            </div>
                                            <div class="rate_box">
                                            124 ratings
                                            </div>
                                        </div>
                                        <div class="sftwre-alt-btn">
                                            <a href="javascript:void(0)"
                                            class="cta cta_orange d-flex align-items-center justify-content-center fw_500">
                                            Visit
                                            Website 
                                            <div class="right-arw">
                                                <img src="{{asset('front/img/right-arrw.svg' ) }}" alt="">
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="sales-crm-pack crm-pack-lft compari_crm_pck">
                                <div class="inn_sl_hed">
                                    <div class="sli_img choice_img">
                                        <img class="slider_img" src="{{asset('front/img/big-asana.svg') }}" alt="">
                                    </div>
                                    <div class="sl_h">
                                        <div class="inn_h d-flex align-items-center">
                                            <h6 class="head">Asana</h6>
                                            <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="tp-btm d-flex">
                                            <div class="inn_ul">
                                            <li>5.0</li>
                                            <li><img src="{{asset('front/img/rew_star.png') }}" alt=""></li>
                                            <li><i class="fa-solid fa-angle-down"></i>
                                            </li>
                                            </div>
                                            <div class="rate_box">
                                            124 ratings
                                            </div>
                                        </div>
                                        <div class="sftwre-alt-btn">
                                            <a href="javascript:void(0)"
                                            class="cta cta_orange d-flex align-items-center justify-content-center fw_500">
                                            Visit
                                            Website 
                                            <div class="right-arw">
                                                <img src="{{asset('front/img/right-arrw.svg') }}" alt="">
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- review tabination -->
                        <div class="crm_review_box review_sec compari_review" data-aos="fade-up"
                            data-aos-duration="1000">
                            <nav class="d-flex">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link cta active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab"
                                    aria-controls="nav-home" aria-selected="true">All Reviews</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false" tabindex="-1">Our
                                Reviews</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab"
                                    aria-controls="nav-contact" aria-selected="false"
                                    tabindex="-1">Trustpilot Reviews</button>
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
                            <div class="tab-content" id="nav-tabContent" data-aos="fade-up"
                                data-aos-duration="1000">
                                <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <!-- all reviews -->
                                <div class="comparison-reviews">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="compari-pack">
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="view-review">
                                            <a href="javascript:void(0)" class="cta cta_white">View
                                            Reviews</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="compari-pack">
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="view-review">
                                            <a href="javascript:void(0)" class="cta cta_white">View
                                            Reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <!-- our reviews -->
                                <div class="comparison-reviews_tab">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="compari-pack_tab">
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="view-review">
                                            <a href="javascript:void(0)" class="cta cta_white">View
                                            Reviews</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <!-- localio reviews -->
                                <div class="comparison-reviews_tab">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="compari-pack_tab">
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="compari_pck_innr">
                                                <div class="compari_card_top">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-plus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                </div>
                                                <div class="compari_card_top compari_btm">
                                                    <div class="compari-img-txt d-flex">
                                                        <div class="compari-crd-img">
                                                        <img src="{{asset('front/img/john-minus.png') }}" alt="">
                                                        </div>
                                                        <div class="compari-txt">
                                                        <h6>John Doe</h6>
                                                        <p class="m-0">Position Here</p>
                                                        </div>
                                                    </div>
                                                    <p class="compari_p">“Lorem Ipsum has been the
                                                        industry's standard dummy text ever since the
                                                        1500s, when an unknown printer took a galley of
                                                        type and scrambled it to make a type specimen
                                                        book. It has survived not only five centuries,
                                                        but also the leap into electronic.”
                                                    </p>
                                                    <a href="javascript:void(0)"
                                                        class="btn-see-full">See full review</a>
                                                    <div class="compari_tabi">
                                                        <span>1/4</span>
                                                        <a href="javascript:void(0)" class="">Next <i
                                                        class="fa-solid fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="view-review">
                                            <a href="javascript:void(0)" class="cta cta_white">View
                                            Reviews</a>
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
<section class="subs_sec comprsn_chrt new_subsc light p_120">
    <div class="container">
        <div class="subs_content" data-aos="fade-up" data-aos-duration="1000">
            <h2>Send this comparison chart to my inbox</h2>
            <div class="mail_field">
                <div class="email_box">
                    <input type="email" id="email" name="email" placeholder="Email Address*">
                </div>
                <div class="accor-btn sbs_bttn">
                    <a href="" class="cta cta_white">Get The Comparison</a>
                </div>
            </div>
            <p>By proceeding, you agree to our <span class="big-bld">Terms Of Use</span> and <span
                class="big-bld">Privacy Policy</span></p>
        </div>
    </div>
</section>

@endsection