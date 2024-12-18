<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterOption extends Model
{
    use HasFactory;
    protected $fillable = ['filter_id', 'name'];

    public function translations()
    {
        return $this->hasMany(FilterOptionTranslation::class);
    }
}
