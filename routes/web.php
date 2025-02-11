<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Shop\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\Product\ProductController as ShopProductController;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ShopProductController::class, 'index'])->name('products.index');


Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->middleware(['role:admin|manager'])->name('admin.dashboard');


    Route::get('/dashboard', function () {
        return Inertia::render('Client/Dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
