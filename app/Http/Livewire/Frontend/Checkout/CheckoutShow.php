<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CheckoutShow extends Component
{
    public $carts, $totalAmount = 0;
    public $fullname, $email, $phone_number, $pincode, $address, $payment_mode = null, $payment_id = null;
    protected $listeners = ['CartUpdated' => 'PlaceOrderCod'];

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone_number' => 'required|numeric',
            'pincode' => 'required|string|max:150',
            'address' => 'required|string|max:150',
        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'payment_mode' => $this->payment_mode,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'tracking_number' => Str::random(10),
            'phone_number' => $this->phone_number,
            'payment_id' => $this->payment_id,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In Progress',
        ]);

        foreach ($this->carts as $cartItem) {
            OrderItem::create([
                'product_id' => $cartItem->product_id,
                'order_id' => $order->id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->products->selling_price,
            ]);
        }

        return $order;
    }
    public function PlaceOrderCod()
    {
        $this->payment_id = "POD";
        $this->payment_mode = "Pay on delivery";
        $cod_order = $this->placeOrder();
        if ($cod_order) {
            Cart::where('user_id', Auth::user()->id)->delete();
            $this->dispatchBrowserEvent('status', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200,
            ]);
            return redirect('thank_you');
        } else {
            $this->dispatchBrowserEvent('status', [
                'text' => 'Order not placed, Something went Wrong',
                'type' => 'error',
                'status' => 500,
            ]);
            return back();
        }
    }
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
        $this->fullname = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->totalProductsAmount = $this->totalCartAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductsAmount' => $this->totalProductsAmount,
        ]);
    }
}
