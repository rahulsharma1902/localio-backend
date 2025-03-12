<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'lang_id', 'rating', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function translations()
    {
        return $this->hasMany(ReviewTranslation::class, 'reviews_id');
    }
}
