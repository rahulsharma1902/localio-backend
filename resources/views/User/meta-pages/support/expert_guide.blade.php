@extends('user_layout.master')
@section('content')
<section class="banner_sec help-cntr-bnr inr-bnr dark" style="background-color: #003F7D;">
    <div class="bubble-wrp">
        <img src="{{asset('front/img/small-bnnr-bg.png') }}" alt="">
    </div>
    <div class="banner_content">
        <div class="container">
            <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                <div class="banner_text_col">
                    <div class="banner_content_inner bnr_inr_contnt">
                        <h1>{{ $expertGuide->title ?? '' }}</h1>
                        <p class="expert-p">{{ $expertGuide->description ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="read_sec_outer expert_sec light p_120">
    <div class="container">
        <div class="hd_text" data-aos="zoom-in" data-aos-duration="1000">
            <h2>{{ $expertGuide->education_title ?? '' }}</h2>
            <p>{{ $expertGuide->education_description ?? '' }}
            </p>
        </div>
    </div>
    <div class="read_content_sec light">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                @forelse ($pageTileTranslationEducation as $index => $pageTile)
                @foreach ($pageTile->translations as $translation)
                <div class="col-lg-3 col-md-6">
                    <a class="in_cont_box">
                        <div class="read_img">
                            <div class="blog_thumb"><img class="r_img"
                                    src="{{ asset( $pageTile->translations->first()->image) }}" alt=""></div>
                        </div>
                        <div class="read_content_in">
                            <div class="read_cont_h">
                                <h3 class="read_text">{{ $translation->title ?? 'No Title' }}
                                </h3>
                            </div>
                            <div class="read_para">
                                <p>
                                    {{ $translation->description ?? 'No Description' }}
                                </p>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach
                @empty

                @endforelse
                <!-- <div class="col-lg-3 col-md-6">
               <a class="in_cont_box">
                  <div class="read_img">
                     <div class="blog_thumb"><img class="r_img" src="{{asset('front/img/expt2.png') }}" alt=""></div>
                  </div>
                  <div class="read_content_in">
                     <div class="read_cont_h">
                        <h3 class="read_text">Lorem Ipsum has been
                        </h3>
                     </div>
                     <div class="read_para">
                        <p>
                           Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                           when an unknown printer took a galley of type and scrambled it to make a type
                           specimen book.
                        </p>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-3 col-md-6">
               <a class="in_cont_box">
                  <div class="read_img">
                     <div class="blog_thumb"><img class="r_img" src="{{asset('front/img/expt3.png') }}" alt=""></div>
                  </div>
                  <div class="read_content_in">
                     <div class="read_cont_h">
                        <h3 class="read_text">Lorem Ipsum has been
                        </h3>
                     </div>
                     <div class="read_para">
                        <p>
                           Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                           when an unknown printer took a galley of type and scrambled it to make a type
                           specimen book.
                        </p>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-3 col-md-6">
               <a class="in_cont_box">
                  <div class="read_img">
                     <div class="blog_thumb"><img class="r_img" src="{{asset('front/img/expt4.png' )}}" alt=""></div>
                  </div>
                  <div class="read_content_in">
                     <div class="read_cont_h">
                        <h3 class="read_text">Lorem Ipsum has been
                        </h3>
                     </div>
                     <div class="read_para">
                        <p>
                           Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                           when an unknown printer took a galley of type and scrambled it to make a type
                           specimen book.
                        </p>
                     </div>
                  </div>
               </a>
            </div> -->
            </div>
        </div>
    </div>
</section>

<section class="smart-combined smrt_nw p_120 pt-0">
    <div class="combined-section-bg">
        <img src="{{asset('front/img/two-sec-bg.png') }}" alt="">
    </div>
    <div class="container">
        <div class="smart-combined-wrp">
            <!-- section smart search -->
            <div class="smart_search_section dark p_120 pt-0 ">
                <div class="smart_search_inner">
                    <div class="smart_srch_content text-center size18">
                        <h2 data-aos="zoom-in" data-aos-duration="1000">{{ $expertGuide->smart_search ?? '' }}</h2>
                        <p data-aos="zoom-in" data-aos-duration="1000" class="smart-p">{{ $expertGuide->smart_search_description ?? '' }}
                        </p>
                        <div class="smrt-srch-inpt" data-aos="zoom-in" data-aos-duration="1000">
                            <textarea rows="3"
                                placeholder="Enter a product, category, or what you’d like to compare..."></textarea>
                            <div class="input-btn">
                                <button type="" class=""><img src="{{asset('front/img/btn-img.svg' )}}" alt=""></button>
                            </div>
                        </div>
                    </div>
                    <div class="back-image1">
                        <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt="">
                    </div>
                    <div class="back-image2">
                        <img src="{{asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="wmail_sec p_120">
    <div class="container">
        <div class="wmail_content">
            <h4 data-aos="zoom-in" data-aos-duration="1000">{{ $expertGuide->how_to_check_email ?? '' }}</h4>
            <div class="mail_ovr size18" data-aos="fade-up" data-aos-duration="1000">
                <h6>{{ $expertGuide->overview ?? '' }}</h6>
                <p>{!! $expertGuide->email_description ?? '' !!}</p>
                <div class="metl-stp">
                    <p>Take control of your reputation and check out<a href="#" class="blu_lnk"> Email Account
                            Setup </a>to learn how to create an email account at your domain.
                    </p>
                </div>
                <!-- <div class="mail_acknd size20">
                    <p class="size18">Once you've created your professional email address, how're you supposed to
                        check your email?
                        You're going to need an email client for that. And what is an email client? Email clients
                        come in two varieties: webmail and email applications.
                    </p>
                    <ul>
                        <li><a href="#">Webmail</a></li>
                        <li><a href="#">Email Applications</a></li>
                        <li><a href="#">IMAP and POP</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="mail_ovr" data-aos="fade-up" data-aos-duration="1000">
                <h6>{{ $expertGuide->webmail ?? '' }}</h6>
                <p>{!! $expertGuide->webmail_description ?? '' !!}</p>
                <div class="mail_acknd">
                    <!-- <div class="big_text ">
                        <p class="big-bld">A few advantages of using webmail to access your email are:</p>
                    </div>
                    <ul>
                        <li>Simplicity. No setup is required.</li>
                        <li>Portable and accessible anywhere.</li>
                        <li>Great if you can't install software on your work or school computer.</li>
                        <li>Save space on your computer; email is stored online.</li>
                    </ul> -->
                    <div class="rnd_text size18">
                        <!-- <p>Roundcube is the option for webmail that is built into your cPanel.</p>
                        <ul>
                            <li><span class="big-bld">Roundcube</span> - As our most popular webmail client, it has
                                a look and feel you'd expect from an email application but is available inside a
                                browser. You can import and use an address book and use IMAP folders with the
                                drag-and-drop organization. When composing emails, you can set up preset responses
                                to save time and write with spell check in a rich text HTML composer.
                            </li>
                        </ul> -->
                        <div class="round_img">
                            <img src="{{asset('front/img/round..svg') }}">
                        </div>
                    </div>
                    <div class="metl-stp size18">
                        <p>To learn more, please see, <a href="#" class="blu_lnk"> How To Access Webmail - What Is
                                Webmail? </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="mail_ovr" data-aos="fade-up" data-aos-duration="1000">
                <h6>{{ $expertGuide->email_application ?? '' }}</h6>
                <p class="size18">{!! $expertGuide->email_app_description ?? '' !!}
                </p>
                <!-- <div class="mail_acknd size18">
                    <p class="big_text">A few advantages of using an email application are:</p>
                    <ul>
                        <li>Accessible offline.</li>
                        <li>Immediate notifications to your device.</li>
                        <li>Manage multiple email addresses in one interface.</li>
                        <li>Easily back up your mail and store it on your computer.</li>
                        <li>Use advanced mail rules and filtering based on multiple factors, such as words, senders,
                            subjects, headers, etc.
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="mail_ovr size18" data-aos="fade-up" data-aos-duration="1000">
                <h6>{{ $expertGuide->imap ?? '' }}</h6>
                <p>{!! $expertGuide->imap_pop ?? '' !!}
                </p>
                <div class="metl-stp size18">
                    <p>Note: For information on configuring your email, please see <a href="#" class="blu_lnk"> Setting
                            Up Email Account: Client Setup SSL/TLS Settings for POP &
                            IMAP. </a>
                    </p>
                </div>
                <!-- <div class="mail_acknd">
                    <div class="rnd_text size18">
                        <ul>
                            <li class="mlt_sp"><span class="big-bld">IMAP -</span> This is the setting you'll use if
                                you want to
                                access your email on multiple devices or if multiple users access the same account.
                                When you read, reply, delete, forward, or otherwise manage your email, the changes
                                are made on the server and sync with your webmail and other IMAP-connected email
                                clients. IMAP is limited to 20 connections per IP address, but that shouldn't be an
                                issue for most users.
                            </li>
                            <li><span class="big-bld">POP3 -</span> If you intend to access your email on only one
                                device, this is the setting for you. Most email clients set up with POP3 will delete
                                the message on the server once it's been downloaded to your email application. This
                                means that your email application will have only a copy of the email, and it cannot
                                be retrieved again using webmail or another email application. Do not use POP3 if
                                you want to access your email from multiple devices.
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="metl-stp mtp_gry size18" data-aos="fade-up" data-aos-duration="1000">
                <div class="mlt_sp">
                    <p>{!! $expertGuide->assistant ?? '' !!}</p>
                </div>
                <!-- <ul>
                    <li class="mlt_sp"><span class="big-bld" style="color: #000;">Chat Support</span> While on our
                        <a href="#" class="blu_lnk">website</a>, you should see a CHAT bubble in the bottom
                        right-hand
                        corner of the page. Click anywhere on the bubble to begin a chat session.
                    </li>
                    <li class="mlt_sp">
                        <span class="big-bld" style="color: #000;">Phone Support -</span>
                        <div class="cntc_lnks">
                            <ul>
                                <li>
                                    <a hrewf="#">
                                        US: 888-401-4678</a>
                                </li>
                                <li><a href="#">International: +1 801-765-9400</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <p>You may also refer to our <a href="#" class="blu_lnk">Knowledge Base</a> articles to help answer
                    common questions and guide you through various setup, configuration, and troubleshooting steps.
                </p> -->
            </div>
            <div class="mail_ovr" data-aos="fade-up" data-aos-duration="1000">
                <div class="metl-stp mtl-btm size18">
                    <div class="metl_rw">
                        <div class="lft_dta">
                            <p>Did you find this article helpful?</p>
                            <div class="thms_icn">
                                <span><i class="fa-solid fa-thumbs-up"></i></span>
                                <span><i class="fa-solid fa-thumbs-down"></i></span>
                            </div>
                        </div>
                        <div class="ryt_bttn">
                            <a href="#">
                                <img src="{{asset('front/img/cpy.png') }}">
                                Copy Link
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shre_scl_icn" data-aos="fade-up" data-aos-duration="1000">
                <div class="shr-title shr-title-hd">
                    <h6>Share:</h6>
                </div>
                <div class="scl_lnks">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fa-regular fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section right-tool -->
<section class="right_tool_sec dark p_80">
    <div class="container">
        <div class="right-tool-wrp text-center" data-aos="fade-up" data-aos-duration="1000">
            <h3>Find the Right Tool</h3>
            <div class="right-tool-pack">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="tool-card">
                            <div class="tool-card-img">
                                <img src="{{asset('front/img/right-tool-img1.png') }}" alt="">
                            </div>
                            <div class="tool-crd-bdy">
                                <h6 class="h6_26">Verified User Reviews</h6>
                                <p class="size18">Read real feedback from verified users to help you make the right
                                    choice.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tool-card">
                            <div class="tool-card-img">
                                <img src="{{asset('front/img/right-tool-img2.png') }}" alt="">
                            </div>
                            <div class="tool-crd-bdy">
                                <h6 class="h6_26">Feature and Price Comparisons</h6>
                                <p class="size18">Easily compare software based on key features, pricing, and
                                    customer ratings.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="tool-card">
                            <div class="tool-card-img">
                                <img src="{{asset('front/img/right-tool-img3.png') }}" alt="">
                            </div>
                            <div class="tool-crd-bdy">
                                <h6 class="h6_26">Independent Insights</h6>
                                <p class="size18">Access unbiased, data-driven research to get the most value from
                                    your software.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-tool-btn  text-center">
                <a href="" class="cta">Get Started</a>
            </div>
        </div>
    </div>
    <div class="back-image1">
        <img src="{{asset('front/img/right-tool-vector1.png') }}" class="image-pattern1" alt="">
    </div>
    <div class="back-image2">
        <img src="{{asset('front/img/right-tool-vector2.png') }}" class="image-pattern2" alt="">
    </div>
</section>
@endsection
