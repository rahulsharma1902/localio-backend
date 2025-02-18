@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Add FAQ</h4>
            </div>
        </div>

        <div class="card card-bordered">
            <div class="card-inner">
                <div class="nk-block">
                    <form action="{{ url('admin-dashboard/faq-add-procc') ?? '' }}" class="form-validate"
                        novalidate="novalidate" method="post">
                        @csrf
                        <input type="hidden" name="faq_id" value="{{ isset($faqTranslation) ? $faqTranslation->faq_id : '' }}">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Question</label>
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <input type="text" class="form-control" name="question" id="question"
                                                value="{{ isset($faqTranslation) ? $faqTranslation->question : $faq->question ?? '' }}">
                                        </div>
                                    </div>
                                    @error('question')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="description">Answer</label>
                                    <div class="form-control-wrap">
                                        <textarea class="description" name="answer" id="answer" rows="4" cols="50">{{ strip_tags(isset($faqTranslation) ? $faqTranslation->answer : $faq->answer ?? '') }}</textarea>
                                    </div>
                                    @error('answer')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="addCategory btn btn-primary btn-localio  text-center"><em
                                        class="icon ni ni-plus"></em><span>{{ isset($faq) ? 'Update Faq' : 'Save Faq' }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
