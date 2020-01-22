<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::withCount('products')->get();

        return view('app.products.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function show(Product $product)
    {
        return view('app.products.product', ['product' => $product]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('app.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|between:2,255|',
            'category' => 'required|integer',
            'price' => 'required|numeric|min:0.01',
            'units_in_stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'active' => 'boolean'
        ]);

        if (!isset($validatedData['active'])) {
            $validatedData['active'] = 0;
        }

        if ($validatedData['units_in_stock'] == 0) {
            $validatedData['active'] = 0;
        }

        $product = new Product();

        $product->name = $validatedData['name'];
        $product->category = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->units_in_stock = $validatedData['units_in_stock'];
        $product->description = $validatedData['description'];
        $product->active = $validatedData['active'];

        $product->save();

        return redirect()->back();
    }
}
