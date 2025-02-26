@extends('vendor_dashboard_layout.master')
@section('content')
<div class="col-lg-9 p-0">
    <div class="user_content">
       <div class="uer_nm">
          <h1>New Ad Campaign</h1>
       </div>
       <div class="mi_detail">
          <div class="campaign_main_div">
             <div class="campaign">
                <p class="mt-0">
                   Choose your goal for this campaign
                </p>

                <div class="campaign_1">
                   <div class="campaign_1part">

                      <div class="img_p_1">
                         <img src="{{asset('vender_dashboard/img/campaign_1.png')}}" alt="">
                      </div>
                      <p class="m-0">Traffic</p>
                   </div>
                   <div class="campaign_1part">

                      <div class="img_p_1">
                         <img src="{{asset('vender_dashboard/img/campaign_1part2.png')}}" alt="">
                      </div>
                      <p class="m-0">Lead Form</p>
                   </div>
                   <div class="campaign_1part">

                      <div class="img_p_1">
                         <img src="{{asset('vender_dashboard/img/campaign_1part3.png')}}" alt="">
                      </div>
                      <p class="m-0">Conversions</p>
                   </div>
                   <div class="campaign_1part">

                      <div class="img_p_1">
                         <img src="{{asset('vender_dashboard/img/campaign_1part4.png')}}" alt="">
                      </div>
                      <p class="m-0">Purchases</p>
                   </div>
                </div>
             </div>
             <div class="campaign">
                <p class="mt-0">
                   Campaign Details
                </p>
                <div class="div_form_imp">
                   <div class="info_for_c">
                      <div class="info_for_c_1">
                         <label>Campaign Name</label>
                         <input type="text" placeholder="Add here">
                      </div>
                      <div class="info_for_c_1">
                         <label>Brand Name</label>
                         <input type="text" placeholder="Add here">
                      </div>
                   </div>
                   <div class="info_for_c">
                      <div class="info_for_c_1 options-s">
                         <label>Industry</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                      <div class="info_for_c_1 options-s">
                         <label>Language</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                   </div>
                   <div class="info_for_c">
                      <div class="info_for_c_1">
                         <label>Start Date</label>
                         <input type="text" placeholder="Add here">
                      </div>
                      <div class="info_for_c_1">
                         <label>Start Date</label>
                         <input type="text" placeholder="Add here">
                      </div>
                   </div>
                </div>


             </div>
             <div class="campaign">
                <p class="mt-0">
                   Ad Set Targeting
                </p>
                <div class="div_form_imp">
                   <div class="info_for_c">
                      <div class="info_for_c_1">
                         <label>Ad set Name</label>
                         <input type="text" placeholder="Add here">
                      </div>
                      <div class="info_for_c_1 options-s">
                         <label>Language</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                   </div>
                   <div class="info_for_c">
                      <div class="info_for_c_1">
                         <label>Name your Audience</label>
                         <input type="text" placeholder="Add here">
                      </div>
                      <div class="info_for_c_1 options-s">
                         <label>Location Targeting</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                   </div>
                   <div class="info_for_c">
                      <div class="info_for_c_1">
                         <label>Keywords</label>
                         <input type="text" placeholder="Add here">
                      </div>
                      <div class="info_for_c_1 options-s">
                         <label>Publishers</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                   </div>

                   <div class="info_for_c">
                      <div class="info_for_c_1 options-s">
                         <label>Categories</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                      <div class="info_for_c_1 options-s">
                         <label>Targeting Devices</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                   </div>
                   <div class="info_for_c">
                      <div class="info_for_c_1 options-s">
                         <label>Categories</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                      <div class="info_for_c_1 options-s">
                         <label>Targeting Devices</label>
                         <input type="text" id="dropdown-input" placeholder="Add here" readonly="">
                         <div class="dropdown-list" id="dropdown-list">
                            <div data-value="option1">Option 1</div>
                            <div data-value="option2">Option 2</div>
                            <div data-value="option3">Option 3</div>
                            <div data-value="option4">Option 4</div>
                         </div>



                      </div>
                   </div>
                </div>


             </div>
             <div class="campaign">
                <p class="mt-0">
                   Bidding Strategy
                </p>

                <div class="campaign_2">
                   <p class="m-0">What are you optimizing for?</p>

                   <div class="compaign_input">
                      <label class="radio-container">
                         <input type="radio" name="optimizes" checked="">
                         <span class="checkmark"></span> Impressions
                      </label>
                      <label class="radio-container">
                         <input type="radio" name="optimizes">
                         <span class="checkmark"></span> Clicks
                      </label>
                   </div>

                   <div class="compaign_input_2">
                      <div class="info_for_c_1">
                         <label>Daily Budget</label>
                         <input type="text" placeholder="Add here">
                      </div>
                   </div>


                   <p class="m-0">What are you optimizing for?</p>

                   <div class="compaign_input compaign_input_3">
                      <label class="radio-container">
                         <input type="radio" name="optimize" checked="">
                         <div class="checkmark"></div>
                         <div class="op_select">
                            Balanced
                            <span>Spend the budget throughout the whole day</span>
                         </div>
                      </label>
                      <label class="radio-container">
                         <input type="radio" name="optimize">
                         <div class="checkmark"></div>
                         <div class="op_select">Accelerated
                            <span>
                               Spend the budget as soon as possible
                            </span>
                         </div>
                      </label>
                   </div>

                </div>
             </div>
             <div class="campaign">
                <p class="mt-0">
                   Ad Details
                </p>
                <div class="div_form_imp">
                   <div class="info_for_c">
                      <div class="info_for_c_1">
                         <label>Tittle</label>
                         <input type="text" placeholder="Add here">
                      </div>
                      <div class="info_for_c_1">
                         <label>Website URL</label>
                         <input type="text" placeholder="Add here">
                      </div>
                   </div>
                   <div class="info_for_c">
                      <div class="info_for_c_1 fw_iput">
                         <label>Ad Content</label>
                         <input type="text" placeholder="Add here">
                      </div>
                   </div>

                   <div class="info_for_c upload_i_v">
                      <div class="label_updt">
                         <label for="">Video</label>
                         <div class="upload_c">


                            <div class="upload_img_v">
                               <img src="{{asset('vender_dashboard/img/upaod1.png')}}" alt="">
                            </div>
                            Add Video

                            <input type="file" class="upd_c" id="fileInput_video" accept=".mp4">



                         </div>
                      </div>
                      <div class="label_updt">
                         <label for="">
                            Images
                         </label>
                         <div class="upload_c">


                            <div class="upload_img_v">
                               <img src="{{asset('vender_dashboard/img/upload_img.png')}}" alt="">
                            </div>
                            Add Images

                            <input type="file" class="upd_c" id="fileInput_img" accept=".jpg , .png">



                         </div>
                      </div>
                   </div>




                   <div class="info_for_c">
                      <div class="info_for_c_1 fw_iput">
                         <label>Call To Action</label>
                         <input type="text" placeholder="Add here">
                      </div>

                   </div>
                </div>


             </div>
             <div class="btn_u">
                <a href="">Launch</a>
             </div>
          </div>

       </div>

    </div>


 </div>
 @endsection
