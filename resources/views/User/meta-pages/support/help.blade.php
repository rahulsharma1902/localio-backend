@extends('user_layout.master')
@section('content')

<section class="banner_sec help-cntr-bnr dark" style="background-color: #003F7D;">
         <div class="bubble-wrp">
            <img src="{{asset('front/img/small-bnnr-bg.png') }}" alt="">
         </div>
         <div class="banner_content">
            <div class="container">
               <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                  <div class="banner_text_col">
                     <div class="banner_content_inner">
                        <h1>Help Center</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur </p>
                        <div class="search-bar-wrp">
                           <div class="search-box">
                              <input type="text" placeholder="How we can help you?">
                              <i class="fa fa-search"></i>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="banner_image_col">
                     <div class="banner_image">
                        <img src="{{asset('front/img/hlp-cntr-bnr.png') }}" class="banner_top_image">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- section how we can help you -->
      <section class="hlp-you-center p_120 light">
         <div class="container">
            <div class="hlp-you-wrp">
               <h2 class="text-center mb_30" data-aos="zoom-in" data-aos-duration="1000">How We Can Help You!</h2>
               <div class="hlp-you-cards">
                  <div class="row hlp-crd-row">
                     <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                        <a href="javascript:void(0)" class="">
                           <div class="hlp-you-box">
                              <div class="hlp-you-img">
                                 <img src="{{asset('front/img/hlp-img-1.svg') }}" alt="">
                              </div>
                              <div class="hlp-you-cntnt text-center">
                                 <h3>Getting Started</h3>
                                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer.
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6  col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                        <a href="javascript:void(0)" class="">
                           <div class="hlp-you-box">
                              <div class="hlp-you-img">
                                 <img src="{{asset('front/img/hlp-img-2.svg') }}" alt="">
                              </div>
                              <div class="hlp-you-cntnt text-center">
                                 <h3>Customization</h3>
                                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer.
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                        <a href="javascript:void(0)" class="">
                           <div class="hlp-you-box">
                              <div class="hlp-you-img">
                                 <img src="{{asset('front/img/hlp-img-3.svg') }}" alt="">
                              </div>
                              <div class="hlp-you-cntnt text-center">
                                 <h3>Knowledge Base</h3>
                                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer.
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                        <a href="javascript:void(0)" class="">
                           <div class="hlp-you-box">
                              <div class="hlp-you-img">
                                 <img src="{{asset('front/img/hlp-img-4.svg') }}" alt="">
                              </div>
                              <div class="hlp-you-cntnt text-center">
                                 <h3>Widget</h3>
                                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer.
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                        <a href="javascript:void(0)" class="">
                           <div class="hlp-you-box">
                              <div class="hlp-you-img">
                                 <img src="{{asset('front/img/hlp-img-5.svg') }}" alt="">
                              </div>
                              <div class="hlp-you-cntnt text-center">
                                 <h3>Guides</h3>
                                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer.
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                        <a href="javascript:void(0)" class="">
                           <div class="hlp-you-box">
                              <div class="hlp-you-img">
                                 <img src="{{asset('front/img/hlp-img-6.svg') }}" alt="">
                              </div>
                              <div class="hlp-you-cntnt text-center">
                                 <h3>Account & Team</h3>
                                 <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer.
                                 </p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- section smart search -->
      {{-- <section class="smart_search_section dark p_120 pt-0 ">
         <div class="container">
            <div class="smart_search_inner">
               <div class="smart_srch_content text-center size18">
                  <h2 data-aos="zoom-in" data-aos-duration="1000">AI-Powered Smart Search</h2>
                  <p  data-aos="zoom-in" data-aos-duration="1000" class="smart-p">Quickly discover and compare the best products with our AI-powered
                     search,
                     designed to match your
                     specific needs and preferences.
                  </p>
                  <div class="smrt-srch-inpt"  data-aos="zoom-in" data-aos-duration="1000">
                     <textarea rows="3"
                        placeholder="Enter a product, category, or what you’d like to compare..."></textarea>
                     <div class="input-btn">
                        <button type="" class=""><img src="{{asset('front/img/btn-img.svg') }}" alt=""></button>
                     </div>
                  </div>
               </div>
               <div class="back-image1">
                  <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt="">
               </div>
               <div class="back-image2">
                  <img src="{{asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt="">
               </div>
            </div>
         </div>
      </section> --}}

      <!-- section FAQ -->
      <section class="faq-section p_120 pt-0 light">
         <div class="container">
            <div class="faq-inner">
               <div class="faq-hd text-center"  data-aos="zoom-in" data-aos-duration="1000">
                  <h2>Frequently Asked Questions</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                     the industry's standard dummy text ever since the 1500s.
                  </p>
               </div>
               @if(isset($faqs) && $faqs->isNotEmpty())
                  <div class="faq-accor">
                     <div class="accordion" id="accordionExample">
                        @foreach($faqs as $faq)
                           <div class="accordion-item" data-aos="fade-up" data-aos-duration="1000">
                              <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                 <button class="accordion-button {{ $loop->first ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $faq->id }}">
                                    <span>{{ $faq->translations->isNotEmpty() ? $faq->translations->first()->question : ($faq->question) ?? '' }}</span>
                                 </button>
                              </h2>
                              <div id="collapse{{ $faq->id }}"
                                 class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                 aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                                 <div class="accordion-body">
                                    {{ strip_tags($faq->translations->isNotEmpty() ? $faq->translations->first()->answer : ($faq->answer) ?? '') }}
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  </div>
               @endif
            </div>
         </div>
      </section>
@endsection
