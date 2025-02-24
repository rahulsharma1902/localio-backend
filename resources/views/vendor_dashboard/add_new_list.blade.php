@extends('vendor_dashboard_layout.master')
@section('content')
<div class="col-lg-9 p-0">
    <div class="user_content">
       <div class="new-listing">
        <h1>Add New Listing</h1>
        <div class="new-form">
            <form action="">
                <div class="form-block">
                    <label for="product-name">Product name</label>
                    <input type="text" id="product-name" name="product-name" placeholder="Add here">
                </div>
                <div class="form-block">
                    <label for="product-category">Product Category</label>
                    <input type="text" id="product-category" name="product-category" placeholder="Add here">
                </div>
                <div class="form-block">
                    <label for="Website-url">Website URL</label>
                    <input type="text" id="Website-url" name="Website-url" placeholder="Add here">
                </div>
            </form>
        </div>

        <div class="new-btn">
            <a href="javascript:void(0)" class="btn unq_btn">Create Listing</a>
        </div>
       </div>
    </div>
</div>
@endsection
