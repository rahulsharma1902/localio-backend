<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTile extends Model
{
    use HasFactory;
    protected $table = 'pages_tiles';

    protected $fillable = [
        'lang_id', 
        'image', 
        'type', 
        'source'
    ];
}
