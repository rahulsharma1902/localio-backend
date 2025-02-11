@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Add Product</h4>
            </div>
        </div>
        <?php $lang = getCurrentLocale(); ?>
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="nk-block">
                    <form action="{{ url('admin-dashboard/product-add-procc') }}" class="form-validate" novalidate="novalidate"
                        method="post" enctype="multipart/form-data">
                        @csrf

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
                                        <textarea class="description" name="description" id="editor1" rows="2" cols="70">{{ old('description', isset($productTranslation) ? $productTranslation->description : $product->description ?? '') }}</textarea>
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
                                        <label class="form-label" for="product-category">Product Category</label>
                                        <select class="form-control product-category" name="product_category[]"
                                            multiple="multiple">
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
                                <div class="col-md-6">
                                    @if ($lang == 'en-us')
                                        <div class="form-group">
                                            <label class="form-label" for="product-category">Product Category</label>
                                            <select class="form-control product-category" name="product_category[]"
                                                multiple="multiple">
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
                                            <label class="form-label" for="product-category">Product Category</label>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product-price">Product Price</label>
                                    <input type="text" class="form-control" name="product_price" id="product-price"
                                        min="1" value="{{ old('product_price') }}" placeholder="Product Price">
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
                        <div class="row mt-3">

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="product-link">Product Link</label>
                                    <input type="url" class="form-control" name="product_link" id="product-link"
                                        value="{{ old('product_link') }}" placeholder="Product Link">
                                </div>
                                @error('product_link')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="product-category">Product Feature</label>
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
                                <label class="form-label" for="description">Product Overview</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="overview" id="editor" rows="2" cols="70">{{ old('description', isset($productTranslation) ? $productTranslation->description : $product->description ?? '') }}</textarea>
                                    @error('overview')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        {{-- add cons and pross --}}
                        <div class="col-md-12 mt-4">
                            <div class="card border">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>
                                        Add Pros Data
                                    </h4>
                                    <p class="btn btn-success" id="prose-option">Add data</button>
                                </div>
                                <div class="card-body prose-body">

                                    {{-- prose add --}}
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mt-4">
                            <div class="card border">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>
                                        Add Cons Data
                                    </h4>
                                    <p class="btn btn-success" id="conse-option">Add data</button>
                                </div>
                                <div class="card-body conse-data">

                                    {{-- conse add --}}
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <button class="addCategory btn btn-primary text-center btn-localio"><em
                                        class="icon ni ni-plus"></em><span>{{ isset($product) ? 'Update Product' : 'Add Product' }}</span></button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // add ck editor
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



        // add data

        $(document).ready(function() {
            // Add dynamic option fields
            $('#prose-option').click(function() {
                $('.prose-body').append(`
                <div class="form-group row prose-option mt-2">
                    <div class="col-lg-10 col-md-10 col-sm-10">
                        <input type="text" name="pros_data[]" class="form-control" placeholder="Enter option" style="border: 1px solid #7c88aa; ">
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
    </script>
@endsection
