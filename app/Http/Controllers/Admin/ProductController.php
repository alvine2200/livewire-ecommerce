<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(ProductFormRequest $request)
    {
        $valid = $request->validated();
        $valid['slug'] = Str::slug($valid['slug']);
        $valid['trending'] = $request->trending == true ? '1' : '0';
        $valid['status'] = $request->status == true ? '1' : '0';

        $category = Category::findOrFail($valid['category_id']);
        // $brand = Brand::findOrFail($valid['brand_id']);
        $product = $category->products()->create($valid);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $imagefile) {
                $name = time() . $imagefile->getClientOriginalName();
                $imagefile->move('Uploads/Products', $name);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'images' => $name,
                ]);
            }
            // return 'Image Created';
        }
        return redirect('admin/products')->with('success', 'New Product added Successfully');
    }
}
