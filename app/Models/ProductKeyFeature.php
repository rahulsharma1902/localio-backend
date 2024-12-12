<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeyFeature extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'feature'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function translations()
    {
        return $this->hasMany(ProductKeyFeatureTranslation::class, 'product_key_id');
    }
}
