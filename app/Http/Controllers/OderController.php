<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
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
            $voucher = session('voucher');
            $voucherdata = NULL;
            $idvoucher = NULL;
            // Tính tổng giá tiền
            $totalAmount = 0;
            
            foreach ($productData as $product) {
                if(Product::find($product->id)->stock < $product->quantity){
                    return redirect()->back()->with('error', "Sản phẩm $product->name đã hết hàng.");
                }
                $totalAmount += $product->price * $product->quantity;
            }
            if($voucher != NULL){
                $voucherdata = DB::table('coupons')
                ->where('code', $voucher)
                ->first();
                DB::table('coupons')
                    ->where('code', $voucher)
                    ->update([
                        'times_used' => DB::raw('times_used + 1'),
                        'is_active' => DB::raw('is_active - 1'),]);

                $totalAmount = $totalAmount - ($totalAmount * $voucherdata->discount / 100);
                $idvoucher = $voucherdata->id;
            }

            $address= $request->input('diachi');

            if($address==NULL){
                $address = Auth::user()->address;
            }
            // dd($address,  $idvoucher);
            // Thêm vào bảng invoices
            $invoice = Invoice::create([
                'invoice_date' => Carbon::now(),
                'address' => $address,
                'phone' => $userData[0]->phoneNumber,
                'total' => $totalAmount,
                'coupon_id' => $idvoucher,
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
                DB::table('products')
                    ->where('id', $product->id)
                    ->update(['stock' => DB::raw("stock - $product->quantity")]);
            }
            session()->forget('productsData');
            session()->forget('voucher');
            Cart::where('user_id', $userId)->delete();
            return redirect()->route('home')->with('success', 'Đã tạo hóa đơn thành công');
        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thanh toán.');
        }
    }
}
