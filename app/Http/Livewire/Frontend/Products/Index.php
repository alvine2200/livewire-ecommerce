<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandsInput = [], $priceInput;

    protected $queryString = [
        'brandsInput' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];
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
            ->when($this->priceInput, function ($query) {
                $query->when($this->priceInput == 'high-to-low', function ($query2) {
                    $query2->orderby('selling_price', 'DESC');
                })
                    ->when($this->priceInput == 'low-to-high', function ($query2) {
                        $query2->orderby('selling_price', 'ASC');
                    });
            })
            ->where('status', '0')->get();
        return view('livewire.frontend.products.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
