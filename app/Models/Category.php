<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image', 'status'];

    // Define the translations relationship
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}
