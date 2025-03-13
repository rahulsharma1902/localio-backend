@extends('admin_layout.master')
@section('content')


    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Add Business</h4>
            </div>
        </div>
        <?php $lang = getCurrentLocale(); ?>


        <form action="{{ url('admin-dashboard/product-add-procc') }}" class="form-validate" novalidate="novalidate"
            method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="nk-block">
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Business Name</label>
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Business Name" value="">
                                            </div>
                                        </div>
                                        {{-- @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif --}}

                                        @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="product-link">Affiliate Link</label>
                                        <input type="url" class="form-control" name="product_link" id="product-link"
                                            value="{{ old('product_link') }}" placeholder="Affiliate Link">
                                    </div>
                                    @error('product_link')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Product Description -->
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Business Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="description" id="description" name="description" rows="2" cols="70"></textarea>

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

                            <!-- New Input Fields -->
                            <div class="row g-3 mt-2">
                                @if (!isset($product))
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="product-category">Business Category</label>
                                            <select class="form-control product-category" id="product-category"
                                                name="product_category[]" multiple="multiple">
                                                @if ($categories->isNotEmpty())
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('product_category')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                                @if (isset($product))
                                    <div class="col-md-12">
                                        @if ($lang == 'en-us')
                                            <div class="form-group">
                                                <label class="form-label" for="product-category">Business Category</label>
                                                <select class="form-control product-category select2-hidden-accessible"
                                                    name="product_category[]" multiple="" data-select2-id="1"
                                                    tabindex="-1" aria-hidden="true"
                                                    style="width: 100% !important; padding-right: 40px !important;">
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
                                        @elseif($lang !== 'en-us')
                                            <div class="form-group">
                                                <label class="form-label" for="product-category">Business Category</label>
                                                <input type="text" class="form-control" name="product_category_display"
                                                    id="product-category-display"
                                                    value="{{ isset($product->categories)
                                                        ? $product->categories->map(function ($category) use ($siteLanguage) {
                                                                $translation = $category->translations->firstWhere('language_id', $siteLanguage->id);
                                                                return $translation ? $translation->name : $category->name;
                                                            })->join(', ')
                                                        : $product->categories->pluck('name')->join(', ') }}"
                                                    readonly>

                                                <input type="hidden" name="product_category[]" id="product-category"
                                                    value="{{ implode(',', $product->categories->pluck('id')->toArray()) }}">
                                            </div>
                                        @endif
                                    </div>

                                @endif

                            </div>
                            <div id="filter-options">


                            </div>
                            <input type="hidden" id="selected_filters" name="selected_filters">
                            <div id="selected-category-ids-container"></div>
                            <div id="selected-categories"></div>
                            <br>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Business Prices</label>
                                    <div id="price-container">
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" name="prices[]"
                                                placeholder="Enter Price" required>
                                            <select class="form-select" name="tenures[]">
                                                <option value="Starting Price">Starting Price</option>
                                                <option value="Standard Price">Standard Price</option>
                                                <option value="Pro">Pro</option>
                                            </select>
                                            <button type="button" class="btn btn-danger remove-price">X</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" id="add-price">+ Add More
                                        Price</button>
                                </div>
                            </div> -->

                            <h4>Business Prices</h4>
                            <!-- price -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="base_price">Base Price ($)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="base_price" id="base_price"
                                            placeholder="Enter Base Price"
                                            value="{{ old('base_price') }}" />
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
                                            value="{{ old('standard_price') }}" />
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
                                            value="{{ old('pro_price') }}" />
                                    </div>
                                    @error('pro_price')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- price end here -->




                            <div class="row mt-3">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="product-icon">Business Icon</label>
                                        @if (!isset($product) || $lang == 'en-us')
                                            <input type="file" class="form-control" name="product_icon"
                                                id="product-icon">
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
                                        <label class="form-label" for="product-image">Business Image</label>
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
                            <div class="row mt-3">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="product-category">Business Feature</label>
                                        <select class="form-control product-feature" name="product_feature[]"
                                            multiple="multiple">
                                            @foreach ($product_feature as $key => $item)
                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                            {{-- overview data --}}
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="description">Business Overview</label>
                                    <div class="form-control-wrap">
                                        <textarea class="description" id="overview" name="overview" rows="2" cols="70"></textarea>

                                        @error('overview')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            {{-- add cons and pross --}}
                            <div class="row">
                                <div class="removeproncondata-container"></div>

                                    
                                    {{-- Pros Section --}}
                                    <div class="col-md-12 mt-4">
                                        <div class="card border">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4>Pros</h4>
                                                    <button type="button" class="btn btn-success add-pros">Add</button>
                                            </div>
                                            <div class="card-body pros-container">
                                                
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Cons Section --}}
                                    <div class="col-md-12 mt-4">
                                        <div class="card border">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4>Cons</h4>
                                                    <button type="button" class="btn btn-success add-cons">Add</button>
                                            </div>
                                            <div class="card-body cons-container">
                                                
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
                                                        id="save-button"></em><span>Save Business</span></button>

                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="form-label d-block text-left">Business Status</label>
                                                    <div class="d-flex align-items-center justify-content-left">
                                                        <!-- Private Label -->
                                                        <label class="mb-0 mr-3"><b>Private</b></label>

                                                        <!-- Toggle Switch -->
                                                        <div class="custom-control custom-switch">
                                                            <!-- Hidden input to send 'private' when unchecked -->
                                                            <input type="hidden" name="status" value="private">

                                                            <input type="checkbox" class="custom-control-input" id="businessStatusSwitch"
                                                                name="status" value="public">
                                                            <label class="custom-control-label" for="businessStatusSwitch"></label>
                                                        </div>

                                                        <!-- Public Label -->
                                                        <label class="ml-3 mb-0"><b>Public</b></label>
                                                    </div>
                                                </div>
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
        $(document).ready(function () {
            const switchInput = $("#customSwitch");
            const hiddenInput = $("#statusHidden");

            // Set initial checkbox state based on the hidden input
            switchInput.prop("checked", hiddenInput.val() === "public");

            // Update hidden input when the switch is toggled
            switchInput.on("change", function () {
                hiddenInput.val(this.checked ? "public" : "private");
            });
        });
    </script>
    <script>
    
        $(document).ready(function() {
            $('.product-category').select2({
                placeholder: "Select Business Category"
            });

            $('.product-feature').select2({
                placeholder: "Select Business Feature"
            });
        });
    </script>
    <script>
    $(document).ready(function () {
        let prosCount = $(".pros-group").length;
        let consCount = $(".cons-group").length;

        const prosTemplate = (index) => `
            <div class="row pros-group mt-2">
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
            $(this).closest(".row").remove();
        });
    });
</script>

    <script>
        document.getElementById('add-price').addEventListener('click', function() {
            let container = document.getElementById('price-container');
            let newPrice = document.createElement('div');
            newPrice.classList.add('input-group', 'mb-2');
            newPrice.innerHTML = `
        <input type="number" class="form-control" name="prices[]" placeholder="Enter Price" required>
        <select class="form-select" name="tenures[]">
             <option value="Starting Price">Starting Price</option>
                                                <option value="Standard Price">Standard Price</option>
                                                <option value="Pro">Pro</option>
        </select>
        <button type="button" class="btn btn-danger remove-price">X</button>
    `;
            container.appendChild(newPrice);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-price')) {
                e.target.parentElement.remove();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.product-category').select2();

            $('#product-category').on('change', function() {
                let selectedCategories = $(this).val();

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
                                    let filterHtml =
                                        `<div class="filter-group"><h4>${filter.name}</h4><ul class="filter-list">`;
                                    filter.options.forEach(option => {
                                        filterHtml += `
                                            <li>
                                                <input type="checkbox" class="filter-option"
                                                    name="filter_options[]"
                                                    value="${option.id}"
                                                    data-category="${filter.category_id}"
                                                    data-filter="${filter.id}">
                                                <label>${option.name}</label>
                                            </li>`;
                                    });
                                    filterHtml += `</ul></div>`;
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
            });

            // **Ensure selected_filters is set before form submission**
            $("form").on("submit", function() {
                let selectedFilters = [];

                $('.filter-option:checked').each(function() {
                    selectedFilters.push({
                        category_id: $(this).data('category'),
                        filter_id: $(this).data('filter'),
                        filter_option_id: $(this).val()
                    });
                });

                console.log("Final Selected Filters:", selectedFilters); // Debugging

                // **Ensure the hidden input is set correctly**
                $('#selected_filters').val(JSON.stringify(selectedFilters));
            });
        });
    </script>

@endsection
