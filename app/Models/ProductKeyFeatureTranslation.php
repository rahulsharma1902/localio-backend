<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeyFeatureTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_key_id',
        'language_id',
        'feature',
        'status',
    ];

    public function productKeyFeature()
    {
        return $this->belongsTo(ProductKeyFeature::class, 'product_key_id');
    }
    public function language()
    {
        return $this->belongsTo(SiteLanguage::class, 'language_id');
    }
}
