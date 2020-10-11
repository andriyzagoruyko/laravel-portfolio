<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Project extends LocalizedModel implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
            'slug', 'link', 'tag_id'
    ];

    public $timestamps = false;

    public function registerMediaConversions(Media $media = null): void
    {
        /*$this->addMediaConversion('thumb')
            ->crop('crop-top', 800, 660)
            ->quality(70)
            ->withResponsiveImages();
            
        $this->addMediaConversion('thumb-big')
            ->crop('crop-top', 2280, 600)
            ->quality(70)
            ->withResponsiveImages();

        $this->addMediaConversion('full-size');*/

        $this->addMediaConversion('thumb')
            ->crop('crop-top', 500, 415);
    }
    
    public function getThumbnail() {
        $media = $this->getFirstMedia('images');
        return($media->img('thumb', ['alt' => '']));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
