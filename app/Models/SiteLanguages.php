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
        
}
