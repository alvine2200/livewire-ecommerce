<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
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
        $product = $category->products()->create($valid);

        if ($request->image) {
            foreach ($request->file('image') as $imagefile) {
                $name = time() .  $imagefile->getClientOriginalName();
                // $name = time() . uniqid() . '.' . $imagefile->getClientOriginalExtension();
                // dd($name);
                $imagefile->move('Uploads/Products', $name);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $name,
                ]);
            }
        }
        return redirect('admin/products')->with('success', 'New Product added Successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $small_description = $product['small-description'];
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands', 'small_description'));
    }

    public function update(ProductFormRequest $request, $id)
    {
        $valid = $request->validated();
        $valid['slug'] = Str::slug($valid['slug']);
        $valid['trending'] = $request->trending == true ? '1' : '0';
        $valid['status'] = $request->status == true ? '1' : '0';

        $category = Category::findOrFail($valid['category_id']);
        $product = $category->products()->create($valid);

        if ($request->image) {
            foreach ($request->file('image') as $imagefile) {
                $name = time() .  $imagefile->getClientOriginalName();
                // $name = time() . uniqid() . '.' . $imagefile->getClientOriginalExtension();
                // dd($name);
                $imagefile->move('Uploads/Products', $name);

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $name,
                ]);
            }
        }
        return redirect('admin/products')->with('success', 'New Product added Successfully');
    }
}
