<?php

namespace App\Http\Controllers\Home;

use App\Models\Product;
use App\Models\Category;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.categories.index', compact('categories'));
    }
    public function products($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            // $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('category'));
        } else {
            return back();
        }
    }

    public function productDetails($category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($products) {
                return view('frontend.collections.products.details', compact('category', 'products'));
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function thanks()
    {
        return view('frontend.thank_you');
    }
}
