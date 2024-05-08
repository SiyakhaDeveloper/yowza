<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.category.all_category',compact('category'));
    }

    public function CreateCategory()
    {
        return view('admin.category.category_create');
    }
}
