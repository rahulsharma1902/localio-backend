@extends('admin_layout.master')
@section('content')
    <style>
        .ck.ck-content {
            min-height: 10rem;
        }

        .nk-add-product.toggle-slide.toggle-slide-right.toggle-screen-any.content-active {
            width: 40%;
        }
    </style>

    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">
                    Update Category
                    @if ($category)
                        @if ($category->language_id ?? '')
                            - <span>{{ $category->language->name ?? '' }}</span>
                        @endif
                    @else
                        - <span>{{ Cookie::get('language_code', config('app.locale')) }}</span>
                    @endif
                </h4>
            </div>
            <div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ url('admin-dashboard/update-category/updateProcc') }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id ?? '' }}" id="id">
                    <div class="row g-gs">
                        <!-- Name Field -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <sup>
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </sup>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') ?? ($category->name ?? ($defaultCategory->name ?? '')) }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Slug Field (Hidden) -->
                        <input type="hidden" class="form-control" id="slug" name="slug"
                            value="{{ old('slug', $category->slug ?? '') }}" />
                        @if ($category->language_id ?? '')
                            <input type="hidden" class="form-control" id="language_id" name="handle"
                                value="{{ $category->language->handle ?? '' }}" />
                        @else
                            <input type="hidden" class="form-control" id="handle" name="handle"
                                value="{{ Cookie::get('language_code', config('app.locale')) }}" />
                        @endif
                        <input type="hidden" name="category_id" id="category_id" value="{{ $defaultCategory->id ?? '' }}">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="description" id="description">{{ old('description') ?? ($category->description ?? ($defaultCategory->description ?? '')) }}</textarea>
                                </div>
                                @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- @if ($category)
                            @if (!$category->getAttributes() || !array_key_exists('category_id', $category->getAttributes())) --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="image">Upload Image</label>
                                <div class="dz-message">
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- @endif
                        @endif --}}
                        @if ($category)
                            @if ($category->image)
                                {{ $category->language->name ?? '' }}
                                <img src="{{ asset('CategoryImages') ?? '' }}/{{ $category->image ?? '' }}" alt=""
                                    style="width: 100px; height: 50px; border-radius: 5px";>
                            @else
                                <img src="{{ asset('CategoryImages') ?? '' }}/{{ $category->category->image ?? '' }}"
                                    alt=""style="width: 50px; height: 50px; border-radius: 5px" ;>
                            @endif
                        @endif

                        {{-- @if ($category)
                            @if (!$category->getAttributes() || !array_key_exists('category_id', $category->getAttributes())) --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="image">Upload Icon</label>
                                <div class="dz-message">
                                    <input type="file" class="form-control" name="category_icon" id="categoryIcon">
                                </div>
                                @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{-- @endif
                        @endif --}}
                        @if ($defaultCategory)
                            @if ($defaultCategory->category_icon)
                                <img src="{{ asset('CategoryIcon') ?? '' }}/{{ $defaultCategory->category_icon ?? '' }}"
                                    alt="not image found" style="width: 50px; height: 50px; border-radius: 5px";>
                            @endif
                        @endif
                        <!-- Submit Button -->
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary btn-localio">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $(document).ready(function() {
            // Update the slug field based on the name field
            $('#name').on('input', function() {
                let name = $(this).val().toLowerCase();
                let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
                $('#slug').val(slug);
            });

            // Slug input: sanitize spaces and slashes
            $('#slug').on('change', function() {
                this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
            });

            // Handle input: Allow only alphanumeric characters and dashes
            $('#handle').on('input', function() {
                var value = $(this).val();
                var validValue = value.replace(/[^a-zA-Z0-9-]/g, ''); // Allow only alphanumeric and dash
                $(this).val(validValue);
            });
        });
    </script>
@endsection
