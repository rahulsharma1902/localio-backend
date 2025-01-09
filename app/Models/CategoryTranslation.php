<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'language_id', 'name', 'description', 'slug'];

 
    // public function category(){
    //     return $this->hasOne(Country::class,'id','category_id');
    // }

    // Define the category relationship
    // public function categoryData()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->hasOne(Language::class, 'id',);
    }
}