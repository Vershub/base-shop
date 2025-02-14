<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Models\Category\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        DB::transaction(function () use ($request) {
            $category = Category::create([
                'slug' => $request->string('slug'),
                'active' => $request->boolean('active'),
                'sort_order' => $request->integer('sort_order'),
            ]);

            foreach ($request->array('locales') as $localeCode => $locale) {
                $category->translates()->create([
                    'locale_code' => $localeCode,
                    'name' => $locale['name'],
                    'description' => $locale['description'],
                    'meta_title' => $locale['meta_title'],
                    'meta_description' => $locale['meta_description'],
                ]);
            }
        });

        return to_route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        //
    }
}
