<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $todaysDate = Carbon::now()->subDay(2)->toDateTimeString();
        // $orders = Order::where('created_at', '>=', $todaysDate)->paginate(5);
        $orders = Order::when($request->date != NULL, function ($query) use ($request) {
            return $query->whereDate('created_at', $request->date);
        }, function ($query) use ($todaysDate) {
            $query->where('created_at', $todaysDate);
        })
            ->when($request->status != NULL, function ($query) use ($request) {
                return $query->where('status_message', $request->status);
            })->paginate(5);
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

    public function statusUpdate($id, Request $request)
    {
        $order_view = Order::where('id', $id)->first();
        if ($order_view) {
            $order_view->update([
                'status_message' => $request->status_message,
            ]);
            return back()->with('status', 'Order Status Updated Successfully');
        } else {
            return back()->with('status', 'Id Not Found');
        }
    }
}
