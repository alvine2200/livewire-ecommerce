<?php

namespace App\Http\Livewire\Frontend\Products;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $products, $productQuantity, $product_id, $QuantityCount = 1, $prodColorId;

    public function mounts($category, $products, $product_id, $prodColorId)
    {
        $this->category = $category;
        $this->products = $products;
        $this->product_id = $product_id;
        $this->prodColorId = $prodColorId;
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
    public function AddToCart($product_id)
    {
        if (Auth::check()) {
            if ($this->products->findOrFail($product_id)->first()) {
                if ($this->products->productColors()->count() > 1) {
                    // dd('product color inside');
                    if ($this->productQuantity != null) {
                        // dd('select color'); check if product color quantity > 0
                        $prodColor = $this->products->productColors()->where('id', $this->prodColorId)->first();
                        if ($prodColor->quantity > 0) {
                            //check if quantity selected is much than the product quantity                            
                            if ($prodColor->quantity > $this->QuantityCount) {
                                //insert with color id
                                if (Cart::where('user_id', Auth::user()->id)->where('product_color_id', $this->prodColorId)->where('product_id', $product_id)->exists()) {
                                    $this->dispatchBrowserEvent('status', [
                                        'text' => 'Product already added to cart',
                                        'type' => 'warning',
                                        'status' => 404,
                                    ]);
                                    return back();
                                } else {
                                    Cart::create([
                                        'user_id' => Auth::user()->id,
                                        'product_id' => $product_id,
                                        'product_color_id' => $this->prodColorId,
                                        'quantity' => $this->QuantityCount,
                                    ]);
                                    $this->emit('CartUpdated');
                                    $this->dispatchBrowserEvent('status', [
                                        'text' => 'Product added to cart successfully',
                                        'type' => 'success',
                                        'status' => 200,
                                    ]);
                                    return back();
                                }
                            } else {
                                $this->dispatchBrowserEvent('status', [
                                    'text' => 'Only ' . $prodColor->quantity . ' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                                return back();
                            }
                        } else {
                            $this->dispatchBrowserEvent('status', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404,
                            ]);
                            return back();
                        }
                    } else {
                        $this->dispatchBrowserEvent('status', [
                            'text' => 'Select a Product Color',
                            'type' => 'warning',
                            'status' => 404,
                        ]);
                        return back();
                    }
                } else {
                    if (Cart::where('user_id', Auth::user()->id)->where('product_id', $product_id)->exists()) {
                        $this->dispatchBrowserEvent('status', [
                            'text' => 'Product exists in the cart',
                            'type' => 'warning',
                            'status' => 404,
                        ]);
                        return back();
                    } else {
                        if ($this->products->quantity > 0) {
                            if ($this->products->quantity > $this->QuantityCount) {
                                Cart::create([
                                    'user_id' => Auth::user()->id,
                                    'product_id' => $product_id,
                                    // 'product_color_id' => '',
                                    'quantity' => $this->QuantityCount,
                                ]);
                                $this->emit('CartUpdated');
                                $this->dispatchBrowserEvent('status', [
                                    'text' => 'Product added to cart successfully',
                                    'type' => 'success',
                                    'status' => 200,
                                ]);
                                return back();
                            } else {
                                $this->dispatchBrowserEvent('status', [
                                    'text' => 'Only' . $this->products->quantity . 'Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                                return back();
                            }
                        } else {
                            $this->dispatchBrowserEvent('status', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404,
                            ]);
                            return back();
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('status', [
                    'text' => 'Product does not exist',
                    'type' => 'warning',
                    'status' => 404,
                ]);
                return back();
            }
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
        $this->prodColorId = $prodColorId;
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
