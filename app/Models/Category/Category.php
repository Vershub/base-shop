<?php

namespace App\Models\Category;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Vershub\LaravelTranslations\Model\TranslatableModel;

/**
 * @method static Builder<static> withTranslation()
 *
 * @property string|null $image
 */
class Category extends TranslatableModel implements HasMedia
{
    use InteractsWithMedia;

    public const CATEGORY_IMAGE_COLLECTION = 'category_image';

    protected $fillable = [
        'slug',
        'active',
        'sort_order',
    ];

    protected $appends = ['image'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::CATEGORY_IMAGE_COLLECTION)
            ->singleFile();
    }

    /**
     * @return Attribute<mixed, mixed>
     */
    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn (string $value) => Carbon::parse($value)->format('M d, Y g:i A')
        );
    }

    /**
     * @return Attribute<mixed, mixed>
     */
    protected function active(): Attribute
    {
        return new Attribute(
            get: fn (int $value) => (bool) $value
        );
    }

    /**
     * @return Attribute<string|null, mixed>
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl(self::CATEGORY_IMAGE_COLLECTION)
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
