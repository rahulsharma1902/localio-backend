@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">{{ isset($product) ? 'Update Business' : 'Add Business' }}</h4>
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

                            <!-- Product Description -->
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="description" name="description" id="editor" rows="2" cols="70">{{ old('description', isset($productTranslation) ? $productTranslation->description : $product->description ?? '') }}</textarea>
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
                            <input type="hidden" class="form-control" id="language_id" name="lang_code"
                                value="{{ getCurrentLanguageID() }}" />
                        @endif
                        <input type="hidden" name="product_tr_id" value="{{ $productTranslation->id ?? '' }}">

                        <!-- New Input Fields -->
                        <div class="row g-3 mt-2">
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

                        </div>
                        <div id="selected-category-ids-container"></div>
                        <div id="selected-categories"></div>
                        <!-- Product Icon (File Input) -->
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4>Product Prices</h4>

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
                                                    </div>
                                                </div>

                                                <!-- Editable Price Input -->
                                                <div class="col-md-5 mb-3">
                                                    <label>Price:</label>
                                                    <input type="text" name="prices[]" value="{{ $price->price }}"
                                                        class="form-control">
                                                </div>

                                                <!-- Delete Button -->
                                                <div class="col-md-2 mb-3">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product-link">Link</label>
                                    <input type="url" class="form-control" name="product_link" id="product-link"
                                        value="{{ isset($product) ? $product->product_link : '' }}"
                                        placeholder="Business Link">
                                </div>
                                @error('product_link')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

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

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label class="form-label" for="description">Overview</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="overview" id="editor1" rows="2" cols="70">{{ old('overview', isset($productTranslation) ? $productTranslation->description : $product->overview ?? '') }}</textarea>
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
                                                <button type="button" class="btn btn-danger prose-option btn-localio"><em
                                                        class="icon ni ni-trash-fill"></em></button>
                                            </div>
                                        </div>
                                    @endforeach
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
                                                <button type="button" class="btn btn-danger conse-option btn-localio"><em
                                                        class="icon ni ni-trash-fill"></em></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="addCategory btn btn-primary text-center btn-localio"><em
                                        class=""></em><span>Update</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
@endsection
