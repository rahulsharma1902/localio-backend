@extends('admin_layout.master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content review-title">
            <h4 class="title nk-block-title">Update Review : {{ strtolower(getCurrentLocale()) }}</h4>

       
        </div>
    </div>

    <?php
        $locale = getCurrentLocale();
    ?>
    <div class="card card-bordered review-section">
        <div class="card-inner review-inner">
            <div class="nk-block">
            <form action="{{ url('admin-dashboard/review-status-update/'.$review->id) }}" method="POST">
                @csrf
                    <div class="row g-3 form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Rating</label>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                    <input type="number" name="rating" class="form-control" value="{{ old('rating', $review->rating) }}" readonly/>
                                    </div>
                                </div>
                                @error('rating')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        @if(isset($products))
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Business Name</label>
                                <div class="form-control-wrap">
                                    @if ($locale === 'en-us')
                                    <select name="product_id" class="form-control" disabled>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ $product->id == $review->product_id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="product_id" value="{{ $review->product_id }}">
                                    @endif
                                </div>

                                @error('product_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                      @endif
                      <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control" name="description" id="description" rows="4" cols="79" style="text-align: left;">
                                    {{-- Check if the selected language is lang_id = 1 (default language) --}}
                                    {{ old('description', isset($reviewTranslation) ? $reviewTranslation->description : (isset($defaultTranslation) ? $defaultTranslation->description : '')) }}
                                </textarea>
                            </div>
                            @error('description')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <div class="card-body col-md-12 mt-1 d-flex justify-content-left">
                        <div class="form-group">
                            <label class="form-label d-block text-left">Review Status</label>
                            <div class="d-flex align-items-center justify-content-center">
                                <label class="mb-0" style="margin-right: 15px;"><b>Inactive</b></label>
                                <div class="custom-control custom-switch">
                                    <!-- Check if language is 'en-us', and if so, allow the checkbox to be checked/unchecked -->
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="customSwitch1"
                                        name="status"
                                        {{ ($review->status ?? 'inactive') === 'active' ? 'checked' : '' }}
                                        {{ getCurrentLocale() !== 'en-us' ? 'disabled' : '' }}
                                    >
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                                <label class="ml-3 mb-0"><b>Active</b></label>
                            </div>
                        </div>
                    </div>

                    @error('status')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror

                    <input type="hidden" name="status" id="statusHidden1" value="{{ $review->status ?? 'inactive' }}">
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type= "submit" class="addCategory btn btn-primary  text-center review-btn btn-localio"><em class=""></em><span>Update Review</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const switchInput = $("#customSwitch1");
        const hiddenInput = $("#statusHidden1");

        // Set initial checkbox state
        switchInput.prop("checked", hiddenInput.val() === "active");

        // Update hidden input when the switch is toggled, only if it's not disabled
        if (!switchInput.prop("disabled")) {
            switchInput.on("change", function() {
                const newValue = this.checked ? "active" : "inactive";
                hiddenInput.val(newValue);
            });
        }
    });
</script>
@endsection
