<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use DB;

class OderController extends Controller
{
    public function CreateIncvoice(Request $request){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $productData = session('productsData');
            $userData = session('user');

            // Tính tổng giá tiền
            $totalAmount = 0;
            foreach ($productData as $product) {
                // dd($product);
                $totalAmount += $product->price * $product->quantity;
            }
            //dd($productData);
            // Thêm vào bảng invoices
            $invoice = Invoice::create([
                'invoice_date' => Carbon::now(),
                'address' => $userData[0]->address,
                'phone' => $userData[0]->phoneNumber,
                'total' => $totalAmount,
                'status' => 1,
                'user_id' => $userId,
            ]);

            // Thêm vào bảng invoice_details
            foreach ($productData as $product) {
                //dd($product->quantity);
                InvoiceDetail::create([
                    'quantity' => $product->quantity,
                    'unit_price' => $product->price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'invoice_id' => $invoice->id,
                    'product_id' => $product->id,
                    'combo_id' => null,
                ]);
            }
            session()->forget('productsData');
            Cart::where('user_id', $userId)->delete();
            return redirect()->route('home')->with('success', 'Đã tạo hóa đơn thành công');
        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thanh toán.');
        }
    }
}
