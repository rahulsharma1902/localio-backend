<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeatureTranslate extends Model
{
    protected $table = 'product_features_translation';

    protected $fillable = [
        'name',
        'product_feture_id',
        'status'
    ];
    use HasFactory;
}
