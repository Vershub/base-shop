<?php

namespace App\Http\Requests\Traits;

trait LocalizedValidationMessages
{
    /**
     * @return array<string, string>
     */
    protected function getLocalizedMessages(string $locale): array
    {
        return [
            "locales.{$locale}" => 'At least one locale is required',
            "locales.{$locale}.name" => 'The name field is required.',
            "locales.{$locale}.description" => 'The description field is required.',
        ];
    }

    /**
     * @param  array<string> $locales
     */
    protected function getDefaultLocaleFromLocalesArray(array $locales): string
    {
        return (string) array_key_first($locales);
    }
}