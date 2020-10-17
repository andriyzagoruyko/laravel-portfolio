<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Info extends LocalizedModel implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'mail', 
        'phone', 
        'telegram', 
        'linkedin', 
        'behance', 
        'github'
    ];

    public $timestamps = false;
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-top', 500, 500)
            ->quality(70)
            ->format(Manipulations::FORMAT_PNG);
    }

    public function getThumbnail($alt) 
    {
        $media = $this->getFirstMedia('images');

        if (!is_null($media)) {
            return $media->img('thumb', ['alt' => $alt]);
        }

        return '';
    }
}
