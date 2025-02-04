{{-- {{ dd($categories) }} --}}
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
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Categories</h3>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">

                                <li class="nk-block-tools-opt">
                                    <a href="#" data-target="addProduct"
                                        class="toggle btn btn-icon btn-primary d-md-none"><em
                                            class="icon ni ni-plus"></em></a>
                                    <a href="#" data-target="addProduct"
                                        class="toggle btn btn-primary d-none d-md-inline-flex btn-localio"><em
                                            class="icon ni ni-plus"></em><span>Add Categories</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    @if ($categories->isEmpty())
                        <div class="text-center">
                            <button class="btn btn-primary btn-localio">No data found</button>
                        </div>
                    @else
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <!-- <th class="nk-tb-col">Sno.</th> -->
                                <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                <th class="nk-tb-col"><span class="sub-text">Description</span></th>
                                <!-- <th class="nk-tb-col"><span class="sub-text">Status</span></th> -->
                                <th class="nk-tb-col tb-tnx-action">
                                    <span>Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="nk-tb-item">


                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">{{ $category->name ?? '' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-amount">
                                            {!! $category->description ?? '' !!}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end edit-btn"
                                                        style="height: 59px !important;">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a
                                                                    href="{{ url('admin-dashboard/update-category') ?? '' }}/{{ $category->category_id ?? '' }}"><em
                                                                        class="icon ni ni-edit-fill"></em><span>Edit</span></a>
                                                            </li>

                                                            @if ($category)
                                                                <li class="removeConfermation"
                                                                    data-url="{{ url('admin-dashboard/remove-category') ?? '' }}/{{ $category->category_id ?? '' }}">
                                                                    <a class="delete"
                                                                        href="{{ url('admin-dashboard/remove-category') ?? '' }}/{{ $category->category_id ?? '' }}"><em
                                                                            class="icon ni ni-trash-fill"></em><span>Remove</span></a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>

        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
            data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">New Category</h5>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <form action="{{ url('admin-dashboard/categories/add') ?? '' }}" class="form-validate"
                    novalidate="novalidate" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="name">Category Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                @error('name')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="hidden" class="form-control" name="slug" id="slug">
                                </div>
                                @error('slug')
                                    <!-- <div class="error text-danger">{{ $message }}</div> -->
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="description" name="description" id="description"></textarea>
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
                                    <input type="file" class="form-control" name="image" id="image">
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
                        <div class="col-12">
                            <button class="addCategory btn btn-primary form-control text-center"><em
                                    class="icon ni ni-plus"></em><span>Add New Category</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#name').on('input', function() {
                let name = $(this).val().toLowerCase();
                let slug = name.replace(/\s+/g, "-");
                slug = slug.replace(/\//g, "-");
                $('#slug').val(slug);
            });
            $('#slug').on('change', function() {
                this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/\//g, '-');
            });
        });
    </script>

@endsection
