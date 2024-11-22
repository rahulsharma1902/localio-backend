<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiteLanguage;
class PolicyTranslation extends Model
{
    use HasFactory;
    protected $table = 'policies_translations';
    protected $fillable = [
        'policy_id',
        'language_id',
        'title',
        'description',
        'status',
    ];
    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }
    public function language()
    {
        return $this->belongsTo(SiteLanguages::class, 'language_id');
    }
}
