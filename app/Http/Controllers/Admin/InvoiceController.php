<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderInvoiceMailable;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class InvoiceController extends Controller
{
    public function viewInvoice(int $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.invoice.view_invoice', compact('order'));
    }

    public function downloadInvoice(int $id)
    {
        $order = Order::findOrFail($id);
        $pdf = Pdf::loadView('admin.invoice.view_invoice', compact('order'));
        return $pdf->download('invoice' . now()->toDateString() . '.pdf');
    }

    public function sendOrderMail($id)
    {
        try {
            $order = Order::findOrFail($id);
            Mail::to("$order->email")->send(new OrderInvoiceMailable($order));
            return back()->with('status', 'Order Invoice successfully sent to' . $order->email);
        } catch (\Exception $err) {
            return back()->with('status', $err);
        }
    }
}
