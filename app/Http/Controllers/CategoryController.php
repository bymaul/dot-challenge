<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();

        return view(
            'categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view(
            'categories.create',
            [
                'category' => new Category()
            ]
        );
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->only('name'));

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view(
            'categories.edit',
            [
                'category' => $category
            ]
        );
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->only('name'));

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
