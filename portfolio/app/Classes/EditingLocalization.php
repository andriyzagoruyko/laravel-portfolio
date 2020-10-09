<?php

namespace App\Classes;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EditingLocalization 
{
    public static function getDefaultLocale() 
    {
        return env('locale', 'en');
    }

    public static function getSupportedLocales() 
    {
        return LaravelLocalization::getSupportedLocales();
    }

    public static function getCurrentLocale() 
    {
        return session('editing_locale', self::getDefaultLocale());
    }

    public static function setCurrentLocale($localeCode) 
    {
        if (!key_exists($localeCode, self::getSupportedLocales())){
            abort(404);
        }

        session(['editing_locale' =>  $localeCode]);
    }
}