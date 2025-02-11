@extends('admin_layout.master')
@section('content')
    <style>
        .ck.ck-content {
            min-height: 6rem !important;
        }

        .nk-add-product.toggle-slide.toggle-slide-right.toggle-screen-any.content-active {
            width: 40%;
        }
    </style>

    <div class="nk-block nk-block-lg">
        <div class="nk-block-head d-flex justify-content-between">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">
                    Add Category
                </h4>
            </div>
            <div>
            </div>
        </div>
        <div class="card card-bordered">
            <div class="card-inner">
                <form action="{{ route('add-category-process') }}" class="form-validate" novalidate="novalidate" method="post"
                    enctype="multipart/form-data">
                    @csrf
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
                                        value="{{ old('name') }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Slug Field (Hidden) -->
                        <input type="hidden" class="form-control" id="slug" name="slug"
                            value="{{ old('slug') }}" />

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="description" id="description" rows="2" cols="20">sdgsdg</textarea>
                                </div>
                                @error('description')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="image">Upload Image</label>
                                <div class="dz-message">
                                    <input type="file" class="form-control" name="image" id="image" />
                                </div>
                                @error('image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                        <!-- Submit Button -->
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary btn-localio">Add Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
       


        ClassicEditor
            .create(document.querySelector('#description'), {
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
@endsection
