<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactContent extends Model
{
    use HasFactory;
    protected $table = 'contact_contents';
    protected $fillable = [
        'contact_heading',
        'image_first',
        'image_second',
        'footer_heading',
        'g_button',
    ];

}
