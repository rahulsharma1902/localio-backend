<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
         integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
         integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"
         integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/> -->
      
      <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

         <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
         <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

               <!-- SweetAlert2 CSS -->
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

      <!-- SweetAlert2 JS -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

      <title>home page</title>
   </head>
   <body>
         @php
            $HeaderContentImage = \App\Models\HeaderContent::where('lang_code','en')->get();
         @endphp
   <header>
      <section class="sec_head">
         <div class="bottom_header dark">
            <div class="container-fluid">
               <div class="header_row">
                  <div class="search_logo">
                     <div class="logo_col">
                     @if(isset($HeaderContentImage))
                        @foreach($HeaderContentImage as $image)
                           @if($image->meta_key == 'header logo')
                              <a href="{{url('/' ?? '' )}}" class="brand"><img src="{{ asset($image->meta_value) }}" alt="{{ $image->meta_key }}"></a>
                           @endif
                        @endforeach
                     @endif   
                     </div>
                  </div>
                  <div id="myID" class="search-box">
                     <input type="text" placeholder="{{__('home.header_page_search_placeholder')}}">
                     <i class="fa fa-search"></i>
                  </div>
                  <div class="header_button_col">
                     <div class="Header_buttons">
                        <!-- <a href="login.html" class="cta cta_trans">Login</a>
                        <a href="#" class="cta cta_orange">Sign Up</a> -->
                        @if(!auth()->user())
                        <a href="{{ url('login') ?? '' }}" class="cta cta_trans">Login</a>
                        <a href="{{ url('register') ?? '' }}" class="cta cta_orange">Sign Up</a>
                        @else
                        <a href="{{ route('logout') ?? '' }}" class="cta cta_orange">Sign Out</a>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="top_header dark">
            <div class="container-fluid">
               <nav class="navbar navbar-expand-lg">
                  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                     aria-expanded="false" aria-label="Toggle navigation">
                     <span class="bar"></span>
                     <span class="bar"></span>
                     <span class="bar"></span>
                  </button>
                  <?php
                        use App\Models\Category; 

                        $categories = Category::all();
                  ?>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <div class="left_menu">
                        <ul class="menu">
                           <li class=" menu-item cat_menu_item dropdown dropdown-6  mobile-drop">
                              <a href="#" class="cat_menu">Categories</a>
                              <span class="dropdown_toggle"><i class="fa-solid fa-chevron-down"></i></span>
                              <ul class="dropdown_menu dropdown_menu--animated dropdown_menu-6 mob-drp-contnt">
                                 @foreach($categories as $category)
                                 <li class="dropdown_item-1">
                                    <a href="#">{{$category->name ?? '' }}</a>
                                 </li>
                                @endforeach
                              </ul>
                           </li>
                           <li class=" menu-item dropdown dropdown-6 mobile-drop">
                              <a href="#" class="product_menu">Top Rated Products</a>
                              <span class="dropdown_toggle"><i class="fa-solid fa-chevron-down"></i></span>
                              <ul class="dropdown_menu dropdown_menu--animated dropdown_menu-6 mob-drp-contnt">
                                 <li class="dropdown_item-1">
                                    <a href="#">Item 1</a>
                                 </li>
                                 <li class="dropdown_item-2">
                                    <a href="#">Item 2</a>
                                 </li>
                                 <li class="dropdown_item-3">
                                    <a href="#">Item 3</a>
                                 </li>
                                 <li class="dropdown_item-4">
                                    <a href="#">Item 4</a>
                                 </li>
                                 <li class="dropdown_item-5">
                                    <a href="#">Item 5</a>
                                 </li>
                              </ul>
                           </li>
                           <li class=" menu-item dropdown dropdown-6 mobile-drop">
                              <a href="#">Exclusive Deals</a>
                              <span class="dropdown_toggle"><i class="fa-solid fa-chevron-down"></i></span>
                              <ul class="dropdown_menu dropdown_menu--animated dropdown_menu-6 mob-drp-contnt">
                                 <li class="dropdown_item-1">
                                    <a href="#">Item 1</a>
                                 </li>
                                 <li class="dropdown_item-2">
                                    <a href="#">Item 2</a>
                                 </li>
                                 <li class="dropdown_item-3">
                                    <a href="#">Item 3</a>
                                 </li>
                                 <li class="dropdown_item-4">
                                    <a href="#">Item 4</a>
                                 </li>
                                 <li class="dropdown_item-5">
                                    <a href="#">Item 5</a>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                     <div class="right_menu">
                        <ul>
                           <li>
                              <a href="{{route('expert-guide')}}">Expert Guides</a>
                           </li>
                           <li>
                              <a href="{{route('help-center')}}">Help Center</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </section>
   </header>
   <!-- header section end -->
   <!-- content section start -->
   @yield('content')
   <!-- content section end -->
   <!-- footer  -->
   <footer class="dark">
      <div class="container">
         <div class="footer-wrp ">
            <div class="row foot-row">
               <div class="col-lg-9">
                  <div class="foot-row-lft p_80">
                     <div class="foot-logo">
                        <a href="index.html">
                           <img src="{{asset('front/img/foot-logo.svg') }}" alt="">
                        </a>
                     </div>
                     <div class="foot-col">
                        <h6>Discover</h6>
                        <ul class="foot-col-list">
                           <li><a href="{{route('category')}}">Categories</a></li>
                           <li><a href="{{route('top-rated-product')}}">Top-Rated Products </a></li>
                           <li><a href="javascript:void(0)">Exclusive Deals</a></li>
                        </ul>
                     </div>
                     <div class="foot-col">
                        <h6>Company</h6>
                        <ul class="foot-col-list">
                           <li><a href="{{route('who-we-are')}}">Who We Are</a></li>
                           <li><a href="{{route('privacy-policy')}}">Privacy Policy </a></li>
                           <li><a href="{{route('terms-condition')}}">Terms & Conditions</a></li>
                        </ul>
                     </div>
                     <div class="foot-col">
                        <h6>Vendors</h6>
                        <ul class="foot-col-list">
                           <li><a href="{{route('vendor-get-listed')}}">Get Listed</a></li>
                           <li><a href="{{route('login')}}">Vendor Login</a></li>
                        </ul>
                     </div>
                     <div class="foot-col">
                        <h6>Help</h6>
                        <ul class="foot-col-list">
                           <li>
                              <a href="{{route('expert-guide')}}">Expert Guides</a>
                           </li>
                           <li>
                              <a href="{{route('help-center')}}">Help Center</a>
                           </li>
                           <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="foot-row-right foot-col p_80">
                     <h6>Follow Us</h6>
                     <ul class="foot-right-list">
                        <li><a href="" class="d-flex align-items-center"><i class="fa-brands fa-facebook-f"
                                 style="color: #ffffff;"></i>Facebook </a></li>
                        <li><a href="" class="d-flex align-items-center"><i class="fa-brands fa-instagram"
                                 style="color: #ffffff;"></i>Instagram </a></li>
                        <li><a href="" class="d-flex align-items-center"><i class="fa-brands fa-twitter"
                                 style="color: #ffffff;"></i>Twitter</a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="foot-btm d-flex justify-content-between">
               <div class="ft-btm-lft">
                  <p>©<?php echo date('Y');?> Localio. All rights reserved.</p>
               </div>
               <div class="ft-btm-rgt">
                  <div class="select-menu ">
                  <?php
                     use Illuminate\Support\Facades\Session;
                     
                     // Get the current language/locale of the application
                     $currentLanguage = app()->getLocale();
        
                     // Get the current language code from session (if exists)
                     $session_lang_code = Session::get('current_lang');
                     
                     // If no language is set in the session, store the current app language in the session
                     if ($session_lang_code === null) {
                        Session::put('current_lang', $currentLanguage);  // Store current language code in session
                     }

                     // Optionally, set the app's locale to the session language
                     $session_lang_code = Session::get('current_lang'); // Get the updated language from the session
                     app()->setLocale($session_lang_code);  // Set the app's locale to the session language
                  ?>

                     @php
                        use App\Models\SiteLanguages; 
                        $languages = SiteLanguages::with('language')->get();  
                     @endphp
                     @foreach($languages as $language)
      
                        @if($language->handle == $session_lang_code)
                              <?php  $curent_selected_lang = $language->name; ?>
                        @endif
                     @endforeach
                     <div class="select-btn">
                        <span class="sBtn-text">{{ $curent_selected_lang ?? 'English' }}</span>
                        <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
                     </div>

                     <ul class="options">
                        @foreach($languages as $language)
                           <li class="option">
                                 <span class="option-text">
                                    <a href="{{ route('change-lang',['langCode'=>$language->handle]) }}">
                                       {{ $language->name }}
                                    </a>
                                 </span>
                           </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!----------------------------------------- read section end --------------------------------------- -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
      integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   
   <script src="{{ asset('front/js/script.js') }}"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   


   <script>
      $(function () {
         AOS.init();
      });

   </script>
   <script type="text/javascript"></script>
   <!-- header search js -->
   <script>
      $(document).ready(function () {
         function checkScroll() {
            const $myElement = $('#myID');
            if ($(window).scrollTop() > 460) {
               $myElement.show();
            } else {
               $myElement.hide();
            }
         }
         checkScroll();
         $(window).on('scroll', checkScroll);
      });

   $(document).ready(function(){
      $('.cat_menu').click(function(){
         window.location.href='/category';
      });
      $('.product_menu').click(function(){
         window.location.href='/top-rated-product';

      });
   })
   </script>
<!-- <script>
    @if (Session::has('error'))
        toastr.clear();
        NioApp.Toast('{{ Session::get('error') }}', 'error', {
            position: 'top-right'
        });
    @endif

    @if (Session::has('success'))

        toastr.clear();
        NioApp.Toast('{{ Session::get('success') }}', 'info', {
            position: 'top-right'
        });
    @endif
</script> -->
<script>
    @if (Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get('error') }}',
            position: 'top-right',
            toast: true,
            showConfirmButton: false,
            timer: 3000, // Auto close after 3 seconds
        });
    @endif

    @if (Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ Session::get('success') }}',
            position: 'top-right',
            toast: true,
            showConfirmButton: false,
            timer: 3000, // Auto close after 3 seconds
        });
    @endif
</script>



</body>
</html>
