<?php

namespace App\Http\Livewire\Frontend\Products;

use Livewire\Component;

class View extends Component
{
    public $category, $products;

    public function mounts($category, $products)
    {
        $this->category = $category;
        $this->products = $products;
    }
    public function render()
    {
        return view('livewire.frontend.products.view', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
