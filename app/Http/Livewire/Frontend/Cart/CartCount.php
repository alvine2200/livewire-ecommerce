<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cart_count;

    protected $listeners = ['CartUpdated' => 'CartCount'];

    public function CartCount()
    {
        if (Auth::check()) {
            return $this->cart_count = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            return $this->cart_count = 0;
        }
    }

    public function render()
    {
        $this->cart_count = $this->CartCount();
        return view('livewire.frontend.cart.cart-count', [
            'cart_count' => $this->cart_count,
        ]);
    }
}
