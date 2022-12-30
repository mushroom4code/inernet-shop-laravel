<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {

        
        $products = Product::with('categories', 'images')->orderBy('price', 'asc')->paginate(10)->withPath("?".$request->getQueryString());
        

        return view('index', compact('products'));
    }

    public function categories()
    {
        return view('categories');
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->with('products')->first();
        return view('category', compact('category'));
    }

    public function product($categoryCode, $productCode, $productId)
    {
        if (empty($categoryCode)) {
            abort(404, 'Категория не найдена');
        }

        if (empty($productCode) && empty($productId)) {
            abort(404, 'Продукт не найден');
        }

        $product = Product::where('id', $productId)->where('code', $productCode)->with('categories', 'images')->first();

        if (empty($product)) {
            abort(404, 'Продукт не найден');
        }

        return view('product', compact('product'));
    }
}
