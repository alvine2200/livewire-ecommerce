<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminOrderController extends Controller
{
    public function index()
    {
        $todaysDate = Carbon::now()->subDay(2)->toDateTimeString();
        $orders = Order::where('created_at', '>=', $todaysDate)->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }

    public function orders($id)
    {
        $order_view = Order::where('id', $id)->first();
        if ($order_view) {
            return view('admin.orders.view', compact('order_view'));
        } else {
            return back()->with('status', 'No order Found');
        }
    }
}
