@extends('vendor_dashboard_layout.master')
@section('content')
<div class="col-lg-9 p-0">
    <div class="user_content">
       <div class="uer_nm">
          <h1>Analytics & Reports</h1>
       </div>
       <div class="mi_detail">
          <div class="row gy-4">
             <div class="overview_list overview_list_2">
                <div class="overlist_box ">
                   <h6>Profile Views
                  </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         100
                      </span>
                      <span class="overlist_sp">
                         <a class="overlst_an" href="">

                            <img src="{{asset('vender_dashboard/img/iconpage5-1.svg')}}" alt="">
                            (+16.93%)
                         </a>
                      </span>
                   </div>
                </div>
                <div class="overlist_box ">
                   <h6>
                    Engagement Metrics

                   </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         16
                      </span>
                      <span class="overlist_sp">
                        <a class="overlst_an" href="">

                           <img src="{{asset('vender_dashboard/img/iconpage5-1.svg')}}" alt="">
                           (+16.93%)
                        </a>
                     </span>
                   </div>
                </div>
                <div class="overlist_box ">
                   <h6>
                    Conversion Tracking

                   </h6>
                   <div class="overlist_value">
                      <span class="overlist_sp">
                         70
                      </span>
                      <span class="overlist_sp">
                        <a class="overlst_an" href="">

                           <img src="{{asset('vender_dashboard/img/iconpage5-1.svg')}}" alt="">
                           (+16.93%)
                        </a>
                     </span>
                   </div>
                </div>

             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
