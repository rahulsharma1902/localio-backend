
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
            <h2 class="text-center">Login To Your Account</h2>
            <p class="text-center">Welcome back! Please choose a login method</p>
         </div>
         <div class="scl_login">
            <div class="row">
               <div class="col-md-6">
                  <div class="login_box size18">
                     <a href="{{route('google.login')}}" class="login_link" style="background: #DB4437;">
                     <span class="scl-icn"><i class="fa-brands fa-google"></i></span>
                     Login with Google
                     </a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="login_box size18">
                     <a href="{{ route('login.facebook') }}" class="login_link">
                     <span class="scl-icn"><i class="fa-brands fa-facebook"></i></span>
                     Login with Facebook
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Your existing form -->
         <div class="or-separator">
            <span class="size16">or</span>
         </div>
         <!-- Continue with the rest of your form -->
         <form class="login_form" action="{{ url(app()->getLocale() . '/loginprocc') }}" method="post">

               @csrf
            <div class="form-group">
               <input type="email" class="form-control" name="email"  id="emailAddress" placeholder="Email">
            </div>
               @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
               @endif
            <div class="form-group">
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
               <span id="togglePassword" class="eye-icon">
               <i class="fa fa-eye-slash"></i>
               </span>
            </div>
               @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
               @endif
            <div class="form-row align-items-center">
               <div class="col">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="rememberMe">
                     <label class="form-check-label small" for="rememberMe">
                     Remember me
                     </label>
                  </div>
               </div>
               <div class="col frgt_btn text-right">
                  <a href="{{url('recover-password')}}" class="small">Forgot Passwoed?</a>
               </div>
            </div>
            <div class="accor-btn">
               <button type="submit" class="cta cta_white">Log In</button>
            </div>
            <p class="new-accnt text-center mt-4">
               New to Localio? <a href="{{route('register')}}" class="sk_blu big-bld">Sign up</a>
            </p>
         </form>
      </div>
   </div>
</section>

@endsection
