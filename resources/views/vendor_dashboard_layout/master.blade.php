<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    use App\Models\HomeContent; // Import your model

    // Fetch meta title and description from database
     $metaUserLoginTitle = HomeContent::where('meta_key', 'meta_vendor')->value('meta_value') ?? 'Default Title';
    $metaUserLoginDescription = HomeContent::where('meta_key', 'meta_vendor_description')->value('meta_value') ?? 'Default Description';

    ?>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta name="description" content="<?= htmlspecialchars($metaUserLoginDescription, ENT_QUOTES, 'UTF-8'); ?>">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"
      integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('vender_dashboard/css/vendr_dash.css')}}" />
   <link rel="stylesheet" href="{{asset('vender_dashboard/css/vendr_dash_resp.css')}}" />
   <link rel="stylesheet" href="{{asset('vender_dashboard/css/19feb.css')}}" />
   <link rel="stylesheet" href="{{asset('vender_dashboard/css/20feb.css')}}" />
   <link rel="stylesheet" href="{{asset('vender_dashboard/css/21feb.css')}}" />
   <link rel="stylesheet" href="{{asset('vender_dashboard/Basis Grotesque Pro/stylesheet.css')}}">
   <link rel="shortcut icon" href="{{ url('front/img/icon.svg') }}">
   <title><?= htmlspecialchars($metaUserLoginTitle, ENT_QUOTES, 'UTF-8'); ?></title>
</head>

<body>
   <header class="main_dhdr">
      <div class="container-fluid">
         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="hdr_lft">
               <a class="navbar-brand" href="{{route('home')}}">
                  <img src="{{asset('vender_dashboard/img/locailo_logo.png')}}" class="img-fluid">
               </a>
               <button class="menu-toggler" style="display: none;">
                  <span class="bar bar1"></span>
                  <span class="bar bar2"></span>
                  <span class="bar bar3"></span>
            </div>
            </button>
            <div class="hdr_ryt">
               <div class="hdr_info">
                  <div class="form">
                     <input type="search" class="search-box"
                        placeholder="Enter a product, category, or what you’d like to compare...">
                     <button class="btn cta_dark active"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                  <div class="notf drop_menu">
                     <a class="notfictn_lnk">
                        <img src="{{asset('vender_dashboard/img/bell_icon.svg')}}" class="img-fluid">
                        <span class="badge custom-badge badge-success">6</span>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right notify-drop-main" style="margin-right: 20px;">
                        <div class="dropdown-main notify-drop">
                           <div class="user_detail_hd p_lft_rgt">
                              <h5 class="m-0 ">All Notification</h5>
                           </div>
                           <div class="all-unread-tabs">
                              <div class="all-unread-hd d-flex align-items-center p_lft_rgt">
                                 <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                       <button class="nav-link active" id="pills-All-tab" data-bs-toggle="pill"
                                          data-bs-target="#pills-All" type="button" role="tab" aria-controls="pills-All"
                                          aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                       <button class="nav-link" id="pills-Unread-tab" data-bs-toggle="pill"
                                          data-bs-target="#pills-Unread" type="button" role="tab"
                                          aria-controls="pills-Unread" aria-selected="false">Unread(3)</button>
                                    </li>
                                 </ul>
                                 <div class="mark-as">
                                    <a href="">Mark all as read</a>
                                 </div>
                              </div>
                              <div class="tab-content" id="pills-tabContent">
                                 <div class="tab-pane fade show active" id="pills-All" role="tabpanel"
                                    aria-labelledby="pills-All-tab">
                                    <div class="notify-cntnt">
                                       <div class="day p_lft_rgt">
                                          <span>Today</span>
                                       </div>
                                       <ul class="list-unstyled m-0">
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img1.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img2.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/nootify-img3.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img4.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <!-- clone -->
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img2.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/nootify-img3.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img4.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/nootify-img3.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade" id="pills-Unread" role="tabpanel"
                                    aria-labelledby="pills-Unread-tab">
                                    <div class="notify-cntnt">
                                       <div class="day p_lft_rgt">
                                          <span>Today</span>
                                       </div>
                                       <ul class="list-unstyled m-0">
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img2.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/nootify-img3.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img4.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                          <li>
                                             <a class="d-flex p_lft_rgt" href="">
                                                <div class="notify-pic">
                                                   <img src="{{asset('vender_dashboard/img/notify-img4.png')}}" alt="">
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and
                                                   typesetting industry.
                                                </p>
                                                <div class="time">
                                                   <span>1 hr</span>
                                                </div>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="user_img drop_menu">
                     <div class="usr_profile">
                        <img src="{{asset('vender_dashboard/img/usr_img.png')}}" class="img-fluid">
                     </div>
                     <div class="dropdown-menu dropdown-menu-right" style="margin-right: 20px;">
                        <div class="dropdown-main ">
                           <div class="user_detail">
                              <div class="user_img">
                                 MI
                              </div>
                              <div class="user_name">
                                 <h5>Mi name</h5>
                                 <p>mi@gmail.com</p>
                              </div>
                           </div>
                           <div class="dash-icon">
                              <a class="dropdown-item" href="{{ route('vendor-dashboard', ['locale' => app()->getLocale()]) }}"><i class="fa fa-user"></i>Dashboard
                              </a>
                           </div>
                           <div class="dash-icon">
                              <a class="dropdown-item" href="#"><i class="fa fa-cog"></i>Configuration
                              </a>
                           </div>
                           <div class="dash-icon">
                              <a class="dropdown-item" href="#"><i class="fas fa-wallet"></i>Logo
                                 Backup</a>
                           </div>
                           <div class="dash-icon">
                              <a class="dropdown-item" href="#"><i
                                    class="fa-solid fa-envelope-open-text"></i>Invoices</a>
                           </div>
                           <div class="dash-icon">
                              <a class="dropdown-item" href="#"><i class="fa-solid fa-headset"></i>Support
                                 Tickets</a>
                           </div>
                           <div class="dash-icon">
                              <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>Log Out</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
      </div>
   </header>
   <section class="user_dashbord">
      <div class="row">
         <div class="col-lg-3 p-0">
            <div class="dashboard_lft">
               <div class="left-text">
                  <ul class="list-unstyled dash-tab mb-0" id="menu">
                     <li class="nav-links">
                        <a href="{{ route('vendor-overview', ['locale' => app()->getLocale()]) }}" class="nav-link active">
                           <div class="side-links">
                              <span class="icons-links">
                                 <img src="{{asset('vender_dashboard/img/my_account.svg')}}" alt="">
                              </span>
                              <span class="icons-text">Overview</span>
                           </div>
                        </a>
                     </li>
                     <li class="nav-links">
                        <a href="{{ route('vendor-my-listing', ['locale' => app()->getLocale()]) }}" class="nav-link nav_sv">
                           <div class="side-links">
                              <div class="side_flex">
                                 <div class="sidein_box">
                                    <span class="icons-links">
                                       <img src="{{asset('vender_dashboard/img/manage list_img.svg')}}" alt="">
                                    </span>
                                    <span class="icons-text">Manage Listings</span>
                                 </div>
                                 <div class="sidein_box">
                                    <span class="arrow">
                                       <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <ul class="sublist">
                           <li class="sublist_li">
                              <a class="sublist_inside" href="{{ route('vendor-add-new-list', ['locale' => app()->getLocale()]) }}">Add New Listing</a>
                           </li>
                           <li class="sublist_li">
                              <a class="sublist_inside" href="{{ route('vendor-edit-list', ['locale' => app()->getLocale()]) }}">Edit Listing</a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-links">
                        <a href="{{ route('vendor-analytics', ['locale' => app()->getLocale()]) }}" class="nav-link nav_sv">
                           <div class="side-links">
                              <div class="side_flex">
                                 <div class="sidein_box">
                                    <span class="icons-links">
                                       <img src="{{asset('vender_dashboard/img/Analytics & Reports_img.svg')}}" alt="">
                                    </span>
                                    <span class="icons-text">Analytics & Reports</span>
                                 </div>
                                 <div class="sidein_box">
                                    <span class="arrow">
                                       <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <ul class="sublist">
                           <li class="sublist_li">
                              <a class="sublist_inside" href="#">Profile Views
                              </a>
                           </li>
                           <li class="sublist_li">
                              <a class="sublist_inside" href="#">Engagement Metrics
                              </a>
                           </li>
                           <li class="sublist_li">
                              <a class="sublist_inside" href="#">Conversion Tracking
                              </a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-links">
                        <a href="#" class="nav-link nav_sv">
                           <div class="side-links">
                              <div class="side_flex">
                                 <div class="sidein_box">
                                    <span class="icons-links">
                                       <img src="{{asset('vender_dashboard/img/Advertising & Promotions_img.svg')}}" alt="">
                                    </span>
                                    <span class="icons-text">Advertising & Promotions</span>
                                 </div>
                                 <div class="sidein_box">
                                    <span class="arrow">
                                       <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <ul class="sublist">
                           <li class="sublist_li">
                              <a class="sublist_inside" href="{{ route('vendor-campaign', ['locale' => app()->getLocale()]) }}">Create New Ad Campaign
                              </a>
                           </li>
                           <li class="sublist_li">
                              <a class="sublist_inside" href="{{ route('vendor-managing-campaign', ['locale' => app()->getLocale()]) }}">Manage Existing Campaigns
                              </a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-links">
                        <a href="#" class="nav-link nav_sv">
                           <div class="side-links">
                              <div class="side_flex">
                                 <div class="sidein_box">
                                    <span class="icons-links">
                                       <img src="{{asset('vender_dashboard/img/Review Management_img.svg')}}" alt="">
                                    </span>
                                    <span class="icons-text">Review Management</span>
                                 </div>
                                 <div class="sidein_box">
                                    <span class="arrow">
                                       <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <ul class="sublist">
                           <li class="sublist_li">
                              <a class="sublist_inside" href="{{ route('vendor-review', ['locale' => app()->getLocale()]) }}">View User Reviews
                              </a>
                           </li>
                           <li class="sublist_li">
                              <a class="sublist_inside" href="{{ route('vendor-review-managment', ['locale' => app()->getLocale()]) }}">Respond to Reviews
                              </a>
                           </li>
                        </ul>
                     </li>

                     <li class="nav-links">
                        <a href="#" class="nav-link nav_sv">
                           <div class="side-links">
                              <div class="side_flex">
                                 <div class="sidein_box">
                                    <span class="icons-links">
                                       <img src="{{asset('vender_dashboard/img/Support_img.svg')}}" alt="">
                                    </span>
                                    <span class="icons-text">Support</span>
                                 </div>
                                 <div class="sidein_box">
                                    <span class="arrow">
                                       <i class="fa-solid fa-angle-right"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </a>
                        <ul class="sublist">
                           <li class="sublist_li">
                              <a class="sublist_inside" href="#">Support
                              </a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         @yield('content')
      </div>
   </section>
   <footer class="ds_ftr">
      <div class="container-fluid">
         <div class="foot_end_box">
            <div class="reserve_box">
               © 2024 Localio.com, All rights reserved.
            </div>
            <div class="reserve_box">
               <div class="custom-select" onclick="toggleSelect()">
                  <span id="selected-option">Mexico - Spanish</span>
                  <span class="arrow"><i class="fa-solid fa-chevron-down"></i></span> <!-- Downward arrow -->
               </div>
               <div class="dropdown-options">
                  <div class="option" onclick="selectOption(this)">Option 1</div>
                  <div class="option" onclick="selectOption(this)">Option 2</div>
                  <div class="option" onclick="selectOption(this)">Option 3</div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
      integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="{{asset('vender_dashboard/js/script.js')}}"></script>
   <script>
      AOS.init();
   </script>
</body>

</html>
