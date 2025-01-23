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
    <?php
    $locale = getCurrentLocale();
    
    ?>
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Products</h3>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ url('admin-dashboard/product/add') ?? '' }}"
                                        class=" btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                    <a href="{{ url('admin-dashboard/product/add') ?? '' }}"
                                        class=" btn btn-primary d-none d-md-inline-flex"><em
                                            class="icon ni ni-plus"></em><span>Add Product</span></a>
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
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Description</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Product Category</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Product Price</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Product Icon</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Product Image</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Product link</span></th>
                            <th class="nk-tb-col"><span class="sub-text">Product key Features</span></th>
                            <th class="nk-tb-col tb-tnx-action">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    @if (isset($products) && $products->isNotEmpty())
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">
                                                    {{ $product->translations->isNotEmpty() ? $product->translations->first()->name : $product->name ?? 'not name found' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">
                                            {{ strip_tags($product->translations->isNotEmpty() ? $product->translations->first()->description : $product->description ?? '') }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">
                                            @if (isset($product->categories))
                                                @foreach ($product->categories as $category)
                                                    {{ isset($category->translations) ? $category->translations->firstWhere('language_id', getCurrentLanguageID())->name : $category->name ?? '' }}{{ !$loop->last ? ', ' : '' }}
                                                @endforeach
                                            @else
                                                not data found
                                            @endif
                                        </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">
                                            {{ formatInr($product->product_price ?? 0) }}
                                        </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">
                                            @if (isset($product->product_icon))
                                                <img src="{{ asset('ProductIcon/' . $product->product_icon) }}"
                                                    alt="{{ $product->name }}" style="width: 50px; height: auto;">
                                            @endif
                                        </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">
                                            @if (isset($product->product_image))
                                                <img src="{{ asset('ProductImage/' . $product->product_image) }}"
                                                    alt="{{ $product->name }}" style="width: 50px; height: auto;">
                                            @endif
                                        </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span class="tb-lead">
                                            <a href=" {{ $product->product_link ?? '' }} " target="blank">Product</a>

                                        </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <?php $count = 1; ?>
                                        <span class="tb-lead">
                                            @if ($product->keyFeatures->isNotEmpty())
                                                @foreach ($product->keyFeatures as $feature)
                                                    {{ $count++ }}

                                                    {{ $feature->translations->isNotEmpty() ? $feature->translations->first()->feature : $feature->feature ?? 'not feature found' }}
                                                @endforeach
                                            @else
                                                not data found
                                            @endif
                                        </span>
                                    </td>
                                    <td class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                        data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a
                                                                    href="{{ url('admin-dashboard/product-edit') ?? '' }}/{{ $product->id ?? '' }}"><em
                                                                        class="icon ni ni-edit-fill"></em><span>Edit</span></a>
                                                            </li>
                                                            @if ($locale == 'en')
                                                                <li><a
                                                                        href="{{ url('admin-dashboard/remove-product') ?? '' }}/{{ $product->id ?? '' }}"><em
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
    </div>
@endsection
