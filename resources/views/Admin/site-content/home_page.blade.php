@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Home Content</h4>
        </div>
    </div>
    @if(isset($homeContents))
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/home-page-update') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            @foreach($homeContents as $id=> $content)
                                @if($content->meta_key == 'header title')
                                    <div class="form-group">
                                        <label class="form-label" for="name">header title</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="meta_value[{{$content->id}}]" id="metaValue"
                                                    value="{{$content->meta_value ?? '' }}">
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
                                            <textarea class="description" name="meta_value[{{$content->id}}]" id="metaValue" rows="4"
                                                cols="50">{{$content->meta_value ?? ''}}</textarea>
                                        </div>
                                        @error('meta_value')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            @foreach($homeContents as $content)
                                @if($content->meta_key == 'header image')
                                    <div class="form-group">
                                        <label class="form-label" for="image">header Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="meta_value[{{$content->id}}]" id="metaValue" value="{{ $content->value ?? ''}}">
                                        </div>
                                        @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                        @if(isset($content->meta_key))
                                            <img src="{{ asset($content->meta_value) }}" alt="{{ $content->meta_key }}"
                                                style="width: 100px; height: auto;">
                                        @endif
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