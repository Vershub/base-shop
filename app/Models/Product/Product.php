<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Vershub\LaravelTranslations\Model\TranslatableModel;

class Product extends TranslatableModel implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        ''
    ];


    protected function getTranslationModel(): string
    {
        return ProductTranslation::class;
    }

    protected function getForeignKeyForTranslation(): string
    {
        // TODO: Implement getForeignKeyForTranslation() method.
    }
}
