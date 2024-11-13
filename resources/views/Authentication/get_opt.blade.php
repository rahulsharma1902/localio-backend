
@extends('user_layout.master')
@section('content')

<section class="banner_sec help-cntr-bnr inr-bnr dark lg_Bnr" style="background-color: #003F7D;">
   <div class="bubble-wrp">
      <img src="{{ asset('front/img/small-bnnr-bg.png') ?? '' }}" alt="">
   </div>
</section>
<section class="contact_sec login_form p_120 pt-0 light">
   <div class="container">
      <div class="contact_content" data-aos="fade-up" data-aos-duration="1000">
         <div class="hd_text">
            <h2 class="text-center">Recover your passwordt</h2>
         </div>
         <!-- Your existing form -->

         <!-- Continue with the rest of your form -->
            <form class="login_form" action="{{ route('opt.procc', ['locale' => app()->getLocale()]) }}" method="post">
               @csrf
            <div class="form-group">
               <input type="text" class="form-control" name="otp"  id="opt" placeholder="Enter your otp">
            </div>
               @if ($errors->has('otp'))
                  <span class="text-danger">{{ $errors->first('otp') }}</span>
               @endif
            
            <div class="accor-btn">
               <button type="submit" class="cta cta_white">Confirm Otp</button>
            </div>
            <p class="new-accnt text-center mt-4">
               New to Localio? <a href="#" class="sk_blu big-bld">Sign up</a>
            </p>
         </form>
      </div>
   </div>
</section>
@endsection
