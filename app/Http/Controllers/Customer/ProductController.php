<?php

namespace App\Http\Controllers\Customer;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $products = Product::where('active', true)->paginate(15);
        $categories = Category::withCount([
            'products' => function (Builder $query) {
                $query->where('active', true);
            }
        ])->get();

        return view('app.products.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function show(Product $product)
    {
        return view('app.products.product', ['product' => $product]);
    }
}
