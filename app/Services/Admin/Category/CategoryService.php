<?php

namespace App\Services\Admin\Category;

use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Throwable;

final class CategoryService
{
    /**
     * @param  array<string, string|int>  $categoryData
     * @param  array<string, array<string, string|null>>  $translations
     *
     * @throws Throwable
     */
    public function createCategory(array $categoryData, array $translations, ?UploadedFile $image): Category
    {
        return DB::transaction(function () use ($categoryData, $translations, $image) {
            $category = Category::create([
                'slug' => $categoryData['slug'],
                'active' => $categoryData['active'],
                'sort_order' => $categoryData['sort_order'],
            ]);

            if ($image) {
                $this->handleCategoryImage($category, $image);
            }
            $this->syncTranslations($category, $translations);

            return $category;
        });

    }

    /**
     * @param  array<string, string|int>  $categoryData
     * @param  array<string, array<string, string|null>>  $translations
     *
     * @throws Throwable
     */
    public function updateCategory(int $id, array $categoryData, array $translations, ?UploadedFile $image): Category
    {
        $category = Category::findOrFail($id);

        return DB::transaction(function () use ($category, $categoryData, $translations, $image) {
            $category->update([
                'slug' => $categoryData['slug'],
                'active' => $categoryData['active'],
                'sort_order' => $categoryData['sort_order'],
            ]);

            if ($image) {
                $this->handleCategoryImage($category, $image);
            }
            $this->syncTranslations($category, $translations);

            return $category;
        });
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    private function handleCategoryImage(Category $category, UploadedFile $image): void
    {
        $category->addMedia($image)
            ->toMediaCollection(Category::CATEGORY_IMAGE_COLLECTION);
    }

    /**
     * @param  array<string, array<string, string|null>>  $translations
     */
    private function syncTranslations(Category $category, array $translations): void
    {
        foreach ($translations as $localeCode => $locale) {
            $category->translates()->updateOrCreate(
                [
                    'locale_code' => $localeCode,
                ],
                [
                    'name' => $locale['name'],
                    'description' => $locale['description'],
                    'meta_title' => $locale['meta_title'] ?? null,
                    'meta_description' => $locale['meta_description'] ?? null,
                ]
            );
        }
    }
}
