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
        'slug', 'link', 'tag_id', 'localization', 'thumbnail'
    ];

    protected $appends = ['thumbnail'];
    protected $with = ['localization'];

    public $timestamps = false;

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-top', 800, 660)
            //->quality(70)
            ->withResponsiveImages();

        $this->addMediaConversion('thumb-medium')
            ->crop('crop-top', 900, 1155)
            //->quality(70)
            ->withResponsiveImages();    

        $this->addMediaConversion('thumb-big')
            ->crop('crop-top', 2280, 600)
            //->quality(70)
            ->withResponsiveImages();

        /*  $this->addMediaConversion('full-size');

        $this->addMediaConversion('thumb')
            ->crop('crop-top', 500, 415);*/
    }
    
    public function getThumbnail($large = false) {
        $media = $this->getFirstMedia('images');

        if ($large) {
            return $media->img('thumb-big', ['alt' => '']);
        }

        return $media->img('thumb', ['alt' => '']);
    }

    public function getThumbnailAttribute() {
        $media = $this->getFirstMedia('images');

        return [
                'url' => $media->getUrl('thumb-medium'),
                'srcset' =>  $media->getSrcset('thumb-medium')
            ];
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
