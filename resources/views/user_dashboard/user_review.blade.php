@extends('user_dashboard_layout.master')
@section('content')


       <div class="col-lg-9 p-0">
          <div class="user_content">
             <div class="uer_nm">
                <h1>My Reviews</h1>
             </div>
             <div class="crt_main ">
                <div class="cart_dv review_dv">
                   <div class="crt-lft-top d-flex">
                      <div class="cart_img crt-lft-img">
                         <img src="{{asset('user-dashboard-theme/img/review-img.png')}}" class="img-fluid">
                      </div>
                      <div class="cart_text">
                         <h4>Jhon Doe</h4>
                         <div class="crt-ratings d-flex">
                            <div class="star-div d-flex">
                               <div class="stars">
                                  <ul class="list-unstyled m-0 d-flex">
                                     <li><img src="{{asset('user-dashboard-theme/img/green-stars.svg')}}" alt=""></li>
                                     <li><img src="{{asset('user-dashboard-theme/img/green-stars.svg')}}" alt=""></li>
                                     <li><img src="{{asset('user-dashboard-theme/img/green-stars.svg')}}" alt=""></li>
                                     <li><img src="{{asset('user-dashboard-theme/img/green-stars.svg')}}" alt=""></li>
                                     <li><img src="{{asset('user-dashboard-theme/img/green-half-star.svg')}}" alt=""></li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="review-btm d-flex">
                      <div class="review-btm-lft">
                         <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry!</h6>
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                            with the release of Letraset sheets containing Lorem Ipsum passages, and more
                         </p>
                         <div class="month-ago">
                            <p class="m-0">1 month ago</p>
                         </div>
                      </div>
                      <div class="review-btm-rgt">
                         <div class="shr_dt dot">
                            <span class="elps_icn"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                            <div class="dropdown-menu_review">
                               <div class="user_name">
                                  <p class="text-center">Manage Logo</p>
                               </div>
                               <div class="dropdown-main ">
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-brands fa-slack"></i>Logo Details
                                     </a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-download"></i>Download Logo
                                     </a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fas fa-wallet"></i>Customization</a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-envelope-open-text"></i>Manage
                                     Logo Backup</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="cart_dv review_dv">
                   <div class="crt-lft-top d-flex">
                      <div class="cart_img crt-lft-img">
                         <img src="{{asset('user-dashboard-theme/img/review-img2.svg')}}" class="img-fluid">
                      </div>
                      <div class="cart_text">
                         <h4 class="m-0">Xero</h4>
                         <div class="crt-ratings d-flex">
                            <div class="star-p-txt d-flex">
                               <p>5.0</p>
                               <div class="star-div d-flex">
                                  <div class="stars">
                                     <ul class="list-unstyled m-0 d-flex">
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="review-btm d-flex">
                      <div class="review-btm-lft">
                         <h6 class="">Impressive!</h6>
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                            with the release of Letraset sheets containing Lorem Ipsum passages, and more
                         </p>
                         <div class="month-ago">
                            <p class="m-0">1 month ago</p>
                         </div>
                      </div>
                      <div class="review-btm-rgt">
                         <div class="shr_dt dot">
                            <span class="elps_icn"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                            <div class="dropdown-menu_review">
                               <div class="user_name">
                                  <p class="text-center">Manage Logo</p>
                               </div>
                               <div class="dropdown-main ">
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-brands fa-slack"></i>Logo Details
                                     </a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-download"></i>Download Logo
                                     </a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fas fa-wallet"></i>Customization</a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-envelope-open-text"></i>Manage
                                     Logo Backup</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="cart_dv review_dv">
                   <div class="crt-lft-top d-flex">
                      <div class="cart_img crt-lft-img">
                         <img src="{{asset('user-dashboard-theme/img/review-img3.png')}}" class="img-fluid">
                      </div>
                      <div class="cart_text">
                         <h4 class="m-0">Xero</h4>
                         <div class="crt-ratings d-flex">
                            <div class="star-p-txt d-flex">
                               <p>5.0</p>
                               <div class="star-div d-flex">
                                  <div class="stars">
                                     <ul class="list-unstyled m-0 d-flex">
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                        <li><img src="{{asset('user-dashboard-theme/img/star-img.svg')}}"></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="review-btm d-flex">
                      <div class="review-btm-lft">
                         <h6 class="">Great!</h6>
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s
                            with the release of Letraset sheets containing Lorem Ipsum passages, and more
                         </p>
                         <div class="month-ago">
                            <p class="m-0">1 month ago</p>
                         </div>
                      </div>
                      <div class="review-btm-rgt">
                         <div class="shr_dt dot">
                            <span class="elps_icn"><i class="fa-solid fa-ellipsis-vertical"></i></span>
                            <div class="dropdown-menu_review">
                               <div class="user_name">
                                  <p class="text-center">Manage Logo</p>
                               </div>
                               <div class="dropdown-main ">
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-brands fa-slack"></i>Logo Details
                                     </a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-download"></i>Download Logo
                                     </a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fas fa-wallet"></i>Customization</a>
                                  </div>
                                  <div class="dash-icon">
                                     <a class="dropdown-item" href="#"><i
                                        class="fa-solid fa-envelope-open-text"></i>Manage
                                     Logo Backup</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>

 @endsection
