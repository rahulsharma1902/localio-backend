
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
                  <h2 class="text-center">Register to Localio</h2>
                  <p class="text-center">Create an account</p>
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
                <form class="register_form" action="{{ route('register.process', ['locale' => app()->getLocale()]) }}" method="post" id="registerForm">


                    @csrf

                    <!-- First Name Input Field -->
                    <div class="form-group ">
                        <input type="text" class="form-control" name="first_name" id="firstName" placeholder="First Name">
                        <span id="firstNameError" class="error text-danger"></span>
                        @if ($errors->has('first_name'))
                            <div class="col-12">
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            </div>
                        @endif
                    </div>
                  
                    <!-- Last Name Input Field -->
                    <div class="form-group ">
                        <input type="text" class="form-control" name="last_name" id="lastName" placeholder="Last Name">
                        <span id="lastNameError" class="error text-danger"></span>
                        @if ($errors->has('last_name'))
                            <div class="col-12">
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            </div>
                        @endif
                    </div>
                   
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="emailAddress" placeholder="Email">
                        <span id="emailAddressError" class="error text-danger"></span>

                        @if ($errors->has('email'))
                            <div class="col-12">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        @endif
                    </div>

                    <select name="country_id" class="form-control form-inp-box move-focus mb-4" id="country" style="cursor:pointer;">
                        @foreach($countries as $key=> $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>    
                    @if ($errors->has('country_id'))
                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    @endif
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span id="togglePassword" class="eye-icon" style="cursor: pointer;">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <span id="passwordError" class="error text-danger"></span>
                    </div>
                  
                    <div class="form-group">
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                        <span id="togglePasswordConfirm" class="eye-icon" style="cursor: pointer;">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                        <span id="confirmError" class="error"></span>
                    </div>
                  
                    <p class="new-accnt text-center mt-4">
                        New to Localio? <a href="{{route('login')}}" class="sk_blu big-bld">Sign up</a>
                    </p>
                    <div class="accor-btn">
                        <button type="submit" class="cta cta_white register_btn">Sign Up</button>
                    </div>
                  
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
    $(document).ready(function(){
        $('.register_btn').click(function(e){
            e.preventDefault();  // Prevent form submission

            let form = $('#registerForm');
            let valid = true;

            // Validate each input field
            form.find('input, select').each(function() {
                let input = $(this);
                // let errorElement = $('#' + input.attr('id') + 'Error');
                let errorElement = $('#' + input.attr('id') + 'Error');

                console.log(errorElement);
                let value = input.val().trim();
                let errorMessage = '';
                let password = $('#password').val().trim();
                let confirmPassword = $('#password-confirm').val().trim();

                // Email field validation
                if (input.attr('type') === 'email' ) {
                    if (value === '') {
                        errorMessage = 'Please enter an email.';
                    } else {
                        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                        if (!emailRegex.test(value)) {
                            errorMessage = 'Please enter a valid email address.';
                        }
                    }
                }
                // Password field validation
                else if (input.attr('type') === 'password') {
                    console.log('Password value:', value); // Check the value of the password input

                    if (value === '') {
                        errorMessage = 'Please enter a password.';
                    } else if (value.length < 6) { // Example: password should be at least 6 characters
                        errorMessage = 'Password must be at least 6 characters long.';
                    }

                    // Additional check for confirm password matching
                    if (confirmPassword !== password) {
                        errorMessage = 'Passwords do not match.';
                    }
                }
                // Text field validation (for first_name or other text fields)
                else if (input.attr('type') === 'text' && value === '') {
                    errorMessage = 'This field is required.';
                }

                // If there's an error message, display it
                if (errorMessage) {
                    errorElement.text(errorMessage).show();
                    valid = false;
                } else {
                    errorElement.hide();
                }
            });

            // If all fields are valid, submit the form
            if (valid) {
                form.submit();
            }
        });
    });


 
</script>
@endsection
