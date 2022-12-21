<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $product = $category->products()->where('id', $id)->first();

        if ($product) {
            $product->update($valid);
            $product->update(['category_id' => $valid['category_id']]);
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
            return redirect('admin/products')->with('success', 'Product updated Successfully');
        } else {
            return redirect('admin/products')->with('status', 'Id Not Found');
        }
    }

    public function remove($productimage_id)
    {
        $image = ProductImage::findOrFail($productimage_id);
        $path = 'Uploads/Products/' . $image->image;
        if (File::exists($path)) {
            File::delete($path);
            $image->delete();
            return back()->with('success', 'Image Removed Successfully');
        }
    }

    public function delete($product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages()) {
            foreach ($product->productImages() as $images) {
                $path = 'Uploads/Products/' . $images->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        $product->delete();
        return back()->with('success', 'Product Deleted with its Images');
    }
}
