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
            'slug', 'link'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-top', 800, 660)
            ->quality(70)
            ->withResponsiveImages();
            
        $this->addMediaConversion('thumb-big')
            ->crop('crop-top', 2280, 600)
            ->quality(70)
            ->withResponsiveImages();

        $this->addMediaConversion('full-size');
    }
    
    public function getThumbnail() {
        $media = $this->getFirstMedia('images');
        return($media->img('thumb', ['alt' => '']));
    }
}
