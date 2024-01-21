<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderUserController extends Controller
{
    // public function list()
    // {
    //     $user = Auth::user();

    //     if ($user) {
    //         // Lấy danh sách ID của các hóa đơn mà người dùng đã có
    //         $invoiceIds = Invoice::where('user_id', $user->id)
    //             ->pluck('id')
    //             ->toArray();
    //             // dd($invoiceIds);
    //         // Lấy thông tin chi tiết hóa đơn có invoice_id trong danh sách trên
    //         $invoicedetails = InvoiceDetail::with(['product' => function ($query) {
    //             $query->select('id', 'name', 'image');
    //         }])
    //             ->whereIn('invoice_id', $invoiceIds)
    //             ->get();

    //         return view('auth.order', [
    //             'title' => 'Your Orders',
    //             'invoicedetails' => $invoicedetails,
    //         ]);
    //     }

    //     return redirect()->route('login')->with('error', 'You must login to see your orders');
    // }

    public function list()
    {
        $user = Auth::user();

        if ($user) {
            $invoices = Invoice::where('user_id', $user->id)->orderByDesc('id')->get();

            return view('auth.listorder', [
                'title' => 'Your Order List',
                'invoices' => $invoices,
            ]);
        }

        return redirect()->route('login')->with('error', 'You must login to see your orders');
    }

    public function vieworder($invoiceid)
    {
        return view('auth.order', [
            'title' => 'Detail Order',
            'invoicedetail' => InvoiceDetail::where('invoice_id', $invoiceid)->get(),
            'invoicedetails' => InvoiceDetail::with(['product' => function ($query) {
                $query->select('id', 'name', 'image');
            }])->where('invoice_id', $invoiceid)->get(),
        ]);
    }

    public function updateStatus(Request $request, $invoice)
    {
        $user = Auth::user();

        if ($user) {
            // Lấy thông tin hóa đơn của người dùng đang đăng nhập
            $invoice = Invoice::where('user_id', $user->id)
                ->where('id', $invoice)
                ->first();

            if ($invoice) {
                // Kiểm tra trạng thái từ request và cập nhật vào cơ sở dữ liệu
                $status = $request->input('status');

                if ($status === 'cancel') {
                    $invoice->status = 0; // Hủy đơn
                } elseif ($status === 'received') {
                    $invoice->status = 3; // Đã nhận

                    if ($invoice->invoiceDetails) {
                        foreach ($invoice->invoiceDetails as $invoicedetail) {
                            // Update the product stock
                            $product = $invoicedetail->product;
                            $product->stock -= $invoicedetail->quantity;
                            $product->save();
                        }
                    }
                }

                $invoice->save();

                return redirect()->back()->with('success', 'Trạng thái đã được cập nhật.');
            }

            return redirect()->route('login')->with('error', 'You are not authorized to update this order status.');
        }

        return redirect()->route('login')->with('error', 'You must login to update order status.');
    }
}
