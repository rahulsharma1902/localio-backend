<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProCons extends Model
{
    protected $table = 'pro_cons';
    protected $fillable = ['product_id', 'lang_id', 'type', 'created_at', 'updated_at'];
}
