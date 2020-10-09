<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Classes\EditingLocalization;


/**
 * Class LocalizedModel
 * @package App\Models
 *
 * @property Model|null $localization
 * @property Collection|Model[] $localizations
 * @method static Builder|LocalizedModel withLocalization(string $locale)
 */
class LocalizedModel extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function localization()
    {
        return $this->hasOne(
            $this->getLocalizationModelName()
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localizations()
    {
        return $this->hasMany(
            $this->getLocalizationModelName()
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function defaultLocalization()
    {
        $locale = EditingLocalization::getDefaultLocale();

        return $this
            ->hasOne($this->getLocalizationModelName())
            ->where('lang', $locale);
    }

    /**
     * @param Builder $query
     * @param string $locale
     */
    public function scopeWithLocalization(Builder $query, string $locale)
    {
        $filter = function($query) use ($locale) {
            /** @var Builder $query */
            $query->where('lang', $locale);
        };

        $query
            ->whereHas('localization', $filter)
            ->with([
                'localization' => $filter
            ]);
    }


    /**
     * @return string
     */
    private function getLocalizationModelName()
    {
        return get_class($this).'Localization';
    }
}