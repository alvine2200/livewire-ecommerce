<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $products, $productQuantity, $product_id, $QuantityCount = 1;

    public function mounts($category, $products, $product_id)
    {
        $this->category = $category;
        $this->products = $products;
        $this->product_id = $product_id;
    }
    public function decreementQuantity()
    {
        if ($this->QuantityCount > 1) {
            $this->QuantityCount--;
        }
    }
    public function increementQuantity()
    {
        if ($this->QuantityCount < 50) {
            $this->QuantityCount++;
        }
    }
    public function addToWishList($product_id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            //check if wishlist exists
            if (Wishlist::where('user_id', $user->id)->where('product_id', $product_id)->exists()) {
                session()->flash('status', 'Product already exists');
                $this->dispatchBrowserEvent('status', [
                    'text' => 'Product already exists on wishlist',
                    'type' => 'warning',
                    'status' => 409,
                ]);
                return back();
            }
            Wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product_id,
            ]);
            $this->emit('wishlistUpdated');
            session()->flash('status', 'Product added successfully');
            $this->dispatchBrowserEvent('status', [
                'text' => 'Product added successfully',
                'type' => 'success',
                'status' => 200,
            ]);
            return back();
        } else {
            session()->flash('status', 'Please Login to Continue');
            $this->dispatchBrowserEvent('status', [
                'text' => 'Please Login to Continue',
                'type' => 'info',
                'status' => 401,
            ]);
            return back();
        }
    }

    public function handleColorSelected($prodColorId)
    {
        $productColor = $this->products->productColors()->where('id', $prodColorId)->first();
        $this->productQuantity = $productColor->quantity;
        if ($this->productQuantity == 0) {
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
