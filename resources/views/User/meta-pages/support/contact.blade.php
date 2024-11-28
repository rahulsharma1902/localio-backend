@extends('user_layout.master')
@section('content')

<section class="banner_sec help-cntr-bnr inr-bnr dark" style="background-color: #003F7D;">
    <div class="bubble-wrp">
        <img src="{{asset('front/img/small-bnnr-bg.png') }}" alt="">
    </div>
    <div class="banner_content">
        <div class="container">
            <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                <div class="banner_text_col">
                    <div class="banner_content_inner">
                    <h1>Contact Us</h1>
                    </div>
                </div>
                <div class="banner_image_col">
                    <div class="banner_image">
                    <img src="{{asset('front/img/contc_bnr_ryt.png') }}" class="banner_top_image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact_sec p_120 light">
    <div class="container">
        <div class="contact_content"  data-aos="fade-up" data-aos-duration="1000">
            <div class="hd_text">
                <h2 class="text-center">Contact Us</h2>
            </div>
            <form action="/submit_contact" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" id="phone-number" name="phone-number" placeholder="Phone Number" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="msg_Box">
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="top-pro-btn  snd_bttn">
                    <button type="submit" class="btn cta cta_orange">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>


<!-- section right-tool -->
<section class="right_tool_sec dark p_80">
   <div class="container">
      <div class="right-tool-wrp text-center" data-aos="fade-up" data-aos-duration="1000">
         <div class="otr_rgtool">
            <h2>Find the Right Tool</h2>
         </div>
         <div class="right-tool-pack">
            <div class="row">
               <div class="col-lg-4">
                  <div class="tool-card">
                     <div class="tool-card-img">
                        <img src="{{asset('front/img/right-tool-img1.png') }}" alt="">
                     </div>
                     <div class="tool-crd-bdy">
                        <h3 class="tool_hed">Verified User Reviews</h3>
                        <p class="size18">Read real feedback from verified users to help you make the right choice.
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
                        <h3 class="tool_hed">Feature and Price Comparisons</h3>
                        <p class="size18">Easily compare software based on key features, pricing, and customer
                           ratings. </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="tool-card">
                     <div class="tool-card-img">
                        <img src="{{asset('front/img/right-tool-img3.png') }}" alt="">
                     </div>
                     <div class="tool-crd-bdy">
                        <h3 class="tool_hed">Independent Insights</h3>
                        <p class="size18">Access unbiased, data-driven research to get the most value from your
                           software. </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="right-tool-btn text-center">
            <a href="" class="cta">Get Started</a>
         </div>
      </div>
   </div>
   <div class="back-image1">

      <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt="">

   </div>

   <div class="back-image2">

      <img src="{{asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt="">

   </div>
</section>

@endsection
