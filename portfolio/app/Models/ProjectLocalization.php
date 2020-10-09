<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostLocalization
 * @package App\Models
 */
class ProjectLocalization extends Model
{
    protected $fillable = [
            'project_id', 'lang', 'name', 'description'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}