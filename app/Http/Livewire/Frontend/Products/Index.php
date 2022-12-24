<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandsInput = [];

    protected $queryString = ['brandsInput' => ['except' => '', 'as' => 'brand']];
    public function mounts($category)
    {
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandsInput, function ($query) {
                $query->whereIn('brand_id', $this->brandsInput);
            })
            ->where('status', '0')->get();
        return view('livewire.frontend.products.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
