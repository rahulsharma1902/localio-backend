<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiteLanguage;
class PolicyTranslation extends Model
{
    use HasFactory;
    protected $table = 'policy_transaltaion';

    protected $fillable = [
        'lang_id',
        'policy_id',
        'title',
        'description',
        'key',
        'status'
    ];

    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
