<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->category_name = $request->name;

        $category->save();

        return redirect()->route('dashboard')->with('status', 'Category has been created');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->category_name = $request->name;

        $category->save();

        return redirect()->route('dashboard')->with('status', 'Category has been updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard')->with('status', 'Category has been deleted');
    }
}
