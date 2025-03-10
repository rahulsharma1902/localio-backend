@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">{{ isset($product) ? 'Update Business' : 'Add Business' }}</h4>
            </div>
        </div>
        <?php $lang = getCurrentLocale(); ?>

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
                                                    value="{{ old('name', isset($productTranslation) ? $productTranslation->name : $product->name ?? '') }}">
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
                                        <input class="form-control" type="url" class="form-control" name="product_link" id="product-link"
                                        {{-- value="{{ isset($productTranslation) ? $productTranslation->product_link : (isset($product) ? $product->product_link : '') }}"  placeholder="Business Link"> --}}
                                        value="{{ old('product_link') !== null ? old('product_link') : ($productTranslation->product_link ?? $product->product_link ?? '') }}">
                                        {{-- {{ dd(old('product_link'), $productTranslation->product_link ?? null, $product->product_link ?? null) }} --}}

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
                                            <textarea class="description" name="description" id="description" rows="2" cols="70">{{ old('description', isset($productTranslation) ? $productTranslation->description : $product->description ?? '') }}</textarea>
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
                            {{-- <div class="row g-3 mt-2">
                            @if (!isset($product))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product-category">Category</label>
                                        <select class="form-control product-category" name="product_category[]"
                                            multiple="multiple">
                                            @foreach ($cat_arr as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['item'] }}</option>
                                            @endforeach
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
                                            <label class="form-label" for="product-category">Category</label>
                                            <select class="form-control product-category" name="product_category[]"
                                                multiple="multiple">
                                                @if ($categories->isNotEmpty())
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (in_array($category->id, array_column($cat_arr, 'id'))) selected="selected" @endif>
                                                            {{ $category->name ?? '' }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        @error('product_category')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                            @endif


                              </div> --}}
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Business Category</label>
                                        <select  class="form-control product-category filter-item filter-option"
                                            id="product-category" name="product_category[]" multiple disabled>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($product->categories->contains($category->id)) selected @endif>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product-category')
                                        <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div id="filter-options">
                                @foreach ($filters as $filter)
                                    <h4>{{ $filter->name }}</h4>
                                    <ul class="filter-list">
                                        @foreach ($filter->filterOptions as $option)
                                            <li class="filter-item"> <!-- Clickable area -->
                                                <input type="checkbox" class="filter-option"
                                                    id="filter_{{ $option->id }}" name="filter_options[]"
                                                    value="{{ $option->id }}" data-category="{{ $filter->category_id }}"
                                                    data-filter="{{ $filter->id }}"
                                                    @if (in_array($option->id, $selectedFilterOptions)) checked @endif>


                                                <label for="filter_{{ $option->id }}">{{ $option->name }}</label>
                                                @error('filter_options')
                                                <div class="error text-danger">{{ $message }}</div>
                                                @enderror
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>



                            <input type="hidden" id="selected_filters" name="selected_filters">

                            <div id="selected-category-ids-container"></div>
                            <div id="selected-categories"></div>
                            <!-- Product Icon (File Input) -->
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4>Business Prices</h4>

                                    <div class="row" id="price-container">
                                        @foreach ($product->prices as $price)
                                            <div class="col-md-12 price-item" data-id="{{ $price->id }}">
                                                <!-- Hidden Input for Price ID -->
                                                <input type="hidden" name="price_ids[]" value="{{ $price->id }}">

                                                <div class="row">
                                                    <!-- Dropdown for Tenure Selection -->
                                                    <div class="col-md-5 mb-3">
                                                        <label>Tenure:</label>
                                                        <div class="input-group">
                                                            <select name="tenures[]" class="form-control">
                                                                <option value="{{ $price->tenure }}" selected>
                                                                    {{ ucfirst($price->tenure) }}</option>
                                                                <option value="Starting Price">Starting Price</option>
                                                                <option value="Standard Price">Standard Price</option>
                                                                <option value="Pro">Pro</option>
                                                            </select>
                                                            @error('tenures')
                                                            <div class="error text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Editable Price Input -->
                                                    <div class="col-md-5 mb-3">
                                                        <label>Price:</label>
                                                        <input type="text" name="prices[]" value="{{ $price->price }}"
                                                            class="form-control">
                                                    </div>

                                                    <!-- Delete Button -->
                                                    <div class="col-md-2 mb-3 mt-4">
                                                        <button type="button" class="btn btn-danger delete-price"
                                                            data-id="{{ $price->id }}"> <i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product-icon">Icon</label>
                                        @if (!isset($product) || $lang == 'en-us')
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
                                        @if (!isset($product) || $lang == 'en-us')
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


                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label" for="product-feature">Business Feature</label>
                                        <select class="form-control product-feature" name="product_feature[]"
                                            multiple="multiple">
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
                                        <textarea class="description" name="overview" id="overview" rows="2" cols="70">{{ old('overview', isset($productTranslation) ? $productTranslation->overview : $product->overview ?? '') }}</textarea>
                                        @error('overview')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4 mt-5">
                                <div class="card border">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>
                                            Add Pros Data
                                        </h4>
                                        <p class="btn btn-success btn-localio" id="prose-option">Add data</button>
                                    </div>
                                    <div class="card-body prose-body">
                                        @foreach ($proconse_data as $value)
                                            <div class="form-group row prose-option mt-2">
                                                <div class="col-lg-10 col-md-10 col-sm-10">
                                                    <input type="text" name="pross_data[]" class="form-control"
                                                        placeholder="Enter option" style="border: 1px solid #7c88aa; "
                                                        value="{{ $value['name'] }}">
                                                </div>
                                                <div class="col-lg-2 col-md-2   col-sm-2 d-flex align-items-center">
                                                    <button type="button"
                                                        class="btn btn-danger prose-option btn-localio"><em
                                                            class="icon ni ni-trash-fill"></em></button>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('pross_data')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mt-4 mt-5">
                                <div class="card border">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>
                                            Add Cons Data
                                        </h4>
                                        <p class="btn btn-success btn-localio" id="conse-option">Add data</button>
                                    </div>
                                    <div class="card-body conse-data">
                                        @foreach ($cronse_data as $value)
                                            <div class="form-group row conse-group mt-2">
                                                <div class="col-lg-10 col-md-10 col-sm-10">
                                                    <input type="text" name="conse_data[]" class="form-control"
                                                        placeholder="Enter option"
                                                        style="border: 1px solid #7c88aa; "value="{{ $value['name'] }}">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                                                    <button type="button"
                                                        class="btn btn-danger conse-option btn-localio"><em
                                                            class="icon ni ni-trash-fill"></em></button>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('conse_data')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
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
                                                            <button
                                                                class="addCategory btn btn-primary text-center btn-localio"><em
                                                                    class=""
                                                                    id="update-button"></em><span>Update</span></button>

                                                        </div>
                                                        <div class="card-body col-md-12 mt-1 d-flex justify-content-left">
                                                            <div class="form-group">
                                                                <label class="form-label d-block text-left">Business Status</label>
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <!-- Private Label -->
                                                                    <label class="mb-0" style="margin-right: 15px;"><b>Private</b></label>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="customSwitch" {{ $status == 'public' ? 'checked' : '' }}>
                                                                        <label class="custom-control-label" for="customSwitch"></label>
                                                                    </div>
                                                                    <!-- Public Label -->
                                                                    <label class="ml-3 mb-0"><b>Public</b></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('status')
                                                        <div class="error text-danger">{{ $message }}</div>
                                                    @enderror
                                                        <!-- Hidden Input to Store Status Value -->
                                                        <input type="hidden" name="status" id="statusHidden" value="{{ $status ?? 'private' }}">


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

            // Set initial state based on database value
            switchInput.prop("checked", hiddenInput.val() === "public");

            // Update hidden input value when switch is toggled
            switchInput.on("change", function () {
                hiddenInput.val(this.checked ? "public" : "private");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add dynamic option fields
            $('#prose-option').click(function() {
                $('.prose-body').append(`
                <div class="form-group row prose-option mt-2">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <input type="text" name="pross_data[]" class="form-control" placeholder="Enter option" style="border: 1px solid #7c88aa; ">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                        <button type="button" class="btn btn-danger prose-option"><em class="icon ni ni-trash-fill"></em></button>
                    </div>
                </div>
            `);
            });
            // Remove option field, ensuring at least one remains

            $('.prose-body').on('click', '.prose-option', function() {
                $(this).parents('.prose-option').remove();
            });



            // conse
            $('#conse-option').click(function() {
                $('.conse-data').append(`
                <div class="form-group row conse-group mt-2">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <input type="text" name="conse_data[]" class="form-control" placeholder="Enter option" style="border: 1px solid #7c88aa; ">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                        <button type="button" class="btn btn-danger conse-option"><em class="icon ni ni-trash-fill"></em></button>
                    </div>
                </div>
            `);
            });
            // Remove option field, ensuring at least one remains
            $('.conse-data').on('click ', '.conse-option ', function() {
                $(this).parents('.conse-group').remove();
            });
        });

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
                            console.log("Filters Response:", response); // Debugging

                            $('#filter-options').html("");

                            if (response.length > 0) {
                                response.forEach(filter => {
                                    console.log("Filter Data:", filter); // Debugging

                                    let filterHtml = `<div class="filter-group" data-category="${filter.category_id}">
                                    <h4>${filter.name}</h4>
                                    <ul class="filter-list">`;

                                    filter.options.forEach(option => {
                                        console.log("Filter Option:",
                                            option); // Debugging

                                        let isChecked = @json($product->filters->pluck('filter_option_id')->toArray())
                                            .includes(option.id) ? 'checked' : '';

                                        filterHtml += `
                                        <li>
                                            <input type="checkbox" class="filter-option"
                                                name="filter_options[]"
                                                value="${option.id}"
                                                data-category="${filter.category_id}"
                                                data-filter="${filter.id}"
                                                ${isChecked}>
                                            <label>${option.name}</label>
                                        </li>`;
                                    });

                                    filterHtml += `</ul></div>`;
                                    $('#filter-options').append(filterHtml);
                                });

                                // **Click on filter option (label or list item) to check/uncheck the checkbox**
                                $(document).on("click", ".filter-item", function(e) {
                                    let checkbox = $(this).find(".filter-option");

                                    if (!$(e.target).is(
                                            "input"
                                        )) { // Prevent toggling when clicking directly on checkbox
                                        checkbox.prop("checked", !checkbox.prop("checked"))
                                            .trigger("change");
                                    }
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

@endsection
