<?php

namespace App\Http\Controllers\Home;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use AfricasTalking\SDK\AfricasTalking;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->paginate(10);
        return view('frontend.order.index', compact('orders'));
    }

    public function view_orders($id)
    {
        $order_view = Order::where('user_id', Auth::user()->id)->where('id', $id)->first();
        if ($order_view) {
            return view('frontend.order.view', compact('order_view'));
        } else {
            return back()->with('status', 'No order Found');
        }
    }

    public function sendSms()
    {
        // Set your app credentials
        $username   = "sandbox";
        $apiKey     = "4fb37ed40e2d57918bcc36eae6971005c7c612b7f558250a202e6d52305e07fc";

        // Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms        = $AT->sms();

        // Set the numbers you want to send to in international format
        $recipients = "+254712135643";

        // Set your message
        $message    = "Orders Placed Successfully";

        // Set your shortCode or senderId
        $from       = "22140";

        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => $from
            ]);

            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
