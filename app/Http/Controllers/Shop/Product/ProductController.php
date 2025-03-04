<?php

namespace App\Http\Controllers\Shop\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        /**
         * @var view-string $viewName
         */
        $viewName = 'shop.product.index';

        return view($viewName);
    }
}
