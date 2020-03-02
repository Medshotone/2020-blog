<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('blog.category.index', [
            'categories' => Category::paginate(10)
        ]);
    }

    public function categories()
    {
        return view('blog.category.categories', [
            'categories' => Category::all()
        ]);
    }

    public function category(Category $category)
    {
        return view('blog.category.category', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('blog.category.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('blog.category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
