<?php

namespace App\Http\Controllers;

use App\Services\ProductsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    public function getAll(Request $request)
    {
        $category = $request->category;

        $ps = App::make(
            ProductsService::class,
            ['category' => $category]
        );

        return [
            'products' => $ps->getAll()
        ];
    }
}
