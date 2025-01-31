<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;

    protected $fillable = ['lang_id', 'type', 'status'];

    public function product_features_translation()
    {
        return   $this->hasManyThrough('product_features_translation', 'product_feture_id');
    }
}
