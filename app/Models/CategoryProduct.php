<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_products';
    protected $fillable = ['category_id', 'product_id', 'created_at', 'updated_at'];
}
