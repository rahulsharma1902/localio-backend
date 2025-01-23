@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">{{ isset($product) ? 'Update Product' : 'Add Product' }}</h4>
            </div>
        </div>
        <?php $lang = getCurrentLocale(); ?>
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="nk-block">
                    <form action="{{ url('admin-dashboard/product-update-procc') }}" class="form-validate"
                        novalidate="novalidate" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Product Name</label>
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Product Name"
                                                value="{{ old('name', isset($productTranslation) ? $productTranslation->name : $product->name ?? '') }}">
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
                                        <textarea class="description" name="description" id="description" rows="100" cols="50">{{ old('description', isset($productTranslation) ? $productTranslation->description : $product->description ?? '') }}</textarea>
                                        @error('description')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($productTranslation->language ?? '')
                            <input type="hidden" name="lang_code"
                                value="{{ $productTranslation->language->lang_code ?? '' }}">
                        @else
                            {{-- {{ dd('hello') }} --}}
                            <input type="hidden" class="form-control" id="language_id" name="lang_code"
                                value="{{ getCurrentLanguageID() }}" />
                        @endif
                        {{-- {{ dd('hello') }} --}}
                        <input type="hidden" name="product_tr_id" value="{{ $productTranslation->id ?? '' }}">

                        <!-- New Input Fields -->
                        <div class="row g-3 mt-2">
                            @if (!isset($product))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product-category">Product Category</label>
                                        <select class="form-control product-category" name="product_category[]"
                                            multiple="multiple">
                                            <option value="" disabled>Select Categories</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option>No category found
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    @error('product_category')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            @if (isset($product))
                                <div class="col-md-6">
                                    @if ($lang == 'en-us')
                                        <div class="form-group">
                                            <label class="form-label" for="product-category">Product Category</label>
                                            <select class="form-control product-category" name="product_category[]"
                                                multiple="multiple">
                                                <option value="" disabled>Select Categories</option>
                                                @if ($categories->isNotEmpty())
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($product->categories->contains($category->id)) selected @endif>
                                                            {{ $category->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product-price">Product Price</label>
                                    <input type="text" class="form-control" name="product_price" id="product-price"
                                        min="1" value="{{ isset($product) ? $product->product_price : '' }}"
                                        placeholder="Product Price">
                                </div>
                                @error('product_price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div id="selected-category-ids-container"></div>
                        <div id="selected-categories"></div>
                        <!-- Product Icon (File Input) -->

                        <div class="row mt-3">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="product-icon">Product Icon</label>
                                    @if (!isset($product) || $lang == 'en-us')
                                        <input type="file" class="form-control" name="product_icon" id="product-icon">
                                    @endif
                                    @if (isset($product))
                                        <img src="{{ asset('ProductIcon/' . $product->product_icon) }}"
                                            alt="{{ $product->name }}" style="width: 50px; height: auto;">
                                    @endif
                                </div>
                                @error('product_icon')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Product Image -->
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="product-image">Product Image</label>
                                    @if (!isset($product) || $lang == 'en-us')
                                        <input type="file" class="form-control" name="product_image"
                                            id="product-image">
                                    @endif
                                    @if (isset($product))
                                        <img src="{{ asset('ProductImage/' . $product->product_image) }}"
                                            alt="{{ $product->name }}" style="width: 50px; height: auto;">
                                    @endif
                                </div>
                                @error('product_image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <!-- Product Link -->
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label class="form-label" for="product-link">Product Link</label>
                                <input type="url" class="form-control" name="product_link" id="product-link"
                                    value="{{ isset($product) ? $product->product_link : '' }}"
                                    placeholder="Product Link">
                            </div>
                            @error('product_link')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Key Features</label>
                                <div class="features-container">
                                    @if (!isset($product))
                                        <div class="feature-group d-flex align-items-center">
                                            <input type="text" class="form-control" name="key_features[]"
                                                id="keyFeatures" placeholder="Key Features">
                                            <button class="remove-feature btn btn-icon ml-2" type="button"
                                                style="display:none;">
                                                <i class="fa fa-minus-circle text-danger"
                                                    style="font-size: 1.5rem; cursor: pointer;"></i>
                                            </button>
                                        </div>
                                    @elseif(isset($product))
                                        @foreach ($product->keyFeatures as $feature)
                                            <div class="feature-group d-flex align-items-center">
                                                @php
                                                    $translation = $feature->translations->firstWhere('language_id', 1);
                                                @endphp
                                                <input type="text" class="form-control"
                                                    name="key_features[{{ $feature->id }}]" id="keyFeatures"
                                                    value="{{ $translation ? $translation->feature : $feature->feature }}">
                                                @if (!isset($product) || $lang == 'en-us')
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
                                @if (!isset($product) || $lang == 'en-us')
                                    <div class="mt-1 text-center">
                                        <button class="add-more-features btn btn-icon" type="button">
                                            <i class="fa fa-plus-circle text-success"
                                                style="font-size: 1.5rem; cursor: pointer;"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="addCategory btn btn-primary text-center"><em
                                        class="icon ni ni-plus"></em><span>{{ isset($product) ? 'Update Product' : 'Add Product' }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.product-category').select2({
                placeholder: "Select Product Category"
            });
        });
    </script>
@endsection
