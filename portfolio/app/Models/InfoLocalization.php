<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoLocalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'info_id', 
        'lang', 
        'name', 
        'about', 
        'contact', 
        'phone', 
        'telegram', 
        'linkedin', 
        'behance', 
        'github'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function info()
    {
        return $this->belongsTo(Info::class);
    }
}
