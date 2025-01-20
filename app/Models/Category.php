<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image', 'status'];

    protected $lang_code, $lang_id;
    
    public function __construct()
    {
        $this->lang_id = session()->get('lang_id');
        $this->lang_code = session()->get('lang_code');
    }

    // Define the translations relationship
    public function translations()
    {
        $category=  $this->hasOne(CategoryTranslation::class, 'category_id', 'id')
        ->where('language_id',$this->lang_id ); 
        if(!$category){
            $category=  $this->hasOne(CategoryTranslation::class, 'category_id', 'id')
         ->where('language_id', 1); 

        }
        return $category; 
    }

    public function Gettranslations($lang_id)
    {
        $category=  $this->hasOne(CategoryTranslation::class, 'category_id', 'id')
        ->where('language_id',$this->lang_id ); 
        if(!$category){
            $category=  $this->hasOne(CategoryTranslation::class, 'category_id', 'id')
         ->where('language_id', 1); 

        }
        return $category; 
    }

    public function getNameAttribute()
    {
        // Fetch the translation based on the language_id
        $translation = $this->translations()->first();
        // Return the translated name if available, otherwise fallback to the default name
        return $translation ? $translation->name : $this->attributes['name'];
    }


    
}
