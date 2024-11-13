<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;
    public function translations()
    {
        return $this->hasMany(FilterTranslation::class);
    }
    public function options(){
        return $this->hasMany(FilterOption::class);
    }
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
