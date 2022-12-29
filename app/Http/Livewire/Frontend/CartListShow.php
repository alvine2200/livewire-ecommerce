<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartListShow extends Component
{
    public $cart_id;

    public function mounts($cart_id)
    {
        $this->cart_id = $cart_id;
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
