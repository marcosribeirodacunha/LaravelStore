<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products.products')->with('products', $products);
    }

    public function show(Product $product)
    {
        $product->load('category');
        return view('admin.products.product')->with('product', $product);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create-or-update', ['categories' => $categories]);
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
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->units_in_stock = $validatedData['units_in_stock'];
        $product->description = $validatedData['description'];
        $product->active = $validatedData['active'];

        $product->save();

        return redirect()->back();
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.create-or-update')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(Product $product, Request $request)
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

        $product->name = $validatedData['name'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->units_in_stock = $validatedData['units_in_stock'];
        $product->description = $validatedData['description'];
        $product->active = $validatedData['active'];

        $product->save();

        return redirect()->route('admin.products.show', $product->slug);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
