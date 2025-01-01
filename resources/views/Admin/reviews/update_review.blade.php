@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content review-title">
            <h4 class="title nk-block-title">Update Review</h4>   
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
                                    <input type="number" name="rating" value="{{ old('rating', $review->rating) }}" />
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
                                <label class="form-label">Products</label>
                                <div class="form-control-wrap">
                                    @if ($locale === 'en') 
                                    <select name="product_id">
    @foreach($products as $product)
        <option value="{{ $product->id }}" {{ $product->id == $review->product_id ? 'selected' : '' }}>
            {{ $product->name }}
        </option>
    @endforeach
</select>

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
                                <textarea name="description">{{ old('description', $review->description) }}</textarea>
                                </div>
                                @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button type= "submit" class="addCategory btn btn-primary  text-center review-btn"><em class="icon ni ni-plus"></em><span>Update Review</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
