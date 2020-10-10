<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Technology extends Model implements HasMedia
{ 
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name'];

    public function getLogoUrl() {
        $media = $this->getFirstMedia('images');
        return $media->getUrl();
        //return($media->img('logo', ['alt' => '']));
    }
}
