<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeatureTransalte;

class Feature extends Model
{
    use HasFactory;
    protected $table = 'features';

    protected $fillable = ['lang_id', 'type', 'status'];

    public function feature_translation()
    {
        return  $this->hasOne(FeatureTransalte::class,'feature_id');
    }
    public function features()
{
    return $this->belongsToMany(Feature::class, 'product_features', 'product_id', 'feature_id');
}
}
