<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function productDetail(){
        return view('User.product.product_detail');
    }
    public function topRatedProduct()
    {
        return view('User.product.top_rated_product');
    }
    public function productComparison()
    {
        return view('User.product.product_comparison');
    }
}
