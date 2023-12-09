<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use DB;

class CartController extends Controller
{
    public function showUserCart()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $userId = Auth::user()->id;

            $cartProducts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->select('products.name', 'products.price', 'carts.quantity')
                ->where('carts.user_id', $userId)
                ->get();
                //dd($cartProducts);
            if ($cartProducts->isEmpty()) {
                return view('cartshow', ['cartProducts' => null]); // Trả về view với biến cart rỗng
            }
            return view('cartshow', compact('cartProducts'));
        }
        else{
            // Nếu chưa đăng nhập, chưa có ID người dùng, trả về thông báo hoặc thực hiện xử lý khác
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show(cart $cart)
    {
        //
    }

    public function edit(cart $cart)
    {
        //
    }

    public function update(Request $request, cart $cart)
    {
        //
    }

    public function destroy(cart $cart)
    {
        //
    }
}
