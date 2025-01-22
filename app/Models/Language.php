<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['lang_code','name', 'iso_639-1'];

    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::class, 'language_id');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function policyTranslations()
    {
        return $this->hasMany(PolicyTranslation::class, 'language_id');
    }
    public function faqTranslations()
    {
        return $this->hasMany(FaqTranslation::class, 'language_id');
    }
}
