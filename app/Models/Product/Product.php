<?php

namespace App\Models\Product;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Vershub\LaravelTranslations\Model\TranslatableModel;

class Product extends TranslatableModel implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        '',
    ];

    protected function getTranslationModel(): string
    {
        return ProductTranslation::class;
    }

    protected function getForeignKeyForTranslation(): string
    {
        return 'product_id';
    }
}
