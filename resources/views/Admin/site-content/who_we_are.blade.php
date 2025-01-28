@extends('admin_layout.master')

@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Who We Are</h4>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ route('admin.who_we_are.update') }}" method="POST" enctype="multipart/form-data"
                    class="form-validate">
                    @csrf

                    <div class="row g-3">
                        <!-- Main Heading -->
                        <div class="col-md-12">
                            <label class="form-label" for="main_heading">Main Heading</label>
                            <input type="text" class="form-control" id="main_heading" name="main_heading"
                                value="{{ $whoWeAre->main_heading ?? '' }}" />
                        </div>

                        <!-- Sub Heading -->
                        <div class="col-md-12">
                            <label class="form-label" for="sub_heading">Sub Heading</label>
                            <input type="text" class="form-control" id="sub_heading" name="sub_heading"
                                value="{{ $whoWeAre->sub_heading ?? '' }}" />
                        </div>

                        <!-- Background Top Image -->
                        <div class="col-md-12">
                            <label class="form-label" for="bg_top_img">Background Top Image</label>
                            <input type="file" class="form-control" id="bg_top_img" name="bg_top_img" />
                            @if (isset($whoWeAre->bg_top_img))
                                <img src="{{ asset($whoWeAre->bg_top_img) }}" alt="Background Top Image" class="mt-2"
                                    style="width: 100px; height: auto;">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="top_left_section_img">Top left Section Image</label>
                            <input type="file" class="form-control" id="top_left_section_img"
                                name="top_left_section_img" />
                            @if (isset($whoWeAre->top_left_section_img))
                                <img src="{{ asset($whoWeAre->top_left_section_img) }}" alt="Top left Section Image"
                                    class="mt-2" style="width: 100px; height: auto;">
                            @endif
                        </div>

                        <!-- Top Right Section Image -->
                        <div class="col-md-12">
                            <label class="form-label" for="top_right_section_img">Top Right Section Image</label>
                            <input type="file" class="form-control" id="top_right_section_img"
                                name="top_right_section_img" />
                            @if (isset($whoWeAre->top_right_section_img))
                                <img src="{{ asset($whoWeAre->top_right_section_img) }}" alt="Top Right Section Image"
                                    class="mt-2" style="width: 100px; height: auto;">
                            @endif
                        </div>

                        <!-- Middle Page Heading -->
                        <div class="col-md-12">
                            <label class="form-label" for="mp_heading">Middle Page Heading</label>
                            <input type="text" class="form-control" id="mp_heading" name="mp_heading"
                                value="{{ $whoWeAre->mp_heading ?? '' }}" />
                        </div>

                        <!-- Middle Page Sub Heading -->
                        <div class="col-md-12">
                            <label class="form-label" for="mp_sub_heading">Middle Page Sub Heading</label>
                            <input type="text" class="form-control" id="mp_sub_heading" name="mp_sub_heading"
                                value="{{ $whoWeAre->mp_sub_heading ?? '' }}" />
                        </div>

                        <!-- Top Card Title -->
                        <div class="col-md-12">
                            <label class="form-label" for="top_card_title">Top Card Title</label>
                            <input type="text" class="form-control" id="top_card_title" name="top_card_title"
                                value="{{ $whoWeAre->top_card_title ?? '' }}" />
                        </div>

                        <!-- Top Card Image -->
                        <div class="col-md-12">
                            <label class="form-label" for="top_card_image">Top Card Image</label>
                            <input type="file" class="form-control" id="top_card_image" name="top_card_image" />
                            @if (isset($whoWeAre->top_card_image))
                                <img src="{{ asset($whoWeAre->top_card_image) }}" alt="Top Card Image" class="mt-2"
                                    style="width: 100px; height: auto;">
                            @endif
                        </div>

                        <!-- Top Card Description -->
                        <div class="col-md-12">
                            <label class="form-label" for="top_card_desc">Top Card Description</label>
                            <textarea class="form-control" id="top_card_desc" name="top_card_desc">{{ $whoWeAre->top_card_desc ?? '' }}</textarea>
                        </div>

                        <!-- Specialists Heading -->
                        <div class="col-md-12">
                            <label class="form-label" for="specialists_heading">Specialists Heading</label>
                            <input type="text" class="form-control" id="specialists_heading"
                                name="specialists_heading" value="{{ $whoWeAre->specialists_heading ?? '' }}" />
                        </div>

                        <!-- Service Software Heading -->
                        <div class="col-md-12">
                            <label class="form-label" for="ss_heading">Service Software Heading</label>
                            <input type="text" class="form-control" id="ss_heading" name="ss_heading"
                                value="{{ $whoWeAre->ss_heading ?? '' }}" />
                        </div>

                        <!-- Service Software Description -->
                        <div class="col-md-12">
                            <label class="form-label" for="ss_sub_desc">Service Software Description</label>
                            <textarea class="form-control" id="ss_sub_desc" name="ss_sub_desc">{{ $whoWeAre->ss_sub_desc ?? '' }}</textarea>
                        </div>

                        <!-- Portfolio Button Text -->
                        <div class="col-md-12">
                            <label class="form-label" for="protfolio_btn">Portfolio Button Text</label>
                            <input type="text" class="form-control" id="protfolio_btn" name="protfolio_btn"
                                value="{{ $whoWeAre->protfolio_btn ?? '' }}" />
                        </div>

                        <!-- Status -->
                        <div class="col-md-12">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{ $whoWeAre->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $whoWeAre->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-localio btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
