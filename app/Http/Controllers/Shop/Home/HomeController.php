<?php

namespace App\Http\Controllers\Shop\Home;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        /**
         * @var view-string $viewName
         */
        $viewName = 'shop.home.index';

        return view($viewName);
    }
}
