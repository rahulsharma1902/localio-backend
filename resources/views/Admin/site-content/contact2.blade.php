@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Add Category Content</h4>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{ route('admin.page-contact-content.update') ?? '' }}" class="form-validate" novalidate="novalidate" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="card border">
                        <div class="card-header mt-3">
                            Contact page
                        </div>
                        <div class="card-body">

                            <div class="form-group col-lg-12">
                                <label class="form-label" for="contact_heading">Contact heading</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="contact_heading" name="contact_heading"
                                        value="{{ $contact->contact_heading ?? '' }}" />
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="form-label" for="image_first">Image frist</label>
                                <div class="form-control-wrap">
                                @if(isset($contact->image_first))
                                    <input type="file" class="form-control" id="image_first" name="image_first" />
                                    <img src="{{asset($contact->image_first)}}" alt="image_first" class="mt-2" style="width: 100px; height: auto;">
                                    @endif
                                </div>
                            </div>
                        

                        <div class="form-group col-lg-12">
                            <label class="form-label" for="image_second">Image second</label>
                            <div class="form-control-wrap">
                            @if(isset($contact->image_second))
                                <input type="file" class="form-control" id="image_second" name="image_second" />
                                <img src="{{asset($contact->image_second)}}" alt="image_second" class="mt-2" style="width: 100px; height: auto;">
                                @endif
                            </div>
                        </div>
                    
                    <div class="form-group col-lg-12">
                        <label class="form-label" for="footer_heading">Footer
                            Heading</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="footer_heading" name="footer_heading"
                                value="{{ $contact->footer_heading ?? '' }}" />
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="form-label" for="g_button">Get
                            button</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="g_button" name="g_button" value="{{ $contact->g_button ?? '' }}" />
                        </div>
                    </div>

            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="form-group">
                <button class="addCategory btn btn-primary  text-center btn-localio"><em
                        class="icon ni ni-plus"></em><span>Update Content</span></button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

</div>



@endsection