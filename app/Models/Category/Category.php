<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Vershub\LaravelTranslations\Model\TranslatableModel;

class Category extends TranslatableModel
{
    protected $fillable = [
        'slug',
        'active',
        'sort_order'
    ];

    protected function getTranslationModel(): string
    {
        return CategoryTranslation::class;
    }

    protected function getForeignKeyForTranslation(): string
    {
        return 'category_id';
    }
}
