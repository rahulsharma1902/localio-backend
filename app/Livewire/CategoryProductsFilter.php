<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoryTranslation;
use App\Models\CategoryProduct;
use App\Models\Product;


class CategoryProductsFilter extends Component
{

    public $cat_slug;

    public function mount($category)
    {
        $this->cat_slug = $category;
    }

    public function render()
    {

        $products=[];
        if ($this->cat_slug  != '') {
            $category_id  = CategoryTranslation::where('slug', $this->cat_slug )->value('category_id');
            $category_product_ids = CategoryProduct::where('category_id', $category_id)->pluck('product_id');
            $products = Product::with(['product_features' => function ($query) {
                $query->with('feature_translation')->where('feature_type', 'top_features');
            }])
                ->whereIn('id', $category_product_ids)
                ->get();

        } else {
            $products = Product::with(['product_features' => function ($query) {
                $query->with('feature_translation')->where('feature_type', 'top_features');
            }])
                ->get();
        }

        return view('livewire.category-products-filter', ['products'=>$products]);
    }
}
