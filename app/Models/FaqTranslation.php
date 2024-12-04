<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    use HasFactory;
    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }

    // Define the relationship with the language
    public function language()
    {
        return $this->belongsTo(SiteLanguages::class,);
    }
}
