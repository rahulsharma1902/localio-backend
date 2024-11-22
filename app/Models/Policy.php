<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    public function translations()
    {
        return $this->hasMany(PolicyTranslation::class);
    }
    public function rule()
    {
        return $this->hasMany(Rule::class);
    }
   
}
