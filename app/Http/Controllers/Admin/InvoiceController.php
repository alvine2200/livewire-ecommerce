<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
}
