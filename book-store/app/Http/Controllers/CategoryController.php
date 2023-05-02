<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard')->with('status', 'Category has been deleted');
    }
}
