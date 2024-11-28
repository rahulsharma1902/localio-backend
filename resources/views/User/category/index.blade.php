
@extends('user_layout.master')
@section('content')

<section class="banner_sec help-cntr-bnr inr-bnr dark " style="background-color: #003F7D;">
   <div class="bubble-wrp">
      <img src="{{asset('front/img/small-bnnr-bg.png') }}" alt="">
   </div>
   <div class="banner_content">
      <div class="container">
         <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
            <div class="banner_text_col">
               <div class="banner_content_inner">
                  <h1>Browse Our Software Categories</h1>
                  <p>Find your software in one of our 900+ categories. From Accounting to Yoga Studio
                     Management, we cover it all!
                  </p>
                  <div class="search-bar-wrp">
                     <div class="search-box">
                        <input type="text"
                           placeholder="Enter a product, category, or what you’d like to compare...">
                        <i class="fa fa-search"></i>
                     </div>
                  </div>
               </div>
            </div>
            <div class="banner_image_col">
               <div class="banner_image">
                  <img src="{{asset('front/img/ctgry-bannr.png') }}" class="banner_top_image">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="sfwr_sec light p_120">
   <div class="container">
      <div class="sfwr_content">
         <h2 data-aos="zoom-in" data-aos-duration="1000">{{ __('home.category_page_heading') }}</h2>
         @if(isset($categories) && $categories->isNotEmpty())
            @foreach($categories as $category)
            <div class="row gy-4">
               <div class="col-lg-4 col-md-6"  data-aos="fade-up" data-aos-duration="1000">
                  <div class="sfwr_box">
                     <div class="sfwr_hd">
                        @if($category->image)
                           <div class="sfwr_img">
                              <img src="{{asset('CategoryImages/'.$category->image ) }}">
                           </div>
                        @endif
                        <div class="sfwr_name">
                           <h6 class="big-bld">   {{ $category->translations->isNotEmpty() ? $category->translations->first()->name : $category->name }}</h6>
                        </div>
                        <div class="sfwr_name">
                           <h6 class="big-bld">{{ strip_tags($category->translations->isNotEmpty() ? $category->translations->first()->description : $category->description) }}</h6>
                           </h6>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         @endif   
      </div>
   </div>
</section>

@endsection
