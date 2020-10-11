<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigLocalization extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tag_id', 
        'lang', 
        'title',
        'description',
        'h1',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function config()
    {
        return $this->belongsTo(Config::class);
    }
}
