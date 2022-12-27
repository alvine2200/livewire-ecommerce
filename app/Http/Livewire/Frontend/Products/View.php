<?php

namespace App\Http\Livewire\Frontend\Products;

use Livewire\Component;

class View extends Component
{
    public $category, $products, $productQuantity;

    public function mounts($category, $products)
    {
        $this->category = $category;
        $this->products = $products;
    }

    public function handleColorSelected($prodColorId)
    {
        $productColor = $this->products->productColors()->where('id', $prodColorId)->first();
        $this->productQuantity = $productColor->quantity;
        if($this->productQuantity == 0)
        {
            $this->productQuantity == "outOfStock";
        }
    }
    public function render()
    {
        return view('livewire.frontend.products.view', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
