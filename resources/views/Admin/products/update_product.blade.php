@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <?php $lang = getCurrentLocale(); ?>
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">
                    {{ isset($product) ? 'Update Business : ' . $lang : 'Add Business' }}
                </h4>
            </div>
        </div>

        <form action="{{ url('admin-dashboard/product-update-procc', ['id' => $product->id]) }}" class="form-validate"
            novalidate="novalidate" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="nk-block">
                            </div>
                            <input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Business Name</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Business Name"
                                                value="{{ old('name', $product->translations->name ?? $product->name ?? '') }}"
                                            />

                                            </div>
                                        </div>
                                        @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="product-link">Affiliate Link</label>
                                        <input class="form-control" type="url" class="form-control" name="product_link"
                                            id="product-link" 
                                            placeholder="Enter you Affiliate link "
                                            value="{{ old('product_link', $product->translations->product_link ?? $product->product_link ?? '') }}">

                                    </div>

                                    @error('product_link')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @error('lang_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                <!-- Product Description -->
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="description" name="description" id="description" rows="2" 
                                            cols="70">
                                                {{ old('description', $product->translations->description ?? $product->description ?? '') }}
                                            </textarea>
                                            @error('description')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($productTranslation->language ?? '')
                                <input type="hidden" name="lang_code"
                                    value="{{ $productTranslation->language->id ?? '' }}">
                            @else
                                <input type="hidden" class="form-control" id="language_id" name="lang_code"
                                    value="{{ getCurrentLanguageID() }}" />
                            @endif
                            <input type="hidden" name="product_tr_id" value="{{ $productTranslation->id ?? '' }}">


                            <div class="row g-3 my-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Business Category</label>
                                        <select class="form-control product-category filter-item filter-option"
                                            id="product-category" name="product_category[]" multiple
                                            {{ getCurrentLanguageID() != 1 ? 'disabled' : '' }}>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($product->categories->contains($category->id)) selected @endif>
                                                    {{ optional(optional($category)->translations)->name ?? optional($category)->name ?? '' }}

                                                </option>
                                            @endforeach
                                        </select>
                                        @if (getCurrentLanguageID() != 1)
                                            @foreach ($product->categories as $category)
                                                <input type="hidden" name="product_category[]"value="{{ $category->id }}">
                                            @endforeach
                                        @endif
                                        @error('product_category')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
<!--                             
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Business Category</label>
                                        <select class="form-control product-category filter-item filter-option"
                                            id="product-category" name="product_category[]" multiple
                                            @if (getCurrentLocale() !== 'en-us') disabled @endif>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($product->categories->contains($category->id)) selected @endif>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if (getCurrentLocale() !== 'en-us')
                                            @foreach ($product->categories as $category)
                                                <input type="hidden" name="product_category[]"
                                                    value="{{ $category->id }}">
                                            @endforeach
                                        @endif
                                        @error('product-category')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> -->

                            <div id="filter-options" class="row">
                                @foreach ($filters as $filter)
                                    <div class="col-12">
                                        <h4>{{ $filter->name }}</h4>
                                    </div>

                                    @foreach ($filter->filterOptions as $option)
                                        <div class="col-md-6"> 
                                            <div class="form-check"> 
                                                <input type="checkbox" class="form-check-input filter-option"
                                                    id="filter_{{ $option->id }}" 
                                                    name="filter_options[]"
                                                    value="{{ $option->id }}" 
                                                    data-category="{{ $filter->category_id }}"
                                                    data-filter="{{ $filter->id }}"
                                                    {{ $option->id }}
                                                    @if ($product->filters->contains('filter_option_id', $option->id)) checked @endif>

                                                <label class="form-check-label" for="filter_{{ $option->id }}">
                                                    <!-- {{ $option->name }} -->
                                                    {{ optional(optional($option)->translations)->name ?? optional($option)->name ?? '' }}

                                                </label>
                                            </div>

                                            @error('filter_options')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>





                            <input type="hidden" id="selected_filters" name="selected_filters">

                            <div id="selected-category-ids-container"></div>
                            <div id="selected-categories"></div>
                            <!-- Product Icon (File Input) -->
                            <br>
                             
                            {{-- 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4>Business Prices</h4>

                                    <div class="row" id="price-container">
                                        @foreach ($product->prices as $price)
                                            <div class="col-md-12 price-item" data-id="{{ $price->id }}">
                                                <input type="hidden" name="price_ids[]" value="{{ $price->id }}">

                                                <div class="row">
                                                    <div class="col-md-5 mb-3">
                                                        <label>Tenure:</label>
                                                        <div class="input-group">
                                                            <select name="tenures[]" class="form-control"
                                                                {{ getCurrentLanguageID() != 1 ? 'readonly' : '' }}>
                                                            
                                                            >
                                                                <option value="Starting Price" {{ $price->tenure == 'Starting Price' ? 'selected' : '' }}>Starting Price</option>
                                                                <option value="Standard Price" {{ $price->tenure == 'Standard Price' ? 'selected' : '' }}>Standard Price</option>
                                                                <option value="Pro" {{ $price->tenure == 'Pro' ? 'selected' : '' }}>Pro</option>
                                                            </select>
                                                            @error('tenures')
                                                                <div class="error text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-5 mb-3">
                                                        <label>Price: $</label>
                                                        <input type="text" name="prices[]"
                                                            value="{{ $price->price }}" class="form-control"
                                                            {{ getCurrentLanguageID() != 1 ? 'readonly' : '' }}
                                                            />
                                                            
                                                            
                                                    </div>

                                                    @if( getCurrentLanguageID() == 1 )

                                                    <div class="col-md-2 mb-3 mt-4">
                                                        <button type="button" class="btn btn-danger delete-price"
                                                            data-id="{{ $price->id }}"> <i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            --}}
                            <h4>Business Prices</h4>
                            <!-- price -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="base_price">Base Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="base_price" id="base_price"
                                            placeholder="Enter Base Price"
                                            {{ getCurrentLanguageID() != 1 ? 'readonly' : '' }}
                                            value="{{ old('base_price', $product->translations->base_price ?? $product->base_price ?? '') }}" />
                                    </div>
                                    @error('base_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="standard_price">Standard Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="standard_price" id="standard_price"
                                            placeholder="Enter Standard Price"
                                            {{ getCurrentLanguageID() != 1 ? 'readonly' : '' }}
                                            value="{{ old('standard_price', $product->translations->standard_price ?? $product->standard_price ?? '') }}" />
                                    </div>
                                    @error('standard_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="pro_price">Pro Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="pro_price" id="pro_price"
                                            placeholder="Enter Pro Price"
                                            {{ getCurrentLanguageID() != 1 ? 'readonly' : '' }}
                                            value="{{ old('pro_price', $product->translations->pro_price ?? $product->pro_price ?? '') }}" />
                                    </div>
                                    @error('pro_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- price end here -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product-icon">Icon</label>
                                        @if (!isset($product) || getCurrentLanguageID() == 1 )
                                            <input type="file" class="form-control" name="product_icon"
                                                id="product-icon">
                                        @endif
                                        @if (isset($product))
                                            <img src="{{ asset($product->product_icon) }}" alt="{{ $product->name }}"
                                                style="width: 50px; height: auto;margin-top: 16px;border-radius: 40px;">
                                        @endif
                                    </div>
                                    @error('product_icon')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Product Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product-image">Image</label>
                                        @if (!isset($product) || getCurrentLanguageID() == 1)
                                            <input type="file" class="form-control" name="product_image"
                                                id="product-image">
                                        @endif
                                        @if (isset($product))
                                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }}"
                                                style="width: 50px; height: auto;margin-top: 16px; border-radius: 40px;">
                                        @endif
                                    </div>
                                    @error('product_image')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Product Link -->
                            <div class="row">


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="product-feature">Business Feature</label>
                                        <select class="form-control product-feature" name="product_feature[]"
                                            multiple="multiple"
                                            {{ getCurrentLanguageID() != 1 ? 'disabled' : '' }}>
                                            
                                            >
                                            @if ($features->isNotEmpty())
                                                @foreach ($features as $feature)
                                                    <option value="{{ $feature->id }}"
                                                        @if (in_array($feature->id, array_column($feature_arr, 'id'))) selected="selected" @endif>
                                                        {{ $feature->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('product_feature')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="description">Overview</label>
                                    <div class="form-control-wrap">
                                        <textarea class="description" name="overview" id="overview" rows="2" cols="70">
                                            <!-- {{ old('overview', $product->translations->overview ?? $product->overview ?? '') }} -->
                                            {{ old('overview', (!empty($product->translations) && $product->translations->language_id == getCurrentSiteLanguage()->id) ? $product->translations->overview : $product->overview ?? '') }}

                                        </textarea>
                                        @error('overview')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="removeproncondata-container"></div>

                                
                                {{-- Pros Section --}}
                                <div class="col-md-12 mt-4">
                                    <div class="card border">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4>Pros</h4>
                                            @if(getCurrentLanguageID() == 1)
                                                <button type="button" class="btn btn-success add-pros">Add</button>
                                            @endif
                                        </div>
                                        <div class="card-body pros-container">
                                            @if(isset($product->prons) && $product->prons->count())
                                                @foreach ($product->prons as $index => $value)
                                                    <div class="row pros-group mt-2">
                                                        <input type="hidden" name="pros[{{ $index }}][id]" value="{{ $value['id'] }}">
                                                        <div class="col-lg-10">
                                                            <input type="text" name="pros[{{ $index }}][name]" class="form-control" placeholder="Enter Pro" 
                                                                value="{{ optional($value->translation)->name ?? $value['name'] ?? '' }}"

                                                                />
                                                        </div>
                                                        <div class="col-lg-10 mt-2">
                                                            <textarea name="pros[{{ $index }}][description]" class="form-control" placeholder="Enter Description">{{ optional($value->translation)->description ?? $value['description'] ?? '' }}</textarea>
                                                        </div>
                                                        @if(getCurrentLanguageID() == 1)
                                                        <div class="col-lg-2 d-flex align-items-center">
                                                            <button type="button" class="btn btn-danger remove-item"><em class="icon ni ni-trash-fill"></em></button>
                                                        </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- Cons Section --}}
                                <div class="col-md-12 mt-4">
                                    <div class="card border">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4>Cons</h4>
                                            @if(getCurrentLanguageID() == 1)
                                                <button type="button" class="btn btn-success add-cons">Add</button>
                                            @endif
                                        </div>
                                        <div class="card-body cons-container">
                                            @if(isset($product->cons) && $product->cons->count())
                                                @foreach ($product->cons as $index => $value)
                                                    <div class="row cons-group mt-2">
                                                        <input type="hidden" name="cons[{{ $index }}][id]" value="{{ $value['id'] }}">
                                                        <div class="col-lg-10">
                                                            <input type="text" name="cons[{{ $index }}][name]" class="form-control" placeholder="Enter Con" 
                                                            value="{{ optional($value->translation)->name ?? $value['name'] ?? '' }}"
                                                            
                                                            >
                                                        </div>
                                                        <div class="col-lg-10 mt-2">
                                                            <textarea name="cons[{{ $index }}][description]" class="form-control" placeholder="Enter Description">{{ optional($value->translation)->description ?? $value['description'] ?? '' }}</textarea>
                                                        </div>
                                                        @if(getCurrentLanguageID() == 1)
                                                            <div class="col-lg-2 d-flex align-items-center">
                                                                <button type="button" class="btn btn-danger remove-item"><em class="icon ni ni-trash-fill"></em></button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="card border">

                                        <div class="nk-block">
                                            <div class="col-md-12 mt-1 d-flex justify-content-between">
                                                <a href="your-view-page-url" class="btn btn-link text-center">
                                                    <span><b>View Page</b></span>
                                                </a>
                                                <button class="addCategory btn btn-primary text-center btn-localio"><em
                                                        class=""
                                                        id="update-button"></em><span>Update</span></button>

                                            </div>
                                            <div class="card-body col-md-12 mt-1 d-flex justify-content-left">
                                                <div class="form-group">
                                                    <label class="form-label d-block text-left">Business Status</label>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <label class="mb-0" style="margin-right: 15px;"><b>Private</b></label>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input" id="customSwitch"
                                                                {{ (!empty($product->translations) && $product->translations->language_id == getCurrentSiteLanguage()->id
                                                                    ? $product->translations->status
                                                                    : $product->status) == 'public' ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="customSwitch"></label>
                                                        </div>
                                                        <label class="ml-3 mb-0"><b>Public</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('status')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror

                                            <!-- Hidden Input to Store Status Value -->
                                            <input type="hidden" name="status" id="statusHidden" 
                                                value="{{ !empty($product->translations) && $product->translations->language_id == getCurrentSiteLanguage()->id 
                                                    ? $product->translations->status 
                                                    : $product->status ?? 'private' }}">



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            const switchInput = $("#customSwitch");
            const hiddenInput = $("#statusHidden");

            // Set initial state based on database value
            switchInput.prop("checked", hiddenInput.val() === "public");

            // Update hidden input value when switch is toggled
            switchInput.on("change", function() {
                hiddenInput.val(this.checked ? "public" : "private");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
        let prosCount = $(".pros-group").length;
        let consCount = $(".cons-group").length;

        let removePronConData = []; // Store removed IDs

        const prosTemplate = (index) => `
            <div class="row pros-group mt-2">
                <input type="hidden" name="pros[${index}][id]" value="">
                <div class="col-lg-10">
                    <input type="text" name="pros[${index}][name]" class="form-control" placeholder="Enter Pro">
                </div>
                <div class="col-lg-10 mt-2">
                    <textarea name="pros[${index}][description]" class="form-control" placeholder="Enter Description"></textarea>
                </div>
                <div class="col-lg-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-item"><em class="icon ni ni-trash-fill"></em></button>
                </div>
            </div>`;

        const consTemplate = (index) => `
            <div class="row cons-group mt-2">
                <input type="hidden" name="cons[${index}][id]" value="">
                <div class="col-lg-10">
                    <input type="text" name="cons[${index}][name]" class="form-control" placeholder="Enter Con">
                </div>
                <div class="col-lg-10 mt-2">
                    <textarea name="cons[${index}][description]" class="form-control" placeholder="Enter Description"></textarea>
                </div>
                <div class="col-lg-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-item"><em class="icon ni ni-trash-fill"></em></button>
                </div>
            </div>`;

        $(".add-pros").click(function () {
            $(".pros-container").append(prosTemplate(prosCount++));
        });

        $(".add-cons").click(function () {
            $(".cons-container").append(consTemplate(consCount++));
        });

        $(document).on("click", ".remove-item", function () {
            let itemRow = $(this).closest(".row");
            let itemId = itemRow.find('input[name*="[id]"]').val().trim();

            if (itemId && itemId !== "") {
                if (!removePronConData.includes(itemId)) {
                    removePronConData.push(itemId);
                }

                // Clear existing hidden inputs
                $(".removeproncondata-container").empty();

                // Append new hidden inputs for each removed ID
                removePronConData.forEach(id => {
                    $(".removeproncondata-container").append(`<input type="hidden" name="removeproncondata[]" value="${id}">`);
                });
            }

            itemRow.remove();
        });
    });
    </script>
    <script>
     


        // select 2
        $(document).ready(function() {
            $('.product-category').select2({
                placeholder: "Select Product Category"
            });
            $('.product-feature').select2({
                placeholder: "Select Product Feature"
            });
        });



        // ck editor this script
        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: [
                    'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'imageUpload',
                    'insertTable',
                    'blockQuote', 'undo', 'redo', 'alignment', 'fontSize', 'fontColor', 'codeBlock'
                ],
                image: {
                    toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block']
                },
                language: 'en'
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor1'), {
                toolbar: [
                    'heading', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'imageUpload',
                    'insertTable',
                    'blockQuote', 'undo', 'redo', 'alignment', 'fontSize', 'fontColor', 'codeBlock'
                ],
                image: {
                    toolbar: ['imageTextAlternative', 'imageStyle:inline', 'imageStyle:block']
                },
                language: 'en'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            // Add new price field
            $('#add-price').on('click', function() {
                let newPrice = `
            <div class="row price-item">
                <div class="col-md-5 mb-3">
                    <label>Tenure:</label>
                    <div class="input-group">
                        <select name="tenures[]" class="form-control">
                            <option value="Starting Price">Starting Price</option>
                            <option value="Standard Price">Standard Price</option>
                            <option value="Pro">Pro</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-5 mb-3">
                    <label>Price:</label>
                    <input type="text" name="prices[]" class="form-control" placeholder="Enter Price" required>
                </div>

                <div class="col-md-2 mb-3">
                    <button type="button" class="btn btn-danger remove-price">X</button>
                </div>
            </div>
        `;
                $('#price-container').append(newPrice);
            });

            // Remove new price fields dynamically
            $(document).on('click', '.remove-price', function() {
                $(this).closest('.price-item').remove();
            });

            $(document).on('click', '.delete-price', function() {
                let priceId = $(this).data('id');
                let priceItem = $(this).closest('.price-item');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/delete-price/' +
                                priceId, // Adjust the route as per your backend
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}' // Laravel CSRF protection
                            },
                            success: function(response) {
                                if (response.success) {
                                    priceItem.remove(); // Remove item from DOM
                                    Swal.fire("Deleted!", "The price has been removed.",
                                        "success");
                                } else {
                                    Swal.fire("Failed!", "Failed to delete the price.",
                                        "error");
                                }
                            },
                            error: function() {
                                Swal.fire("Error!",
                                    "An error occurred while deleting the price.",
                                    "error");
                            }
                        });
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.product-category').select2(); // Initialize Select2

            function fetchFilters(selectedCategories) {
                if (selectedCategories.length > 0) {
                    $.ajax({
                        url: "{{ route('fetch.filters') }}",
                        type: "POST",
                        data: {
                            categories: selectedCategories,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            $('#filter-options').html("");

                            if (response.length > 0) {
                                response.forEach(filter => {
                                    let filterHtml = `
                                        <div class="col-12">
                                            <h4>${filter.name}</h4>
                                        </div>`;

                                    filter.options.forEach(option => {
                                        let isChecked = @json($product->filters->pluck('filter_option_id')->toArray()).includes(option.id) ? 'checked' : '';

                                        filterHtml += `
                                        <div class="col-md-6"> 
                                            <div class="form-check"> 
                                                <input type="checkbox" class="form-check-input filter-option"
                                                    id="filter_${option.id}" 
                                                    name="filter_options[]"
                                                    value="${option.id}" 
                                                    data-category="${filter.category_id}"
                                                    data-filter="${filter.id}"
                                                    ${isChecked}>

                                                <label class="form-check-label" for="filter_${option.id}">
                                                    ${option.translations?.name ?? option.name ?? ''}
                                                </label>
                                            </div>
                                        </div>`;
                                    });

                                    $('#filter-options').append(filterHtml);
                                });
                            } else {
                                $('#filter-options').html("<p>No filters available.</p>");
                            }
                        }

                    });
                } else {
                    $('#filter-options').html(""); // Clear filters if no category is selected
                }
            }

            // **Trigger fetching filters when category changes**
            $('#product-category').on('change', function() {
                let selectedCategories = $(this).val();

                // Find removed categories and remove their filters from the UI
                $(".filter-group").each(function() {
                    let categoryId = $(this).data('category');
                    if (!selectedCategories.includes(categoryId.toString())) {
                        $(this).remove();
                    }
                });

                fetchFilters(selectedCategories);
            });

            // **Before form submission, capture selected filters**
            $("form").on("submit", function() {
                let selectedFilters = [];

                $('.filter-option:checked').each(function() {
                    selectedFilters.push({
                        category_id: $(this).data('category'),
                        filter_id: $(this).data('filter'),
                        filter_option_id: $(this).val()
                    });
                });

                $('#selected_filters').val(JSON.stringify(selectedFilters));
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function toggleFilterOptions() {
                let isEnglish = $("#product-category").prop("disabled") ===
                false; // Check if the category dropdown is enabled

                console.log("Is English?:", isEnglish); // Debugging

                $('.filter-option').prop('disabled', !isEnglish); // Enable/Disable checkboxes

                if (!isEnglish) {
                    console.log("Disabling filter checkboxes...");
                    $('.filter-item').css('pointer-events', 'none'); // Prevent clicking
                } else {
                    console.log("Enabling filter checkboxes...");
                    $('.filter-item').css('pointer-events', 'auto'); // Enable clicking
                }
            }

            // **Run on page load to apply settings immediately**
            toggleFilterOptions();

            // **Trigger when language changes (assuming language changes affect the product category dropdown)**
            $("#product-category").on("change", function() {
                toggleFilterOptions();
            });
        });
    </script>

@endsection
