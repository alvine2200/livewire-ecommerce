<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartListShow extends Component
{
    public $cart_id, $totalPrice = 0;

    public function mounts($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    public function IncreementQuantity($cart_id)
    {
        $cartItem = Cart::where('user_id', Auth::user()->id)->where('id', $cart_id)->first();
        if ($cartItem) {
            if ($cartItem->productColors()->where('id', $cartItem->product_color_id)->exists()) {
                //here
                $productColor = $cartItem->productColors()->where('id', $cartItem->product_color_id)->first();
                if ($productColor->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Cart Item quantity is increased',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                    return back();
                } else {
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                        'type' => 'error',
                        'status' => 404,
                    ]);
                }
            } else {
                if ($cartItem->products?->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Cart Item quantity is increased',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                    return back();
                } else {
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Only ' . $cartItem->products?->quantity . ' quantity available ',
                        'type' => 'error',
                        'status' => 404,
                    ]);
                    return back();
                }
            }
        } else {
            $this->dispatchBrowserEvent('status', [
                'text' => 'Cart Item not found',
                'type' => 'warning',
                'status' => 409,
            ]);
            return back();
        }
    }

    public function DecreementQuantity($cart_id)
    {
        $cartItem = Cart::where('user_id', Auth::user()->id)->where('id', $cart_id)->first();
        if ($cartItem) {
            if ($cartItem->productColors()->where('id', $cartItem->product_color_id)->exists()) {
                //here
                $productColor = $cartItem->productColors()->where('id', $cartItem->product_color_id)->first();
                if ($productColor->quantity > 1) {
                    $cartItem->decrement('quantity');
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Cart Item quantity is decreased',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                    return back();
                } else {
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                        'type' => 'error',
                        'status' => 404,
                    ]);
                }
            } else {
                if ($cartItem->products?->quantity > 1) {
                    $cartItem->decrement('quantity');
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Cart Item quantity is decreased',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                    return back();
                } else {
                    $this->dispatchBrowserEvent('status', [
                        'text' => 'Only ' . $cartItem->products?->quantity . ' quantity available ',
                        'type' => 'error',
                        'status' => 404,
                    ]);
                    return back();
                }
            }
        } else {
            $this->dispatchBrowserEvent('status', [
                'text' => 'Cart Item not found',
                'type' => 'warning',
                'status' => 409,
            ]);
            return back();
        }
    }
    public function removeCartList($cart_id)
    {
        $cartFind = Cart::where('user_id', Auth::user()->id)->where('id', $cart_id)->first();
        $cartFind->delete();
        $this->emit('CartUpdated');
        session()->flash('status', 'Cart Item removed successfully');
        $this->dispatchBrowserEvent('status', [
            'text' => 'Cart Item removed successfully',
            'type' => 'success',
            'status' => 200,
        ]);
        return back();
    }

    public function render()
    {
        $cartlist = Cart::where('user_id', Auth::user()->id)->get();
        return view('livewire.frontend.cart-list-show', [
            'cartlist' => $cartlist
        ]);
    }
}
