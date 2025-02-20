<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Category/Index', [
            'categories' => Category::query()
                ->select(['id', 'slug', 'sort_order', 'active', 'created_at'])
                ->withTranslation(':id,category_id,name,locale_code')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Category/Create', [
            'languages' => config('laravellocalization.supportedLocales')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $categoryData = $request->array('static');
        $categoryTranslations = $request->array('locales');

        DB::transaction(function () use ($categoryData, $categoryTranslations) {
            $category = Category::create([
                'slug' => $categoryData['slug'],
                'active' => $categoryData['active'],
                'sort_order' => $categoryData['sort_order'],
            ]);

            foreach ($categoryTranslations as $localeCode => $locale) {
                $category->translates()->create([
                    'locale_code' => $localeCode,
                    'name' => $locale['name'],
                    'description' => $locale['description'],
                    'meta_title' => $locale['meta_title'] ?? null,
                    'meta_description' => $locale['meta_description'] ?? null,
                ]);
            }
        });

        return to_route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): \Inertia\Response
    {
        return Inertia::render('Admin/Category/Edit', [
            'category' => Category::with('translates')->findOrFail($id),
            'languages' => config('laravellocalization.supportedLocales')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $categoryData = $request->array('static');

        $category->update([
            'slug' => $categoryData['slug'],
            'active' => $categoryData['active'],
            'sort_order' => $categoryData['sort_order'],
        ]);

        foreach ($request->array('locales') as $localeCode => $locale) {
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

        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
