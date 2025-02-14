<?php

namespace App\Models\Category;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Vershub\LaravelTranslations\Model\TranslatableModel;

/**
 * @method static \Illuminate\Database\Eloquent\Builder<static> withTranslation()
 */
class Category extends TranslatableModel
{
    protected $fillable = [
        'slug',
        'active',
        'sort_order'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<mixed, mixed>
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn (string $value) => Carbon::parse($value)->format('M d, Y g:i A')
        );
    }

    protected function getTranslationModel(): string
    {
        return CategoryTranslation::class;
    }

    protected function getForeignKeyForTranslation(): string
    {
        return 'category_id';
    }
}
