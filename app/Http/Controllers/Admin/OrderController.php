<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.list', [
            'title' => 'Order List',
            'invoices' => Invoice::with('user')->orderByDesc('id')->paginate(15)
        ]);
    }

    public function detail( $invoiceid)
    {
        return view('admin.order.detail', [
            'title' => 'Detail Order',
            'invoicedetail' => InvoiceDetail::where('invoice_id', $invoiceid)->get(),
            'invoicedetails' => InvoiceDetail::with(['product' => function ($query) {
                $query->select('id', 'name', 'image');
            }])->where('invoice_id', $invoiceid)->get(),
        ]);
    }


    public function update(Invoice $invoice, UpdateInvoiceRequest $request)
    {
        if ($invoice->status == 1) {
            $invoice->update(['status' => 2]);

            Session::flash('success', 'Success Update Order');
            return redirect('admin/orders/list');
        }else {
            Session::flash('error', 'Error Update Order');
            return redirect('admin/orders/list');
        }
    }
}
