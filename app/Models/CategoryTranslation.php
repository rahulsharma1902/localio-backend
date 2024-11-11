<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    public function language()
    {
        return $this->hasOne(SiteLanguages::class, 'id', 'language_id');
    }
    public function category(){
        return $this->hasOne(Country::class,'id','category_id');
    }
}
