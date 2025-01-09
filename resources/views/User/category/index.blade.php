@extends('user_layout.master')
@section('content')
    <?php
    $lang = getCurrentLocale();
    $categoryImages = \App\Models\CategoryPageContent::where('lang_code', 'en')
        ->WhereIn('meta_key', ['header_image', 'header_bg_image'])
        ->get();
    $headerImage = $categoryImages->where('meta_key', 'header_image')->first();
    $backgroundImage = $categoryImages->where('meta_key', 'header_bg_image')->first();
    
    $categoriesContents = \App\Models\CategoryPageContent::where('lang_code', $lang)->where('type', 'text')->pluck('meta_value', 'meta_key');
    if ($categoriesContents->isEmpty()) {
        $categoriesContents = \App\Models\CategoryPageContent::where('lang_code', 'en')->where('type', 'text')->pluck('meta_value', 'meta_key');
    }
    ?>
    <h1>hello haia</h1>
    <section class="banner_sec help-cntr-bnr inr-bnr dark " style="background-color: #003F7D;">
        <div class="bubble-wrp">
            @if ($backgroundImage)
                <img src="{{ asset($backgroundImage->meta_value) }}" alt="">
            @else
                <img src="{{ asset('front/img/small-bnnr-bg.png') }}" alt="">
            @endif


        </div>
        <div class="banner_content">
            <div class="container">
                <div class="banner_row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="banner_text_col">
                        <div class="banner_content_inner">
                            <h1>{{ $categoriesContents['heading'] ?? '' }}</h1>
                            <p>
                                {{ $categoriesContents['description'] ?? '' }}
                            </p>
                            <div class="search-bar-wrp">
                                <div class="search-box">
                                    <input type="text"
                                        placeholder="{{ $categoriesContents['search_placeholder_text'] ?? '' }}">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner_image_col">
                        <div class="banner_image">
                            @if ($headerImage)
                                <img src="{{ asset($headerImage->meta_value) }}" alt="">
                            @else
                                <img src="{{ asset('front/img/ctgry-bannr.png') }}" class="banner_top_image">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sfwr_sec light p_120">
        <div class="container">
            <div class="sfwr_content">
                <!-- <h2 data-aos="zoom-in" data-aos-duration="1000">What type of software are you looking for?</h2> -->
                <h2 data-aos="zoom-in" data-aos-duration="1000">{{ $categoriesContents['main_heading'] ?? '' }}</h2>
                <div class="row gy-4">
                    @foreach ($categories as $category)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="sfwr_box">
                                <div class="sfwr_hd">
                                    <div class="img-name">

                                        @if ($category->category_icon)
                                            <div class="sfwr_img">
                                                <img class="ctg-img"
                                                    src="{{ asset('CategoryIcon/' . $category->category_icon) }}">
                                            </div>
                                        @endif
                                        <div class="sfwr_name">
                                            <h6 class="big-bld">
                                                {{  $category->name }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="sfwr_text">
                                        <p class="list-unstyled m-0">
                                            {{ $category->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
