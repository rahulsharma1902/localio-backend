
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
                  <h2 class="text-center">New Password</h2>
               </div>
               <!-- Continue with the rest of your form -->
                <form class="login_form" action="{{ route('new-password-procc', ['locale' => app()->getLocale()]) }}" method="post">
                    @csrf
                  <!-- <div class="form-group">
                     <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                     <span id="togglePassword" class="eye-icon">
                     <i class="fa fa-eye-slash"></i>
                     </span>
                  </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="form-group">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                        <span id="togglePasswordConfirm" class="eye-icon">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif -->
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span id="togglePassword" class="eye-icon" style="cursor: pointer;">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif

                    <div class="form-group">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                        <span id="togglePasswordConfirm" class="eye-icon" style="cursor: pointer;">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  <div class="form-row align-items-center">
                     <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                            <label class="form-check-label small" for="rememberMe">Remember me</label>
                        </div>
                     </div>
                  </div>
                  <div class="accor-btn">
                     <button type="submit" class="cta cta_white">Save</button>
                  </div>
                  <p class="new-accnt text-center mt-4">
                     New to Localio? <a href="#" class="sk_blu big-bld">Sign up</a>
                  </p>
                </form>
            </div>
         </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
      $(document).ready(function() {
            // Toggle password visibility
            $('#togglePassword').on('click', function() {

                const passwordInput = $('#password');
                
                const icon = $(this).find('i');
                
                // Toggle the type attribute
                const type = passwordInput.attr('type') === 'password' ? 'password' : 'text';
                console.log(type)
                passwordInput.attr('type', type);
                // Toggle the eye icon
                icon.toggleClass('fa-eye-slash fa-eye');
            });

            // Toggle confirm password visibility
            $('#togglePasswordConfirm').on('click', function() {
                const passwordConfirmInput = $('#password-confirm');
                const icon = $(this).find('i');
                // Toggle the type attribute
                const type = passwordConfirmInput.attr('type') === 'password' ? 'text' : 'password';
                passwordConfirmInput.attr('type', type);
                // Toggle the eye icon
                icon.toggleClass('fa-eye-slash fa-eye');
            });
        });
 
</script>
@endsection
