<?php

namespace App\Http\Controllers\Home;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
