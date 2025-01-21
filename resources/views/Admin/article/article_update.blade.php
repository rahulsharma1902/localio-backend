@extends('admin_layout.master')
@section('content')
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Update Article</h4>
            </div>
        </div>
        <?php
        $locale = getCurrentLocale();
        ?>

        <div class="card card-bordered">
            <div class="card-inner">
                <div class="nk-block">
                    <form action="{{ url('admin-dashboard/article/update') ?? '' }}" class="form-validate"
                        novalidate="novalidate" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Article Name</label>
                                    <input type="hidden" name="article_id" value="{{ $article->id ?? '' }}">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $articleTranslation->name ?? $article->name) }}">
                                    </div>
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if ($articleTranslation->language_id ?? '')
                                <input type="hidden" class="form-control" id="language_id" name="handle"
                                    value="{{ $articleTranslation->language->handle ?? '' }}" />
                            @else
                                <input type="hidden" class="form-control" id="language_id" name="handle"
                                    value="{{ Cookie::get('language_code', config('app.locale')) }}" />
                            @endif
                            <input type="hidden" name="article_tr_id" id="articleTrId"
                                value="{{ $articleTranslation->id ?? '' }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Article Categories</label>
                                    <div class="form-control-wrap">
                                        @if ($locale === 'en')
                                            <!-- If the current language is English -->
                                            <select class="form-select js-select2" name="category_id" data-search="on">
                                                <option disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <!-- If the current language is not English, show the old category -->
                                            <input type="text" class="form-control"
                                                value="{{ $article->articleCategory->name ?? 'No category' }}" readonly>
                                            <!-- <input type="hidden" name="category_id" value="{{ $article->category_id }}">  Hidden field to store category_id -->
                                        @endif
                                    </div>

                                    @error('category_id')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="description" name="description" id="description" rows="4" cols="50">{{ old('description', $articleTranslation->description ?? $article->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                @if ($locale === 'en')
                                    <div class="form-group">
                                        <label class="form-label" for="image">Upload Image</label>
                                        <div class="dz-message">
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                        @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                                @if (isset($article->image))
                                    <img src="{{ asset('ArticleImages/' . $article->image) }}" alt="{{ $article->name }}"
                                        style="width: 50px; height: auto;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <button class="addCategory btn btn-primary  text-center"><em
                                            class="icon ni ni-plus"></em><span>Add New Article</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <!-- <script>
        $(document).ready(function() {
            // Update the slug field based on the name field
            $('#name').on('input', function() {
                let name = $(this).val().toLowerCase();
                let slug = name.replace(/\s+/g, "-").replace(/\//g, "-");
                $('#slug').val(slug);
            });

            // Add dynamic option fields
            $('#add-option').click(function() {
                $('#options-container').append(`
            <div class="form-group row option-group mt-2">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <input type="text" name="options[]" class="form-control" placeholder="Enter option">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 d-flex align-items-center">
                    <button type="button" class="btn btn-danger remove-option"><em class="icon ni ni-trash-fill"></em></button>
                </div>
            </div>
        `);
            });

            // Remove option field, ensuring at least one remains
            $('#options-container').on('click', '.remove-option', function() {
                if ($('.option-group').length > 1) {
                    $(this).closest('.option-group').remove();
                }
            });
        });
    </script> -->
@endsection
