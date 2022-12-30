<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CheckoutShow extends Component
{
    public $carts, $totalAmount;

    public function totalCartAmount()
    {
        $this->carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalAmount += $cartItem->products->selling_price * $cartItem->quantity;
        }
        return $this->totalAmount;
    }
    public function render()
    {
        $this->totalProductsAmount = $this->totalCartAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductsAmount' => $this->totalProductsAmount,
        ]);
    }
}
