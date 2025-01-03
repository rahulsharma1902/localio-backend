@extends('admin_layout.master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">{{isset($product) ?'Update Product' : 'Add Product' }}</h4>
        </div>
    </div>
    <?php $lang = getCurrentLocale();?>
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block">
                <form action="{{url('admin-dashboard/product-add-procc')}}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($product) ? $product->id : ''}}">
                    <div class="row g-3">
                        <!-- Product Name -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Product Name</label>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', isset($productTranslation) ? $productTranslation->name : ($product->name ?? '')) }}">
                                    </div>
                                </div>
                                @error('name')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Product Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="description" id="description" rows="4"
                                        cols="50">{{old('description', isset($productTranslation) ? $productTranslation->description : ($product->description ?? ''))}}</textarea>
                                    @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($productTranslation->language ?? '')
                    <input type="hidden" name="handle" value="{{ $productTranslation->language->handle ?? '' }}">
                    @else
                    <input type="hidden" class="form-control" id="language_id" name="handle"
                        value="{{ Cookie::get('language_code', config('app.locale')) }}" />
                    @endif
                    <input type="hidden" name="product_tr_id" value="{{ $productTranslation->id ?? '' }}">

                    <!-- New Input Fields -->
                    <div class="row g-3 mt-2">
                        @if(!isset($product))
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="product-category">Product Category</label>
                                <select class="form-control" name="product_category[]" id="product-category" multiple>
                                    <option value="" disabled>Select Categories</option>
                                    @if($categories->isNotEmpty())
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name  ?? '' }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            @error('product_category')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif
                        @if(isset($product))
                        <div class="col-md-6">
                            @if($lang == 'en')
                            <div class="form-group">
                                <label class="form-label" for="product-category">Product Category</label>
                                <select class="form-control" name="product_category[]" id="product-category" multiple>
                                    <option value="" disabled>Select Categories</option>
                                    @if($categories->isNotEmpty())
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($product->
                                        categories->contains($category->id)) selected @endif>
                                        {{ $category->name ?? '' }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            @elseif($lang !== 'en')
                            <div class="form-group">
                                <label class="form-label" for="product-category">Product Category</label>
                                <!-- <input type="text" class="form-control" name="product_category_display" id="product-category-display" 
                                            value="{{ $product->categories->pluck('name')->join(', ') }}" readonly> -->
                                <input type="text" class="form-control" name="product_category_display"
                                    id="product-category-display" value="{{ $product->categories->isNotEmpty() 
                                                    ? $product->categories->map(function($category) use($siteLanguage) {
                                                        $translation = $category->translations->firstWhere('language_id', $siteLanguage->id);
                                                        return $translation ? $translation->name : $category->name;
                                                    })->join(', ') 
                                                    : $product->categories->pluck('name')->join(', ') }}" readonly>

                                <input type="hidden" name="product_category[]" id="product-category"
                                    value="{{ implode(',', $product->categories->pluck('id')->toArray()) }}">
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="product-price">Product Price</label>
                                <input type="text" class="form-control" name="product_price" id="product-price" min="1"
                                    value="{{ isset($product) ? $product->product_price : ''}}">
                            </div>
                            @error('product_price')
                            <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div id="selected-category-ids-container"></div>
                    <div id="selected-categories"></div>
                    <!-- Product Icon (File Input) -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="product-icon">Product Icon</label>
                            @if(!isset($product) || $lang == 'en')
                            <input type="file" class="form-control" name="product_icon" id="product-icon">
                            @endif
                            @if(isset($product))
                            <img src="{{ asset('ProductIcon/' . $product->product_icon) }}" alt="{{ $product->name }}"
                                style="width: 50px; height: auto;">
                            @endif
                        </div>
                        @error('product_icon')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Product Image -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="product-image">Product Image</label>
                            @if(!isset($product) || $lang == 'en')
                            <input type="file" class="form-control" name="product_image" id="product-image">
                            @endif
                            @if(isset($product))
                            <img src="{{ asset('ProductImage/' . $product->product_image) }}" alt="{{ $product->name }}"
                                style="width: 50px; height: auto;">
                            @endif
                        </div>
                        @error('product_image')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Product Link -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="product-link">Product Link</label>
                            <input type="url" class="form-control" name="product_link" id="product-link"
                                value="{{ isset($product) ? $product->product_link : '' }}">
                        </div>
                        @error('product_link')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="name">Key Features</label>
                            <div class="features-container">
                                @if(!isset($product))

                                <div class="feature-group d-flex align-items-center">
                                    <input type="text" class="form-control" name="key_features[]" id="keyFeatures">
                                    <button class="remove-feature btn btn-icon ml-2" type="button"
                                        style="display:none;">
                                        <i class="fa fa-minus-circle text-danger"
                                            style="font-size: 1.5rem; cursor: pointer;"></i>
                                    </button>
                                </div>
                                @elseif(isset($product))
                                @foreach($product->keyFeatures as $feature)
                                <div class="feature-group d-flex align-items-center">
                                    @php
                                    $translation = $feature->translations->firstWhere('language_id', $siteLanguage->id);
                                    @endphp
                                    <input type="text" class="form-control" name="key_features[{{$feature->id}}]"
                                        id="keyFeatures"
                                        value="{{ $translation ? $translation->feature : $feature->feature }}">
                                    @if(!isset($product) || $lang == 'en')
                                    <button class="remove-feature btn btn-icon ml-2" type="button">
                                        <i class="fa fa-minus-circle text-danger"
                                            style="font-size: 1.5rem; cursor: pointer;"></i>
                                    </button>
                                    @endif
                                </div>
                                @endforeach

                                @endif
                            </div>
                            @if ($errors->has('key_features'))
                            <div class="error text-danger">{{ $errors->first('key_features') }}</div>
                            @endif
                            @if(!isset($product) || $lang == 'en')
                            <div class="mt-1 text-center">
                                <!-- Add Feature Icon -->
                                <button class="add-more-features btn btn-icon" type="button">
                                    <i class="fa fa-plus-circle text-success"
                                        style="font-size: 1.5rem; cursor: pointer;"></i>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <button class="addCategory btn btn-primary text-center"><em
                                    class="icon ni ni-plus"></em><span>{{isset($product) ? 'Update Product' : 'Add Product'}}</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#product-category').on('change', function() {
        let selectedCategories = $(this).val();

        selectedCategories.forEach(function(categoryId) {

            if ($('#selected-category-ids-container input[value="' + categoryId + '"]')
                .length === 0) {

                let hiddenInput = $('<input>', {
                    type: 'hidden',
                    name: 'selected_categories[]',
                    value: categoryId
                });

                $('#selected-category-ids-container').append(hiddenInput);

                let categoryName = $('#product-category option[value="' + categoryId + '"]')
                    .text();

                let categoryDiv = $('<div>', {
                    'class': 'selected-category',
                    'data-id': categoryId
                }).append(
                    $('<span>', {
                        'class': 'category-name',
                        'text': categoryName
                    }),
                    $('<button>', {
                        'type': 'button',
                        'class': 'remove-category',
                        'data-id': categoryId,
                        'html': '&times;'
                    })
                );

                $('#selected-categories').append(categoryDiv);
            }
        });

        if (selectedCategories.length === 0) {
            $('#selected-category-ids-container').empty();
            $('#selected-categories').empty();
        }
    });

    $(document).on('click', '.remove-category', function() {
        let categoryId = $(this).data('id');

        $('#product-category option[value="' + categoryId + '"]').prop('selected', false);

        $('.selected-category[data-id="' + categoryId + '"]').remove();

        $('#selected-category-ids-container input[value="' + categoryId + '"]').remove();
    });
});


$(document).ready(function() {
    // Add more input fields
    $(document).on('click', '.add-more-features', function() {
        const newFeature = `
            <div class="feature-group d-flex align-items-center">
                <input type="text" class="form-control" name="key_features[]" id="keyFeatures">
                <button class="remove-feature btn btn-icon ml-2" type="button">
                    <i class="fa fa-minus-circle text-danger" style="font-size: 1.5rem; cursor: pointer;"></i>
                </button>
            </div>
        `;
        $('.features-container').append(newFeature);
    });

    // Remove a single input field
    $(document).on('click', '.remove-feature', function() {
        $(this).closest('.feature-group').remove();
    });
});
</script>
@endsection