<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureTransalte extends Model
{
    protected $table = 'feature_translation';

    protected $fillable = [
        'name',
        'product_id',
        'feature_id',
        'status'
    ];


    use HasFactory;
}
