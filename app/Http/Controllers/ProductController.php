<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view(
            'products.index',
            [
                'products' => Product::with('category')->get()
            ]
        );
    }

    public function create()
    {
        $product = new Product();
        $categories = Category::all();

        return view(
            'products.create',
            [
                'product' => $product,
                'categories' => $categories
            ]
        );
    }

    public function store(ProductRequest $request)
    {
        Product::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'stock' => $request['stock'],
            'price' => $request['price'],
            'category_id' => $request['category'],
            'description' => $request['description'],
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view(
            'products.edit',
            [
                'product' => $product,
                'categories' => $categories
            ]
        );
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request['name'],
            'slug' => Str::slug($request['name']),
            'stock' => $request['stock'],
            'price' => $request['price'],
            'category_id' => $request['category'],
            'description' => $request['description'],
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
