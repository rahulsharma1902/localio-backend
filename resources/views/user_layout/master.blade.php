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
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

         <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
         <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

      <title>home page</title>
   </head>
   <body>
      <header>
         <div class="bottom_header dark">
            <div class="container-fluid">
               <div class="header_row">
                  <div class="logo_col">
                     <a href="{{ url('/') ?? '' }}" class="brand"><img src="{{ asset('front/img/logo.svg') ?? '' }}"></a>
                  </div>
                  <div class="header_button_col">
                     <div class="Header_buttons">
                        <a href="{{ url('login') ?? '' }}" class="cta cta_trans">Login</a>
                        <a href="{{ url('register') ?? '' }}" class="cta cta_orange">Sign Up</a>
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
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <div class="left_menu">
                        <ul class="menu">
                           <li class=" menu-item cat_menu_item dropdown dropdown-6  mobile-drop">
                              <a href="#" class="cat_menu"><img src="{{ asset('front/img/cat.png') }}" alt="">Categories</a>
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
                              <a href="#">Top Rated Products</a>
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
                        <ul class="right_mnu_list">
                           <li>
                              <a href="#">Expert Guides</a>
                           </li>
                           <li>
                              <a href="#">Help Center</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </header>

      <!-- content section -->
        @yield('content')
      <!-- content section end here -->
      <!-- footer  -->
      <footer class="dark">
         <div class="container">
            <div class="footer-wrp ">
               <div class="row foot-row">
                  <div class="col-lg-9">
                     <div class="foot-row-lft p_80">
                        <div class="foot-logo">
                           <img src="{{ asset('front/img/foot-logo.svg') }}" alt="">
                        </div>
                        <div class="foot-col">
                           <h6>Discover</h6>
                           <ul class="foot-col-list">
                              <li><a href="">Categories</a></li>
                              <li><a href="">Top-Rated Products </a></li>
                              <li><a href="">Exclusive Deals</a></li>
                           </ul>
                        </div>
                        <div class="foot-col">
                           <h6>Company</h6>
                           <ul class="foot-col-list">
                              <li><a href="">Who We Are</a></li>
                              <li><a href="">Privacy Policy </a></li>
                              <li><a href="">Terms & Conditions</a></li>
                           </ul>
                        </div>
                        <div class="foot-col">
                           <h6>Vendors</h6>
                           <ul class="foot-col-list">
                              <li><a href="">Get Listed</a></li>
                              <li><a href="">Vendor Login</a></li>
                           </ul>
                        </div>
                        <div class="foot-col">
                           <h6>Help</h6>
                           <ul class="foot-col-list">
                              <li><a href="">Expert Guides</a></li>
                              <li><a href="">Help Center</a></li>
                              <li><a href="">Contact</a></li>
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
                     <p class="m-0">© 2024 Localio.com, All rights reserved.</p>
                  </div>
                  <div class="ft-btm-rgt">
                     <div class="select-menu ">
                        <div class="select-btn">
                           <span class="sBtn-text">United States-English</span>
                           <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
                        </div>
                        <ul class="options">
                           <li class="option">
                              <span class="option-text">United States-English</span>
                           </li>
                           <li class="option">
                              <span class="option-text">United States-Hindi</span>
                           </li>
                           <li class="option">
                              <span class="option-text">United States-new</span>
                           </li>
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
   </body>
</html>
