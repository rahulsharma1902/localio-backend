<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FeatureTransalte;

class Feature extends Model
{
    use HasFactory;
    protected $table = 'features';

    protected $fillable = ['lang_id', 'type', 'status'];

    public function feature_translation()
    {
        return  $this->hasOne(FeatureTransalte::class,'feature_id');
    }

   
}
