<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use App\Services\Admin\Category\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Throwable;

class CategoryController extends Controller
{
    public function __construct(readonly public CategoryService $categoryService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Category/Index', [
            'categories' => Category::query()
                ->select(['id', 'slug', 'sort_order', 'active', 'created_at'])
                ->withTranslation(':id,category_id,name,locale_code')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Category/Create', [
            'languages' => config('laravellocalization.supportedLocales'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws Throwable
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        /** @var array<string, int|string> $categoryData */
        $categoryData = $request->array('static');

        /** @var array<string, array<string, string|null>> $translations */
        $translations = $request->array('locales');

        $this->categoryService->createCategory(
            categoryData: $categoryData,
            translations: $translations,
            image: $this->extractImageFromRequest($request)
        );

        return to_route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): \Inertia\Response
    {
        $category = Category::with('translates')->findOrFail($id);

        return Inertia::render('Admin/Category/Edit', [
            'category' => $category,
            'languages' => config('laravellocalization.supportedLocales'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws Throwable
     */
    public function update(UpdateCategoryRequest $request, int $id): RedirectResponse
    {
        /** @var array<string, int|string> $categoryData */
        $categoryData = $request->array('static');

        /** @var array<string, array<string, string|null>> $translations */
        $translations = $request->array('locales');

        $this->categoryService->updateCategory(
            id: $id,
            categoryData: $categoryData,
            translations: $translations,
            image: $this->extractImageFromRequest($request)

        );

        return to_route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Category::findOrFail($id)->delete();

        return to_route('admin.categories.index');
    }

    private function extractImageFromRequest(Request $request): ?UploadedFile
    {
        if (! $request->hasFile('static.image')) {
            return null;
        }
        /** @var UploadedFile $image */
        $image = $request->file('static.image');

        return $image;
    }
}
