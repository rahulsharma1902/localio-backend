<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeatureTransalte;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;

class Product extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products', 'product_id');
    }
    public function translations()
    {
        return $this->hasOne(ProductTranslation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function product_features()
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'product_features', 'product_id', 'feature_id');
    }


    public function getProductIconAttribute($mediaId)
    {
        $media = Media::find($mediaId);

        if ($media) {
            return Storage::disk('public')->url($media->dir_path . '/' . $media->file_name);
        }
    }

    public function getProductImageAttribute($mediaId)
    {
        $media = Media::find($mediaId);

        if ($media) {
            return Storage::disk('public')->url($media->dir_path . '/' . $media->file_name);
        }

    }
    public function prices()
    {
        return $this->hasMany(Price::class);
    }

}
