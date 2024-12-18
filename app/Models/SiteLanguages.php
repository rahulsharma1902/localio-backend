<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteLanguages extends Model
{
    use HasFactory;
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }
    public function policyTranslations()
    {
        return $this->hasMany(PolicyTranslation::class, 'language_id');
    }
    public function faqTranslations()
    {
        return $this->hasMany(FaqTranslation::class, 'language_id');
    }
<<<<<<< HEAD
    public function productTranslations()
    {
        return $this->hasMany(ProductTranslation::class, 'language_id');
    }

    /**
     * Relationship with ProductKeyFeatureTranslation
     */
    public function productKeyFeatureTranslations()
    {
        return $this->hasMany(ProductKeyFeatureTranslation::class, 'language_id');
    }
=======
>>>>>>> bd80246073b518778a92f0d8612fd5aedcb42df5
        
}
