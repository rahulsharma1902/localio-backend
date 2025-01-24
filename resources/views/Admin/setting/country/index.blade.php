{{-- {{ dd($countries) }} --}}
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
                    <h3 class="nk-block-title page-title">Country</h3>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{ url('admin-dashboard/site-languages/add') ?? '' }}"
                                        class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                    <a href="{{ route('country.add') }}"
                                        class=" btn btn-primary d-none d-md-inline-flex btn-localio"><em
                                            class="icon ni ni-plus"></em><span>Add Country</span></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false"
                    id="CountryDataTable">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col"><span class="sub-text">CountryName</span></th>
                            <th class="nk-tb-col tb-tnx-action">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    <div class="user-card">
                                        <div class="user-info">
                                            <span class="tb-lead">{{ $country->name }}</span>

                                        </div>
                                    </div>
                                </td>

                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a
                                                                href="{{ url('admin-dashboard/country/update') ?? '' }}/{{ $country->id ?? '' }}">
                                                                <em class="icon ni ni-edit-fill"></em>
                                                                <span>Edit</span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('country.delete', ['id' => $country->id]) }}">
                                                                <em class="icon ni ni-trash-fill"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
            data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">New Category</h5>
                    <div class="nk-block-des">
                        <p>Add information and add new category</p>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Category Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="product-title">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <div class="form-control-wrap">
                                <textarea name="" class="description" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="image">Upload Icon</label>
                            <div class="dz-message">
                                <input type="file" class="form-control" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary form-control text-center btn-localio"><em
                                class="icon ni ni-plus"></em><span>Add
                                New Category</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('#CountryDataTable').DataTable({
        //         processing: true, 
        //         serverSide: true,
        //         ajax: {
        //             url: "{{ route('country.index') }}", 
        //             type: "GET"
        //         },
        //         columns: [
        //             { 
        //                 data: 'name', 
        //                 name: 'name' 
        //             },
        //             {
        //                 data: 'id', 
        //                 name: 'id',
        //                 render: function(data, type, row) {
        //                     return `
    //                         <ul class="nk-tb-actions gx-1">
    //                             <li>
    //                                 <div class="drodown">
    //                                     <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
    //                                         data-bs-toggle="dropdown">
    //                                         <em class="icon ni ni-more-h"></em>
    //                                     </a>
    //                                     <div class="dropdown-menu dropdown-menu-end">
    //                                         <ul class="link-list-opt no-bdr">
    //                                             <li>
    //                                                 <a href="/admin-dashboard/country/update/${data}">
    //                                                     <em class="icon ni ni-edit-fill"></em>
    //                                                     <span>Edit</span>
    //                                                 </a>
    //                                             </li>
    //                                             <li>
    //                                                 <a href="/country/delete/${data}">
    //                                                     <em class="icon ni ni-trash-fill"></em>
    //                                                     <span>Delete</span>
    //                                                 </a>
    //                                             </li>
    //                                         </ul>
    //                                     </div>
    //                                 </div>
    //                             </li>
    //                         </ul>
    //                     `;
        //                 }
        //             }
        //         ]
        //     });
        // });
    </script>
@endsection
