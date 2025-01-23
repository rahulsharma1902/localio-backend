@extends('user_layout.master')
@section('content')
    <section class="banner_sec help-cntr-bnr inr-bnr dark" style="background-color: #003F7D;">
        <div class="bubble-wrp">
            <img src="{{ asset('front/img/small-bnnr-bg.png') }}" alt="">
        </div>
        <div class="banner_content">
            <div class="container">
                <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="banner_text_col">
                        <div class="banner_content_inner bnr_inr_contnt">
                            <h1>{{ $whoWeAre->main_heading }}</h1>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam
                            </p>
                        </div>
                    </div>
                    <div class="banner_image_col">
                        <div class="banner_image">
                            <img src="{{ asset('front/img/wwr-bnr.png') }}" class="banner_top_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section most-popular -->
    <section class="most-populr-sec ms_dv light p_120">
        <div class="container">
            <div class="most-popular-wrp">
                <div class="hd_text">
                    <h2 data-aos="zoom-in" data-aos-duration="1000" class="text-center">Most Popular</h2>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book, It has survived not only five
                        centuries, but also the leap into electronic typesetting.</p>
                </div>
                <div class="popular-accordion-wrp mst_wrp" data-aos="fade-up" data-aos-duration="1000">
                    <div class="row align-items-center ">
                        <div class="col-md-6">
                            <div class="accor-lft-img">
                                <img src="{{ asset('front/img/accor-bdy-img.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="accor-txt-contnt">
                                <h6>Lorem Ipsum has been the industry's standard dummy</h6>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book,
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="new_objectives">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="objec_box">
                                    <div class="objec-img">
                                        <svg width="33" height="34" viewBox="0 0 33 34" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.30005 11.9838H1.23752C0.554326 11.9838 0 11.4295 0 10.7463V2.08362C0 1.17161 0.738016 0.433594 1.65003 0.433594C2.56204 0.433594 3.30005 1.17161 3.30005 2.08362V11.9838Z"
                                                fill="#06498B" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.12612 2.08362C4.12612 1.45034 3.88764 0.871882 3.49609 0.433594H24.3388C25.9341 0.433594 27.2264 1.72589 27.2264 3.32114V20.6802C27.054 19.3718 26.4642 18.1085 25.4603 17.1046C23.0336 14.6763 19.0987 14.6763 16.6719 17.1046C14.2436 19.5313 14.2436 23.4663 16.6719 25.8931C18.728 27.9492 21.8686 28.2634 24.255 26.8341L25.8261 28.4052C25.0784 28.8741 24.1197 28.8564 23.3865 28.3504C22.3455 27.6333 20.9694 27.6333 19.9285 28.3504C19.1679 28.8741 18.1657 28.8741 17.4051 28.3504C16.3642 27.6333 14.9881 27.6333 13.9472 28.3504C13.1866 28.8741 12.1844 28.8741 11.4238 28.3504C10.3829 27.6333 9.00673 27.6333 7.96581 28.3504C7.20523 28.8741 6.203 28.8741 5.44242 28.3504L5.24101 28.2118C4.54329 27.73 4.12596 26.9356 4.12596 26.0881L4.12612 2.08362ZM11.5512 4.14615C11.5512 3.91895 11.3659 3.73365 11.1387 3.73365C10.9115 3.73365 10.7262 3.91895 10.7262 4.14615V5.79618H7.83868C7.61147 5.79618 7.42617 5.98149 7.42617 6.20869C7.42617 6.43589 7.61147 6.62119 7.83868 6.62119H10.7262V9.09623H7.83868C7.61147 9.09623 7.42617 9.28154 7.42617 9.50874C7.42617 9.73594 7.61147 9.92125 7.83868 9.92125H10.7262V12.3963H7.83868C7.61147 12.3963 7.42617 12.5816 7.42617 12.8088C7.42617 13.036 7.61147 13.2213 7.83868 13.2213H10.7262V14.8713C10.7262 15.0985 10.9115 15.2838 11.1387 15.2838C11.3659 15.2838 11.5512 15.0985 11.5512 14.8713V13.2213H23.5139C23.7411 13.2213 23.9264 13.036 23.9264 12.8088C23.9264 12.5816 23.7411 12.3963 23.5139 12.3963H11.5512V9.92125H23.5139C23.7411 9.92125 23.9264 9.73594 23.9264 9.50874C23.9264 9.28154 23.7411 9.09623 23.5139 9.09623H11.5512V6.62119H23.5139C23.7411 6.62119 23.9264 6.43589 23.9264 6.20869C23.9264 5.98149 23.7411 5.79618 23.5139 5.79618H11.5512V4.14615ZM9.90121 17.7589C9.90121 17.5317 9.7159 17.3464 9.4887 17.3464C9.2615 17.3464 9.0762 17.5317 9.0762 17.7589V18.173C8.86994 18.2326 8.67336 18.3374 8.50095 18.4872C7.81937 19.085 7.81937 20.1453 8.50095 20.7431L9.93186 21.9952C10.2396 22.2643 10.2396 22.7412 9.93186 23.0103C9.67888 23.2327 9.29858 23.2327 9.04563 23.0103L8.11105 22.1917C7.93864 22.0419 7.67759 22.0596 7.52773 22.2304C7.37787 22.4028 7.3956 22.6639 7.5664 22.8137L8.50098 23.6307C8.67339 23.7805 8.86998 23.8853 9.07622 23.9449V24.359C9.07622 24.5862 9.26152 24.7715 9.48872 24.7715C9.71592 24.7715 9.90123 24.5862 9.90123 24.359V23.9449C10.1075 23.8853 10.3041 23.7805 10.4765 23.6307C11.1581 23.0329 11.1581 21.9726 10.4765 21.3748L9.04557 20.1227C8.7378 19.8536 8.7378 19.3767 9.04557 19.1076C9.29855 18.8852 9.67885 18.8852 9.9318 19.1076L10.8664 19.9262C11.0388 20.076 11.2998 20.0583 11.4497 19.8875C11.5996 19.7151 11.5818 19.454 11.411 19.3042L10.4764 18.4872C10.304 18.3374 10.1075 18.2326 9.90121 18.173V17.7589Z"
                                                fill="#06498B" />
                                            <path
                                                d="M26.4004 24.6867C26.8419 23.9503 27.1158 23.1414 27.2254 22.3164V25.5117L26.4004 24.6867Z"
                                                fill="#06498B" />
                                            <path
                                                d="M25.9211 25.375L27.1715 26.6254C27.1699 26.627 27.1683 26.627 27.1667 26.6286C27.0136 26.7205 26.8686 26.8333 26.7348 26.9654L26.5318 27.1684C26.398 27.3022 26.2853 27.4504 26.1918 27.6051L24.9414 26.3547C24.9527 26.345 24.964 26.337 24.9752 26.3273C25.1412 26.192 25.304 26.0469 25.4587 25.8922C25.6246 25.7263 25.7777 25.5539 25.9211 25.375Z"
                                                fill="#06498B" />
                                            <path
                                                d="M23.5083 19.0557C22.1596 17.7054 19.9714 17.7054 18.6209 19.0557C17.2722 20.4044 17.2722 22.5926 18.6209 23.9414C19.9712 25.2917 22.1594 25.2917 23.5083 23.9414C23.6775 23.7738 23.8241 23.5918 23.9514 23.4C24.836 22.0594 24.6894 20.2351 23.5083 19.0557Z"
                                                fill="#06498B" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M24.8753 17.6889C22.7708 15.5829 19.358 15.5829 17.2534 17.6889C15.1473 19.7934 15.1473 23.2062 17.2534 25.3108C19.3578 27.4152 22.7706 27.4152 24.8753 25.3108C26.9797 23.2064 26.9797 19.7935 24.8753 17.6889ZM18.0367 18.4736C19.7093 16.801 22.4196 16.801 24.0907 18.4736C25.7633 20.1446 25.7633 22.8549 24.0907 24.5259C22.4197 26.1985 19.7094 26.1985 18.0367 24.5259C16.3657 22.8549 16.3657 20.1447 18.0367 18.4736Z"
                                                fill="#06498B" />
                                            <path
                                                d="M29.2677 27.5501C28.7295 27.0119 27.8578 27.0119 27.3196 27.5501L27.1165 27.7532C26.5783 28.2914 26.5783 29.1631 27.1165 29.7013L30.4456 33.032C30.9838 33.5686 31.8555 33.5686 32.3937 33.032L32.5984 32.8273C33.135 32.2891 33.135 31.4174 32.5984 30.8792L29.2677 27.5501Z"
                                                fill="#06498B" />
                                        </svg>
                                    </div>
                                    <div class="objec_content size14">
                                        <h6 class="big-bld">User Reviews</h6>
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="objec_box">
                                    <div class="objec-img">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.9158 25.3H24.0342C25.3 25.3 25.3 25.3 25.3 24.0342V9.51583C25.3 8.25 25.3 8.25 24.0342 8.25H21.9158C20.65 8.25 20.65 8.25 20.65 9.51583V24.0342C20.65 25.3 20.65 25.3 21.9158 25.3ZM7.96583 25.3H10.0842C11.35 25.3 11.35 25.3 11.35 24.0342V12.9C11.35 11.6342 11.35 11.6342 10.0842 11.6342H7.96583C6.7 11.6342 6.7 11.6342 6.7 12.9V24.0342C6.7 25.3 6.7 25.3 7.96583 25.3ZM14.9408 25.3H17.0592C18.325 25.3 18.325 25.3 18.325 24.0342V16.2842C18.325 15.0183 18.325 15.0183 17.0592 15.0183H14.9408C13.675 15.0183 13.675 15.0183 13.675 16.2842V24.0342C13.675 25.3 13.675 25.3 14.9408 25.3ZM1.79167 31.5C0.5 31.5 0.5 31.5 0.5 30.2083V1.79167C0.5 0.500001 0.5 0.500001 1.79167 0.500001H30.2083C31.5 0.500001 31.5 0.500001 31.5 1.79167V30.2083C31.5 31.5 31.5 31.5 30.2083 31.5H1.79167ZM4.375 5.66667C5.09833 5.66667 5.66667 5.09833 5.66667 4.375C5.66667 3.65167 5.09833 3.08333 4.375 3.08333C3.65167 3.08333 3.08333 3.65167 3.08333 4.375C3.08333 5.09833 3.65167 5.66667 4.375 5.66667ZM8.27583 5.66667C9.025 5.66667 9.5675 5.09833 9.5675 4.375C9.5675 3.65167 9.025 3.08333 8.27583 3.08333C7.5525 3.08333 6.98417 3.65167 6.98417 4.375C6.98417 5.09833 7.5525 5.66667 8.27583 5.66667ZM12.125 5.66667C12.8483 5.66667 13.4167 5.09833 13.4167 4.375C13.4167 3.65167 12.8483 3.08333 12.125 3.08333C11.4017 3.08333 10.8333 3.65167 10.8333 4.375C10.8333 5.09833 11.4017 5.66667 12.125 5.66667Z"
                                                fill="#06498B" />
                                        </svg>
                                    </div>
                                    <div class="objec_content size14">
                                        <h6 class="big-bld">In- Depth Comparisons</h6>
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="objec_box">
                                    <div class="objec-img">
                                        <svg width="33" height="34" viewBox="0 0 33 34" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.30005 11.9838H1.23752C0.554326 11.9838 0 11.4295 0 10.7463V2.08362C0 1.17161 0.738016 0.433594 1.65003 0.433594C2.56204 0.433594 3.30005 1.17161 3.30005 2.08362V11.9838Z"
                                                fill="#06498B" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.12612 2.08362C4.12612 1.45034 3.88764 0.871882 3.49609 0.433594H24.3388C25.9341 0.433594 27.2264 1.72589 27.2264 3.32114V20.6802C27.054 19.3718 26.4642 18.1085 25.4603 17.1046C23.0336 14.6763 19.0987 14.6763 16.6719 17.1046C14.2436 19.5313 14.2436 23.4663 16.6719 25.8931C18.728 27.9492 21.8686 28.2634 24.255 26.8341L25.8261 28.4052C25.0784 28.8741 24.1197 28.8564 23.3865 28.3504C22.3455 27.6333 20.9694 27.6333 19.9285 28.3504C19.1679 28.8741 18.1657 28.8741 17.4051 28.3504C16.3642 27.6333 14.9881 27.6333 13.9472 28.3504C13.1866 28.8741 12.1844 28.8741 11.4238 28.3504C10.3829 27.6333 9.00673 27.6333 7.96581 28.3504C7.20523 28.8741 6.203 28.8741 5.44242 28.3504L5.24101 28.2118C4.54329 27.73 4.12596 26.9356 4.12596 26.0881L4.12612 2.08362ZM11.5512 4.14615C11.5512 3.91895 11.3659 3.73365 11.1387 3.73365C10.9115 3.73365 10.7262 3.91895 10.7262 4.14615V5.79618H7.83868C7.61147 5.79618 7.42617 5.98149 7.42617 6.20869C7.42617 6.43589 7.61147 6.62119 7.83868 6.62119H10.7262V9.09623H7.83868C7.61147 9.09623 7.42617 9.28154 7.42617 9.50874C7.42617 9.73594 7.61147 9.92125 7.83868 9.92125H10.7262V12.3963H7.83868C7.61147 12.3963 7.42617 12.5816 7.42617 12.8088C7.42617 13.036 7.61147 13.2213 7.83868 13.2213H10.7262V14.8713C10.7262 15.0985 10.9115 15.2838 11.1387 15.2838C11.3659 15.2838 11.5512 15.0985 11.5512 14.8713V13.2213H23.5139C23.7411 13.2213 23.9264 13.036 23.9264 12.8088C23.9264 12.5816 23.7411 12.3963 23.5139 12.3963H11.5512V9.92125H23.5139C23.7411 9.92125 23.9264 9.73594 23.9264 9.50874C23.9264 9.28154 23.7411 9.09623 23.5139 9.09623H11.5512V6.62119H23.5139C23.7411 6.62119 23.9264 6.43589 23.9264 6.20869C23.9264 5.98149 23.7411 5.79618 23.5139 5.79618H11.5512V4.14615ZM9.90121 17.7589C9.90121 17.5317 9.7159 17.3464 9.4887 17.3464C9.2615 17.3464 9.0762 17.5317 9.0762 17.7589V18.173C8.86994 18.2326 8.67336 18.3374 8.50095 18.4872C7.81937 19.085 7.81937 20.1453 8.50095 20.7431L9.93186 21.9952C10.2396 22.2643 10.2396 22.7412 9.93186 23.0103C9.67888 23.2327 9.29858 23.2327 9.04563 23.0103L8.11105 22.1917C7.93864 22.0419 7.67759 22.0596 7.52773 22.2304C7.37787 22.4028 7.3956 22.6639 7.5664 22.8137L8.50098 23.6307C8.67339 23.7805 8.86998 23.8853 9.07622 23.9449V24.359C9.07622 24.5862 9.26152 24.7715 9.48872 24.7715C9.71592 24.7715 9.90123 24.5862 9.90123 24.359V23.9449C10.1075 23.8853 10.3041 23.7805 10.4765 23.6307C11.1581 23.0329 11.1581 21.9726 10.4765 21.3748L9.04557 20.1227C8.7378 19.8536 8.7378 19.3767 9.04557 19.1076C9.29855 18.8852 9.67885 18.8852 9.9318 19.1076L10.8664 19.9262C11.0388 20.076 11.2998 20.0583 11.4497 19.8875C11.5996 19.7151 11.5818 19.454 11.411 19.3042L10.4764 18.4872C10.304 18.3374 10.1075 18.2326 9.90121 18.173V17.7589Z"
                                                fill="#06498B" />
                                            <path
                                                d="M26.4004 24.6867C26.8419 23.9503 27.1158 23.1414 27.2254 22.3164V25.5117L26.4004 24.6867Z"
                                                fill="#06498B" />
                                            <path
                                                d="M25.9211 25.375L27.1715 26.6254C27.1699 26.627 27.1683 26.627 27.1667 26.6286C27.0136 26.7205 26.8686 26.8333 26.7348 26.9654L26.5318 27.1684C26.398 27.3022 26.2853 27.4504 26.1918 27.6051L24.9414 26.3547C24.9527 26.345 24.964 26.337 24.9752 26.3273C25.1412 26.192 25.304 26.0469 25.4587 25.8922C25.6246 25.7263 25.7777 25.5539 25.9211 25.375Z"
                                                fill="#06498B" />
                                            <path
                                                d="M23.5083 19.0557C22.1596 17.7054 19.9714 17.7054 18.6209 19.0557C17.2722 20.4044 17.2722 22.5926 18.6209 23.9414C19.9712 25.2917 22.1594 25.2917 23.5083 23.9414C23.6775 23.7738 23.8241 23.5918 23.9514 23.4C24.836 22.0594 24.6894 20.2351 23.5083 19.0557Z"
                                                fill="#06498B" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M24.8753 17.6889C22.7708 15.5829 19.358 15.5829 17.2534 17.6889C15.1473 19.7934 15.1473 23.2062 17.2534 25.3108C19.3578 27.4152 22.7706 27.4152 24.8753 25.3108C26.9797 23.2064 26.9797 19.7935 24.8753 17.6889ZM18.0367 18.4736C19.7093 16.801 22.4196 16.801 24.0907 18.4736C25.7633 20.1446 25.7633 22.8549 24.0907 24.5259C22.4197 26.1985 19.7094 26.1985 18.0367 24.5259C16.3657 22.8549 16.3657 20.1447 18.0367 18.4736Z"
                                                fill="#06498B" />
                                            <path
                                                d="M29.2677 27.5501C28.7295 27.0119 27.8578 27.0119 27.3196 27.5501L27.1165 27.7532C26.5783 28.2914 26.5783 29.1631 27.1165 29.7013L30.4456 33.032C30.9838 33.5686 31.8555 33.5686 32.3937 33.032L32.5984 32.8273C33.135 32.2891 33.135 31.4174 32.5984 30.8792L29.2677 27.5501Z"
                                                fill="#06498B" />
                                        </svg>
                                    </div>
                                    <div class="objec_content size14">
                                        <h6 class="big-bld">Objective Research</h6>
                                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="succes_sec p_120">
        <div class="container">
            <div class="succes_content">
                <div class="hd_text" data-aos="zoom-in" data-aos-duration="1000">
                    <h2>Get to know the specialists behind your success</h2>
                </div>
                <div class="row succes_rw">
                    <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="succs_box">
                            <div class="succes_img">
                                <img src="{{ asset('front/img/ssr.png') }}">
                            </div>
                            <div class="succes_infp">
                                <div class="succes_text">
                                    <h6 class="big-bld">Software and Service Researchers</h6>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book, It has survived not only five centuries, but also the leap into
                                    </p>
                                </div>
                                <div class="succs_grp">
                                    <img src="{{ asset('front/img/grp-rsr.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="succs_box">
                            <div class="succes_img">
                                <img src="{{ asset('front/img/sa.png') }}">
                            </div>
                            <div class="succes_infp">
                                <div class="succes_text">
                                    <h6 class="big-bld">Software Advisors</h6>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book, It has survived not only five centuries, but also the leap into
                                    </p>
                                </div>
                                <div class="succs_grp">
                                    <img src="{{ asset('front/img/grp-rsr.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-duration="1000">
                        <div class="succs_box">
                            <div class="succes_img">
                                <img src="{{ asset('front/img/contnt-anlt.png') }}">
                            </div>
                            <div class="succes_infp">
                                <div class="succes_text">
                                    <h6 class="big-bld">Content Analysts</h6>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book, It has survived not only five centuries, but also the leap into
                                    </p>
                                </div>
                                <div class="succs_grp">
                                    <img src="{{ asset('front/img/grp-rsr.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-duration="1000">
                        <div class="succs_box">
                            <div class="succes_img">
                                <img src="{{ asset('front/img/rvw-mdort.png') }}">
                            </div>
                            <div class="succes_infp">
                                <div class="succes_text">
                                    <h6 class="big-bld">Review Moderators</h6>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book, It has survived not only five centuries, but also the leap into
                                    </p>
                                </div>
                                <div class="succs_grp">
                                    <img src="{{ asset('front/img/grp-rsr.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="portf_sec p_120">
        <div class="container">
            <div class="succes_content" data-aos="fade-up" data-aos-duration="1000">
                <h2>We help software and service providers find their best customers</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>
                <div class="top-pro-btn  snd_bttn">
                    <a href="#" class="cta cta_orange">Create Portfolio</a>
                </div>
            </div>
        </div>
    </section>
@endsection
