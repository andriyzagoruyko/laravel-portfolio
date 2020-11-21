<?php

namespace App\Models;

use App\Models\Tag;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Project extends LocalizedModel implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
            'slug', 'link', 'tag_id'
    ];

    protected $visible = [
        'slug', 'link', 'tag_id', 'localization', 'technologies'
    ];

    protected $with = [
        'localization', 'technologies'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-top', 470, 375)
            ->withResponsiveImages();

        $this->addMediaConversion('thumb-medium')
            ->crop('crop-top', 700, 900)
            ->quality(70)
            ->withResponsiveImages();    

        $this->addMediaConversion('thumb-big')
            ->crop('crop-top', 1600, 420)
            ->quality(70)
            ->withResponsiveImages();
    }
    
    public function getThumbnail($large = false, $alt = '') 
    {
        $media = $this->getFirstMedia('images');

        if ($large) {
            return $media->img('thumb-big', ['alt' => $alt]);
        }

        return $media->img('thumb', ['alt' => $alt]);
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
        return $this->belongsToMany(Technology::class)->with('media')->orderBy('order');
    }

}
