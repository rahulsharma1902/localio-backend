@extends('user_layout.master')
@section('content')

<section class="product_sec">
    <div class="pvc_sec p_120">
         <div class="container">
            <div class="pvc_content">
               <!-- <h2 data-aos="zoom-in" data-aos-duration="1000">Terms & Conditions</h2> -->
               @if(isset($policies) && $policies->isNotEmpty())
                  @foreach($policies as $policy )
                     <h2 data-aos="zoom-in" data-aos-duration="1000">{{$policy->translations->isNotEmpty() ? $policy->translations->first()->title : $policy->title }}</h2>
                     <div class="pvc_textbx" data-aos="fade-up" data-aos-duration="1000">
                        <div class="pvc_text size18">
                           <p>
                              {{ strip_tags($policy->translations->isNotEmpty() ? $policy->translations->first()->description : $policy->description  ) }}
                           </p>
                        </div>
                     </div>
                  @endforeach
               @endif

               <div class="pvc_mn">
                  @if(isset($rules) && $rules->isNotEmpty())
                     @foreach($rules as $rule)
                        <div class="pvc_textbx">
                           <!-- <h6 data-aos="fade-up" data-aos-duration="1000">Disclaimers</h6> -->
                           <h6 data-aos="fade-up" data-aos-duration="1000">{{$rule->translations->isNotEmpty() ? $rule->translations->first()->title : $rule->title }}</h6>

                           <div class="pvc_text size18">
                              <p data-aos="fade-up" data-aos-duration="1000">
                                 {{ strip_tags($rule->translations->isNotEmpty() ? $rule->translations->first()->description : $rule->description) }}
                              </p>
                           </div>
                        </div>
                     @endforeach   
                  @endif      
               </div>
            </div>
         </div>
    </div>
</section>      
<section class="right_tool_sec dark p_80">
    <div class="container">
        <div class="right-tool-wrp text-center"  data-aos="fade-up" data-aos-duration="1000">
            <h3>Find the Right Tool</h3>
            <div class="right-tool-pack">
                <div class="row">
                    <div class="col-lg-4">
                    <div class="tool-card">
                        <div class="tool-card-img">
                            <img src="{{asset('front/img/right-tool-img1.png') }}" alt="">
                        </div>
                        <div class="tool-crd-bdy">
                            <h6 class="h6_26">Verified User Reviews</h6>
                            <p class="size18">Read real feedback from verified users to help you make the right
                                choice.
                            </p>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="tool-card">
                        <div class="tool-card-img">
                            <img src="{{asset('front/img/right-tool-img2.png') }}" alt="">
                        </div>
                        <div class="tool-crd-bdy">
                            <h6 class="h6_26">Feature and Price Comparisons</h6>
                            <p class="size18">Easily compare software based on key features, pricing, and
                                customer ratings.
                            </p>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="tool-card">
                        <div class="tool-card-img">
                            <img src="{{asset('front/img/right-tool-img3.png') }}" alt="">
                        </div>
                        <div class="tool-crd-bdy">
                            <h6 class="h6_26">Independent Insights</h6>
                            <p class="size18">Access unbiased, data-driven research to get the most value from
                                your software.
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="right-tool-btn  text-center">
                <a href="" class="cta">Get Started</a>
            </div>
        </div>
    </div>
    <div class="back-image1">
        <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt="">
    </div>
    <div class="back-image2">
        <img src="{{asset('fromt/img/right-tool-vector2.png') }}" class="image-pattern2" alt="">
    </div>
</section>

@endsection