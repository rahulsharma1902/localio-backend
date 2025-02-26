@extends('vendor_dashboard_layout.master')
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('content')
<div class="col-lg-9 p-0">
    <div class="user_content">
       <div class="uer_nm">
          <h1>{{ __('file.overview') }}</h1>
       </div>
       <div class="mi_detail">
          <div class="row gy-4">
             <div class="overview_list">
                <div class="overlist_box ">
                   <h6>
                    {{ __('file.total-listing') }}
                   </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         10
                      </span>
                      <span class="overlist_sp">
                         <a class="overlst_an" href="">
                                   {{ __('file.view-all') }}
                            <img src="{{asset('vender_dashboard/img/arrow-rgt.svg')}}" alt="">
                         </a>
                      </span>
                   </div>
                </div>
                <div class="overlist_box ">
                   <h6>
                    {{ __('file.profile-views') }}
                   </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         16
                      </span>
                      <span class="overlist_sp">
                         <a class="overlst_an" href="">
                            {{ __('file.view-all') }}
                            <img src="{{asset('vender_dashboard/img/arrow-rgt.svg')}}" alt="">
                         </a>
                      </span>
                   </div>
                </div>
                <div class="overlist_box ">
                   <h6>
                    {{ __('file.ad-campaign') }}
                   </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         11
                      </span>
                      <span class="overlist_sp">
                         <a class="overlst_an" href="">
                            {{ __('file.view-all') }}
                            <img src="{{asset('vender_dashboard/img/arrow-rgt.svg')}}" alt="">
                         </a>
                      </span>
                   </div>
                </div>
                <div class="overlist_box ">
                   <h6>
                    {{ __('file.review') }}
                   </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         20
                      </span>
                      <span class="overlist_sp">
                         <a class="overlst_an" href="">
                            {{ __('file.view-all') }}
                            <img src="{{asset('vender_dashboard/img/arrow-rgt.svg')}}" alt="">
                         </a>
                      </span>
                   </div>
                </div>
             </div>
          </div>
       </div>

       <div class="prf_revbox">
          <div class="row">
             <div class="col-lg-9">
                <div class="profile_viewbox">
                   <div class="row">
                      <div class="col-lg-9">
                         <div class="prof_lft">
                            <div class="lft_prfhd">
                               <h6>
                                {{ __('file.profile-views') }}
                               </h6>
                               <p>
                                {{ __('file.in-last-days') }}
                               </p>
                            </div>
                            <div class="left_grap">
                               <img src="{{asset('vender_dashboard/img/gp_img.svg')}}" alt="">
                            </div>
                            <div class="frt_lstmnth">

                            </div>
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="prof_rgt">
                            <div class="totl_viewbox">
                               <div class="hd_box">
                                  <h6>  {{ __('file.Total Views') }}</h6>
                               </div>
                               <div class="custom-select">
                                  <div class="select-box">
                                     <span class="selected">{{ __('file.this-month') }}</span>
                                     <i class="fa-solid fa-chevron-down"></i>
                                  </div>
                                  <div class="options">
                                     <div data-value="option1">Option 1</div>
                                     <div data-value="option2">Option 2</div>
                                     <div data-value="option3">Option 3</div>
                                  </div>
                               </div>
                            </div>
                            <div class="profile_view">
                               <div class="prof_hd">
                                  <h6>
                                    {{ __('file.profile-views') }}
                                  </h6>
                                  <div class="prof_vlu">
                                     <span class="prof_spvlu">
                                        1000
                                     </span>
                                  </div>
                                  <div class="vlue_compare">
                                    {{ __('file.Compared to') }} (<span class="sub_vlue">-16.93%</span>)
                                  </div>
                               </div>
                               <div class="prof_hd">
                                  <h6>
                                    {{ __('file.Engagement Metrics') }}
                                  </h6>
                                  <div class="prof_vlu">
                                     <span class="prof_spvlu">
                                        400
                                     </span>
                                  </div>
                                  <div class="vlue_compare">
                                    {{ __('file.Compared to') }} (<span class="plse_vlue">+4.26%</span>)
                                  </div>
                               </div>
                               <div class="prof_hd">
                                  <h6>
                                    {{ __('file.Conversion Tracking') }}
                                  </h6>
                                  <div class="prof_vlu">
                                     <span class="prof_spvlu">
                                        700
                                     </span>
                                  </div>
                                  <div class="vlue_compare">
                                    {{ __('file.Compared to') }} (<span class="plse_vlue">+10.26%</span>)
                                  </div>
                               </div>
                            </div>



                         </div>
                      </div>

                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="Recent_rwbox">

                   </div>
                </div>
             </div>
             <div class="col-lg-3">
                <div class="recent_reviw">
                   <div class="revire_hd">
                      <h5>
                        {{ __('file.Recent Reviews') }}
                         </h6>
                   </div>
                   <div class="review_scroll">
                      <div class="review_box">
                         <div class="rewbox_hd">
                            <div class="rew_img">
                               <img src="{{asset('vender_dashboard/img/review-img2.svg')}}" alt="">
                            </div>
                            <div class="rew_content">
                               <h6>
                                  Xero
                               </h6>
                               <div class="rew_str">
                                  5.0 <ul>
                                     <li>
                                        <div class="rating-container">
                                           <i class="fa-solid fa-star star filled" data-value="1"></i>
                                           <i class="fa-solid fa-star star filled" data-value="2"></i>
                                           <i class="fa-solid fa-star star filled" data-value="3"></i>
                                           <i class="fa-solid fa-star star filled" data-value="4"></i>
                                           <i class="fa-solid fa-star star filled" data-value="5"></i>
                                        </div>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                         <div class="rew_para">
                            <h5 class="impres_hd">
                               Impressive!
                            </h5>
                            <p class="imp_para">
                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                               Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                               unknown printer took a galley of type and scrambled it to make a type specimen
                               book. It has survived not only five centuries.
                            </p>
                         </div>
                      </div>
                      <div class="review_box">
                         <div class="rewbox_hd">
                            <div class="rew_img">
                               <img src="{{asset('vender_dashboard/img/review-img2.svg')}}" alt="">
                            </div>
                            <div class="rew_content">
                               <h6>
                                  Xero
                               </h6>
                               <div class="rew_str">
                                  5.0 <ul>
                                     <li>
                                        <div class="rating-container">
                                           <i class="fa-solid fa-star star filled" data-value="1"></i>
                                           <i class="fa-solid fa-star star filled" data-value="2"></i>
                                           <i class="fa-solid fa-star star filled" data-value="3"></i>
                                           <i class="fa-solid fa-star star filled" data-value="4"></i>
                                           <i class="fa-solid fa-star star filled" data-value="5"></i>
                                        </div>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                         <div class="rew_para">
                            <h5 class="impres_hd">
                               Impressive!
                            </h5>
                            <p class="imp_para">
                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                               Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                               unknown printer took a galley of type and scrambled it to make a type specimen
                               book. It has survived not only five centuries.
                            </p>
                         </div>
                      </div>
                          <div class="review_box">
                         <div class="rewbox_hd">
                            <div class="rew_img">
                               <img src="{{asset('vender_dashboard/img/review-img2.svg')}}" alt="">
                            </div>
                            <div class="rew_content">
                               <h6>
                                  Xero
                               </h6>
                               <div class="rew_str">
                                  5.0 <ul>
                                     <li>
                                        <div class="rating-container">
                                           <i class="fa-solid fa-star star filled" data-value="1"></i>
                                           <i class="fa-solid fa-star star filled" data-value="2"></i>
                                           <i class="fa-solid fa-star star filled" data-value="3"></i>
                                           <i class="fa-solid fa-star star filled" data-value="4"></i>
                                           <i class="fa-solid fa-star star filled" data-value="5"></i>
                                        </div>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                         <div class="rew_para">
                            <h5 class="impres_hd">
                               Impressive!
                            </h5>
                            <p class="imp_para">
                               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                               Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                               unknown printer took a galley of type and scrambled it to make a type specimen
                               book. It has survived not only five centuries.
                            </p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 @endsection
