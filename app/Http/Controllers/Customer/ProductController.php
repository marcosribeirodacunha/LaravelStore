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
        $currentCategory = 'All';
        $pagination = request()->show ? request()->show : 9 ;
        $categories = Category::withCount([
            'products' => function (Builder $query) {
                $query->where('active', true);
            }
        ])->get();


        if (request()->category) {
            $products = Product::where('active', true)->whereHas('category', function (Builder $query) {
                $query->where('name', '=', request()->category);
            });
            $currentCategory = ucfirst(request()->category);
        } else {
            $products = Product::where('active', true);
        }


        if (request()->sort == 'az') {
            $products = $products->orderBy('name')->paginate($pagination);

        } elseif (request()->sort == 'za') {
            $products = $products->orderBy('name', 'desc')->paginate($pagination);

        } elseif (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);

        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);

        } else {
            $products = $products->paginate($pagination);
        }

        return view('app.products.index', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $currentCategory
        ]);
    }

    public function show(Product $product)
    {
        return view('app.products.show', ['product' => $product]);
    }
}
