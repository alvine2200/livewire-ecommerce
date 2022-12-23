<?php

namespace App\Http\Livewire\Frontend\Products;

use Livewire\Component;

class Index extends Component
{
    public $products, $category;

    public function mounts($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.frontend.products.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
