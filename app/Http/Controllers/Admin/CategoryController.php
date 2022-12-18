<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $valid = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('Category');
        }

        $category = Category::create([
            'name' => $valid['name'],
            'slug' => Str::slug($valid['slug']),
            'status' => $request->status == true ? '1' : '0',
            'image' => $image,
            'meta_title' => $valid['meta_title'],
            'meta_keyword' => $valid['meta_keyword'],
            'meta_description' => $valid['meta_description'],
            'description' => $valid['description'],
        ]);
        // dd($category);
        return redirect('admin/category')->with('success', 'Category added successfully');
    }
}
