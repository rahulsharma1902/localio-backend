<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyfeature extends Model
{
    protected $fillable = [
        'product_id',
        'feature_id',
        'type',
    ];
    use HasFactory;
}
