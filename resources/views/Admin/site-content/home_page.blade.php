@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Home Content</h4>
        </div>
    </div>
    <?php 
    
    $lang_code = getCurrentLocale();

    ?>
    @if(isset($homeContents))
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/home-page-update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            @php
                                $homeContentsEn = \App\Models\HomeContent::where('lang_code','en')->get();
                            @endphp
                            @foreach($homeContentsEn as $content)
                                @if($content->meta_key == 'logo image')
                                    <div class="form-group">
                                        @if($lang_code == 'en')
                                            <label class="form-label" for="image">Logo Image</label>
                                            <div class="dz-message">
                                                <input type="file" class="form-control" name="logo_image[{{$content->id}}]"
                                                    id="metaValue" value="{{ $content->value ?? ''}}">
                                            </div>
                                            @error('logo_image')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        @endif
                                        @if(!empty($content->meta_value) && file_exists(public_path($content->meta_value)))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'header title')
                                    <div class="form-group">
                                        <label class="form-label" for="name">header title</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="header_title[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('meta_value')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-12 mt-3">
                            @foreach($homeContents as $content)
                                @if($content->meta_key == 'header description')
                                    <div class="form-group">
                                        <label class="form-label" for="description">header description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="description" name="header_description[{{$content->id}}]"
                                                id="metaValue" rows="4" cols="50">{{$content->meta_value ?? ''}}</textarea>
                                        </div>
                                        @error('meta_value')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            @php
                                $homeContentsEn = \App\Models\HomeContent::where('lang_code','en')->get();
                            @endphp
                            @foreach($homeContentsEn as $content)
                                @if($content->meta_key == 'header image')
                                    <div class="form-group">
                                        @if($lang_code == 'en')
                                        <label class="form-label" for="image">header Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="header_image[{{$content->id}}]"
                                                id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('header_image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @endif
                                        @if(isset($content->meta_key))
                                            <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-12">
                            @php
                                $homeContentsEn = \App\Models\HomeContent::where('lang_code','en')->get();
                            @endphp
                            @foreach($homeContentsEn as $content)
                                @if($content->meta_key == 'header background image')
                                    <div class="form-group">
                                        @if($lang_code == 'en')
                                        <label class="form-label" for="image">header Background Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="header_backgound_image[{{$content->id}}]"
                                                id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('header_backgound_image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @endif
                                        @if(isset($content->meta_key))
                                            <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'trusted brands text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Trusted brand text</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="trusted_brand[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('trusted_brand')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- <div class="col-md-12">
                            @foreach($homeContents as $content)
                                @if($content->meta_key == 'trusted brands image')
                                    <div class="form-group">
                                        @if($lang_code == 'en')
                                        <label class="form-label" for="image">Trusted brand image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="brand_image[{{$content->id}}] "
                                                id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('brand_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @endif
                                        @if(isset($content->meta_key))
                                        <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                            style="width: 100px; height: auto;">
                                        @endif
                                    </div>
                                @endif 
                            @endforeach
                        </div> -->
                        <div class="col-md-12">
                            @php
                                $homeContentsEn = \App\Models\HomeContent::where('lang_code','en')->get();
                            @endphp
                            @foreach($homeContentsEn as $content)
                                @if($content->meta_key == 'trusted brands image')
                                    <div class="form-group">
                                        @if($lang_code == 'en')
                                            <label class="form-label" for="image">Trusted brand images</label>
                                            <div class="dz-message">
                                                <!-- Allow multiple file uploads -->
                                                <input type="file" class="form-control" name="brand_image[{{$content->id}}][]" id="metaValue" value="{{ $content->meta_value ?? '' }}" multiple>
                                            </div>
                                            @error('brand_image')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        @endif

                                        @if(isset($content->meta_value) && !empty($content->meta_value))
                                            @php
                                                $imageIds = json_decode($content->meta_value);
                                            @endphp

                                            @if(is_array($imageIds))  <!-- Check if the decoded value is an array -->
                                                @foreach($imageIds as $imageId)
                                                    @php
                                                        $media = \App\Models\HomeContentMedia::find($imageId); // Retrieve image by ID
                                                    @endphp
                                                    @if($media)
                                                        <img src="{{ asset($media->file_path) }}" alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">
                                                    @endif
                                                @endforeach
                                            @else
                                                <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}" style="width: 100px; height: auto;">

                                            @endif
                                        @endif

                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'most popular text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Trusted brand text</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="popular_text[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('popular_text')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach 
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'exclusive deals text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Exclusive Deal text</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="exlusive_deal[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('exlusive_deal')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach 
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'all exclusive lable')
                                    <div class="form-group">
                                        <label class="form-label" for="name">All Exclusive lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="exlusive_lable[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('exlusive_lable')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach 
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'get deal lable')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Get Deal Lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="get_deal_lable[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('get_deal_lable')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach 
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'ai search title')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Ai Search Title</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="ai_search_title[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('ai_search_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'ai search description')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Ai Search Description</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="ai_search_desc[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('ai_search_desc')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'top product text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Top Product Text</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="top_product_text[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('top_product_text')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'all product lable')
                                    <div class="form-group">
                                        <label class="form-label" for="name">All Product Lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="all_product_lable[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('all_product_lable')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'latest reviews text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Latest Reviews Text</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="latest_review_text[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('latest_review_text')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'write review lable')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Write Reviews Lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="write_review_lable[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('write_review_lable')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'read article text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Read Reviews Lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="read_article_text[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('read_article_text')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'view article lable')
                                    <div class="form-group">
                                        <label class="form-label" for="name">View Article Lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="view_article_lable[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('view_article_lable')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'find tool text')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Find Tool Text</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="find_tool_text[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('find_tool_text')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'get button lable')
                                    <div class="form-group">
                                        <label class="form-label" for="name">Get Button Lable</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="get_button_lable[{{$content->id}}]"
                                                    id="metaValue" value="{{$content->meta_value ?? '' }}">
                                            </div>
                                        </div>
                                        @error('get_button_lable')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach  
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button class="addCategory btn btn-primary  text-center"><em
                                    class="icon ni ni-plus"></em><span>Update Content</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection