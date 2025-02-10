<?php

namespace App\Http\Controllers\Shop\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('shop.product.index');
    }
}
