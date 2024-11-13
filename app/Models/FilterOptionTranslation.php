<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterOptionTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['filter_option_id', 'language_id', 'name'];

}
