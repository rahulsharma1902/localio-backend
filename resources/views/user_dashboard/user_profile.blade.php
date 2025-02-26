@extends('user_dashboard_layout.master')

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('content')

       <div class="col-lg-9 p-0">
          <div class="user_content user_info">
             <div class="uer_nm">
                <h1>My Profile</h1>
             </div>
             <div class="profile-main">
                <div class="profile-main-hd d-flex">
                   <!-- <div class="profile-img">
                      <img src="img/profile_img.svg" alt="">
                      <div class="upload-img">
                        <img src="img/upload-img.svg" alt="">
                      </div>
                      </div> -->
                   <div class="profile-img">
                      <img src="{{asset('user-dashboard-theme/img/profile_img.svg')}}" alt="">
                      <div class="upload-img">
                         <img src="{{asset('user-dashboard-theme/img/upload-img.svg')}}" alt="">
                      </div>
                      <input type="file" id="fileInput" style="display: none;" />
                   </div>
                   <button class="blue-btn">Change Profile</button>
                </div>
                <!-- personal data  -->
                <div class="reward-main-inner">
                   <div class="rewrd-inner-hd">
                      <h4>Personal Data</h4>
                   </div>
                   <div class="rewrd-innr-btm d-flex">
                      <form action="">
                         <div class="row">
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">First Name</label> <br>
                                  <input type="text" placeholder="John">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Last Name</label> <br>
                                  <input type="text" placeholder="Smith">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Phone Number</label> <br>
                                  <input type="number" placeholder="9876543210">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Email</label> <br>
                                  <input type="email" placeholder="John123@gmail.com">
                               </div>
                            </div>
                         </div>
                      </form>
                   </div>
                </div>
                <!-- public information -->
                <div class="reward-main-inner mt-30">
                   <div class="rewrd-inner-hd">
                      <h4>Public Information</h4>
                   </div>
                   <div class="rewrd-innr-btm d-flex">
                      <form action="">
                         <div class="row">
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Public Name</label> <br>
                                  <input type="text" placeholder="Enter your public name">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Company Name</label> <br>
                                  <input type="text" placeholder="Enter your company name">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Company Size</label> <br>
                                  <select class="" id="">
                                     <option value="">Select your company size</option>
                                     <option value="">100</option>
                                     <option value="">500</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Job Function</label> <br>
                                  <select class="" id="">
                                     <option value="">Select your job function</option>
                                     <option value="">conducting market research</option>
                                     <option value="">developing marketing campaigns</option>
                                  </select>
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Job Title</label> <br>
                                  <input type="text" placeholder="Enter your job title">
                               </div>
                            </div>
                            <div class="col-lg-6">
                               <div class="form-wrp">
                                  <label for="">Industry</label> <br>
                                  <select class="" id="">
                                     <option value="">Select your industry</option>
                                     <option value="">Healthcare</option>
                                     <option value="">Agriculture</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                      </form>
                   </div>
                </div>
                <!-- save chnages btn -->
                <div class="sve-btn">
                   <button class="unq_btn"> Save Changes </button>
                </div>
             </div>
             <div class="profile-main deactivate-accnt">
                <h6>Deactivate</h6>
                <p>Deactivating your account will disable your profile and remove your name from any content you've submitted. </p>
                <a class="click-deacti" href="">Yes, deactivate my account.</a>
             </div>
          </div>
       </div>

 @endsection
