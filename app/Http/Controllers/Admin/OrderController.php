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


    public function update($invoiceid)
    {
        try {
            $invoice = Invoice::findOrFail($invoiceid);
            $invoice->update(['status' => '2']);

            Session::flash('success', 'Success Confirm Order');
            return redirect('admin/orders/list');
        }catch(\Exception $error) {
            Session::flash('error', 'Error Confirm Order');
            return redirect('admin/orders/list');
        }
    }
}
