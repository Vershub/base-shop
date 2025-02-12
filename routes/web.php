<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\Product\ProductController as ShopProductController;
use App\Http\Controllers\Admin\Category\CategoryController as AdminCategoryController;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ShopProductController::class, 'index'])->name('products.index');

Route::middleware('auth')->group(function () {
    //ADMIN ROUTES
    Route::middleware(['role:admin|manager'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/dashboard', fn () => Inertia::render('Admin/Dashboard'))->name('dashboard');
        Route::resource('categories', AdminCategoryController::class)->except('show');
    });


    Route::get('/dashboard', function () {
        return Inertia::render('Client/Dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
