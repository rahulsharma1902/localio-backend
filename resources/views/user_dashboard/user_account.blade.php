@extends('user_dashboard_layout.master')

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('content')


       <div class="col-lg-9 p-0">
          <div class="user_content">
             <div class="uer_nm">
                <h1>My Account</h1>
             </div>
             <div class="mi_detail">
                <div class="row gy-4">
                   <div class="col-lg-6">
                      <a class="acc-box" href="{{ route('user-product', ['locale' => app()->getLocale()]) }}">
                         <div class="acc-img">
                            <img src="{{asset('user-dashboard-theme/img/saved_prdt.svg')}}" class="img-fluid">
                         </div>
                         <div class="acc-text">
                            <h2>Saved Products</h2>
                            <p>Access your favorites here</p>
                         </div>
                      </a>
                   </div>
                   <div class="col-lg-6">
                      <a class="acc-box" href="{{ route('user-review', ['locale' => app()->getLocale()]) }}">
                         <div class="acc-img">
                            <img src="{{asset('user-dashboard-theme/img/my_rview.svg')}}" class="img-fluid">
                         </div>
                         <div class="acc-text">
                            <h2>My Reviews</h2>
                            <p>Your published reviews, all in one place</p>
                         </div>
                      </a>
                   </div>
                   <div class="col-lg-6">
                      <a class="acc-box" href="{{route('user-reward', ['locale' => app()->getLocale()])}}">
                         <div class="acc-img">
                            <img src="{{asset('user-dashboard-theme/img/mt_reward.svg')}}" class="img-fluid">
                         </div>
                         <div class="acc-text">

                            <h2>My Rewards</h2>
                            <p>Claim your rewards and discover new review offers!</p>

                         </div>
                      </a>
                   </div>
                   <div class="col-lg-6">
                      <a class="acc-box" href="{{route('user-profile', ['locale' => app()->getLocale()])}}">
                         <div class="acc-img">
                            <img src="{{asset('user-dashboard-theme/img/my_profle.svg')}}" class="img-fluid">
                         </div>
                         <div class="acc-text">
                            <h2>My Profile</h2>
                            <p>Add your industry, job function, company size to get personalized picks</p>
                         </div>
                      </a>
                   </div>
                </div>
             </div>
          </div>
       </div>

 @endsection
