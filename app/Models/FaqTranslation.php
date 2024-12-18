<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    use HasFactory;
<<<<<<< HEAD

=======
>>>>>>> bd80246073b518778a92f0d8612fd5aedcb42df5
    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }

    // Define the relationship with the language
    public function language()
    {
        return $this->belongsTo(SiteLanguages::class,);
    }
<<<<<<< HEAD
  
=======
>>>>>>> bd80246073b518778a92f0d8612fd5aedcb42df5
}
