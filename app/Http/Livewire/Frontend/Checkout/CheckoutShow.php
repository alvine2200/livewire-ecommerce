<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\OrderInvoiceMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use AfricasTalking\SDK\AfricasTalking;

class CheckoutShow extends Component
{
    public $carts, $totalAmount = 0;
    public $fullname, $totalProductsAmount, $email, $phone_number, $pincode, $address, $payment_mode = null, $payment_id = null;
    protected $listeners = ['TransactionEmit' => 'PaidOnlinePaypal', 'CartUpdated' => 'PlaceOrderCod', 'ValidateAllFields'];

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

    public function PaidOnlinePaypal($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = "Paid By Paypal";
        $cod_order = $this->placeOrder();
        if ($cod_order) {
            Cart::where('user_id', Auth::user()->id)->delete();
            session()->flash('status', 'Paid by Paypal, Thank you');
            $this->dispatchBrowserEvent('status', [
                'text' => 'Paid Online Successfully, Order Placed',
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

    public function ValidateAllFields()
    {
        $this->validate();
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
            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColors()->where('id', $cartItem->product_color_id)->decrement('quantity', $cartItem->quantity);
            } else {
                $cartItem->products()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }
        session()->flash('status', 'Order Placed Successfully, Thank you For Shopping with us');
        return $order;
    }
    public function PlaceOrderCod()
    {
        //$this->sendSms();
        $this->payment_id = "POD";
        $this->payment_mode = "Pay on delivery";
        $cod_order = $this->placeOrder();
        if ($cod_order) {
            Cart::where('user_id', Auth::user()->id)->delete();
            try {
                $order = Order::findOrFail($cod_order->id);
                Mail::to("$order->email")->send(new OrderInvoiceMailable($order));
                $this->dispatchBrowserEvent('status', [
                    'text' => 'Order Placed Successfully, email sent',
                    'type' => 'success',
                    'status' => 200,
                ]);
                return back()->with('status', 'Order Invoice successfully sent to ' . $order->email);
            } catch (\Exception $err) {
                return back()->with('status', $err);
            }
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
        $this->totalAmount = 0;
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

    // public function sendSms()
    // {
    //     // Set your app credentials
    //     $username   = "sandbox";
    //     $apiKey     = "4fb37ed40e2d57918bcc36eae6971005c7c612b7f558250a202e6d52305e07fc";

    //     // Initialize the SDK
    //     $AT         = new AfricasTalking($username, $apiKey);

    //     // Get the SMS service
    //     $sms        = $AT->sms();

    //     // Set the numbers you want to send to in international format
    //     $recipients = "+254712135643,+254708878235";

    //     // Set your message
    //     $message    = "Orders Placed Successfully";

    //     // Set your shortCode or senderId
    //     $from       = "Alvine-Ecommerce";

    //     try {
    //         // Thats it, hit send and we'll take care of the rest
    //         $result = $sms->send([
    //             'to'      => $recipients,
    //             'message' => $message,
    //             'from'    => $from
    //         ]);

    //         return  print_r($result);
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
}
