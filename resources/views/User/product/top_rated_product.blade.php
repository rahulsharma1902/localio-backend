@extends('user_layout.master')
@section('content')
<!-- <div class="header_inner"> -->
    <section class="banner_sec help-cntr-bnr top-auto-bnr dark " style="background-color: #003F7D;">
        <div class="bubble-wrp" data-aos="fade-up" data-aos-duration="1000">
            <img src="{{asset('front/img/small-bnnr-bg.png') }}" alt="">
        </div>
        <div class="banner_content">
            <div class="container">
                <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="banner_text_col">
                        <div class="banner_content_inner">
                        <div class="hd-share-flex d-flex align-items-center">
                            <h1>Automotive</h1>
                            <div class="hd-share">
                                <img src="{{asset('front/img/white-share-node.svg') }}" alt="">
                            </div>
                        </div>
                        <p class="fw_700">How to find the right Automotive Software </p>
                        </div>
                    </div>
                    <div class="banner_image_col">
                        <div class="banner_image">
                        <img src="{{asset('front/img/top-rated-bnr-bg.png') }}" class="banner_top_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="abs-txt">
            <div class="container">
                <div class="hd-innr-txt">
                    <p class="m-0">Localio
                        provides independent research and reviews. We may earn affiliate commissions. <a href=""
                        class="">Learn more</a>
                    </p>
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
                                <input type="range" min="0" max="299" value="0" id="slider-1"
                                oninput="slideOne()">
                                <input type="range" min="0" max="299" value="299" id="slider-2"
                                oninput="slideTwo()">
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
                    <div class="automotive-card auto-bg" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice1.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">Xero</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
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
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website
                                    <div class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front//img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$9</span>/Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare" name="compare" value="free">
                            <label for="compare">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-card" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice2.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">Odoo</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
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
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website 
                                    <div
                                        class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$12</span>/Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare2" name="compare2" value="free">
                            <label for="compare2">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-card" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice3.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">BambooHR</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
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
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website
                                    <div class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$10</span>/Month</p>
                                </div>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare3" name="compare3" value="free">
                            <label for="compare3">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-card auto-recomend" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice4.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">Asana</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
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
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website
                                    <div class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$15</span>/Month</p>
                                </div>
                            </div>
                            <div class="recommend">
                                <p class="d-flex align-items-center m-0 "><i class="fa-solid fa-heart"></i>88%
                                of user recommed Asana
                                </p>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare4" name="compare4" value="free">
                            <label for="compare4">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-card auto-recomend" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice5.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">Confluence</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg' )}}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
                                        <div class="inn_ul">
                                            <li>5.0</li>
                                            <li><img src="{{asset('front/img/rew_star.png' )}}" alt=""></li>
                                            <li><i class="fa-solid fa-angle-down"></i>
                                            </li>
                                        </div>
                                        <div class="rate_box">
                                            124 ratings
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website
                                    <div class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$16</span>/Month</p>
                                </div>
                            </div>
                            <div class="recommend">
                                <p class="d-flex align-items-center m-0 "><i class="fa-solid fa-heart"></i>88%
                                of user recommed Confluence
                                </p>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare5" name="compare5" value="free">
                            <label for="compare5">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-card auto-recomend" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice1.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">Xero</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
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
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website
                                    <div class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$13</span>/Month</p>
                                </div>
                            </div>
                            <div class="recommend">
                                <p class="d-flex align-items-center m-0 "><i class="fa-solid fa-heart"></i>88%
                                of user recommed Asana
                                </p>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare6" name="compare6" value="free">
                            <label for="compare6">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-card auto-recomend" data-aos="fade-up" data-aos-duration="1000">
                        <div class="auto-choice-card">
                            <div class="auto-choice-hd">
                                <div class="inn_sl_hed">
                                <div class="sli_img choice_img">
                                    <img class="slider_img" src="{{asset('front/img/auto-choice1.svg') }}" alt="">
                                </div>
                                <div class="sl_h">
                                    <div class="inn_h d-flex align-items-center">
                                        <h6 class="head">Xero</h6>
                                        <div class="heart-svg">
                                            <img src="{{asset('front/img/heart-svg.svg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="tp-btm d-flex flex-col-mob">
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
                                <div class="auto-choice-btn">
                                <a href="javascript:void(0)" class="cta cta_orange">
                                    Visit Website
                                    <div class="right-arw">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <div class="text-choice">
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s,
                                when an unknown printer took a galley of type and scrambled it to make a
                                type specimen book. 
                                </p>
                                <a href="javascript:void(0)">Read More</a>
                            </div>
                            <div class="key-feature-price d-flex">
                                <div class="choice-key-features">
                                <h6>Key Features</h6>
                                <ul class="list-unstyled key-fea-lst">
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Free domain & SSL certificate</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Scalable performance management</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">Customizable automatic updates</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div class="grn_chk">
                                            <img src="{{asset('front/img/tick-img.png') }}" alt="">
                                        </div>
                                        <p class="m-0">DDoS & malware protection</p>
                                    </li>
                                </ul>
                                </div>
                                <div class="starting-price">
                                <h6 class="m-0">Starting Price</h6>
                                <p class="m-0"><span>$9</span>/Month</p>
                                </div>
                            </div>
                            <div class="recommend">
                                <p class="d-flex align-items-center m-0 "><i class="fa-solid fa-heart"></i>88%
                                of user recommed Asana
                                </p>
                            </div>
                        </div>
                        <div class="blue-chkbox">
                            <input type="checkbox" id="compare7" name="compare7" value="free">
                            <label for="compare7">Compare Products</label>
                        </div>
                    </div>
                    <div class="automotive-pagination" data-aos="fade-up" data-aos-duration="1000">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item pagi-btn disabled"><a class="page-link"><i
                                class="fa-solid fa-chevron-left"></i></a></li>
                                <li class="page-item active"><a class="page-link"
                                href="javascript:void(0)">1</a></li>
                                <li class="page-item " aria-current="page"><a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">6</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0)">7</a></li>
                                <li class="page-item pagi-btn"> <a class="page-link"
                                href="javascript:void(0)"><i class="fa-solid fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
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
                <img src="{{asset('front/img/subs.png') }}">
            </div>
            <h2 data-aos="fade-up" data-aos-duration="1000">Top-rated Products of 2024</h2>
            <p data-aos="fade-up" data-aos-duration="1000">Fill out the form and we'll send a list of the top-rated﻿
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
                class="big-bld">Terms Of Use</span> and <span class="big-bld">Privacy Policy.</span></p>
        </div>
    </div>
</section>

@endsection