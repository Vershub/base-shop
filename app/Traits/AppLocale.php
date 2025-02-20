<?php

namespace App\Traits;

trait AppLocale
{
    public function getAppLocale(): string
    {
        $appLocale = config('app.locale', 'en');
        assert(is_string($appLocale));

        return $appLocale;
    }
}
