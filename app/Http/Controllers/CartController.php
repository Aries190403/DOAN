<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

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
                ->select(
                    'products.name',
                    'products.price',
                    'carts.quantity',
                    'products.id',
                    DB::raw('(SELECT image_path FROM product_images WHERE product_images.product_id = products.id LIMIT 1) AS image_path')
                )
                ->where('carts.user_id', $userId)
                ->get();
                //dd($cartProducts);
            if ($cartProducts->isEmpty()) {
                return view('cartshow', ['cartProducts' => null]); // Trả về view với biến cart rỗng
            }
            // Session::put('cart', $cartProducts);
            // dd(Session::get('cart'));
            return view('cartshow', compact('cartProducts'));
        }
        else{
            // Nếu chưa đăng nhập, chưa có ID người dùng, trả về trang đăng nhập
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }
    }

    public function addcart($productId)
    {
        $quantity = 1;
        // Kiểm tra người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $userId = Auth::user()->id;
            //dd($userId,$productId,$quantity);
    
            // Kiểm tra sản phẩm đã có trong giỏ hàng của người dùng chưa
            $existingCartItem = Cart::where('user_id', $userId)
                                    ->where('product_id', $productId)
                                    ->first();
    
            if ($existingCartItem) {
                // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, tạo một mục mới
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
            }
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng.');
        } else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }
    }
    
    public function deletecart($productId, $quantity)
    {
        // Kiểm tra người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            $userId = Auth::user()->id;
            //dd($userId,$productId,$quantity);
            if($quantity>1){

                // Kiểm tra sản phẩm đã có trong giỏ hàng của người dùng chưa
                $existingCartItem = Cart::where('user_id', $userId)
                                        ->where('product_id', $productId)
                                        ->first();

                if ($existingCartItem) {
                    // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
                    $existingCartItem->quantity = $quantity-1;
                    $existingCartItem->save();
                    return redirect()->back()->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng.');
                }
            }

            else{
                DB::table('carts')
                ->where('user_id', $userId)
                ->where('product_id', $productId)
                ->delete();
                return redirect()->back()->with('success', 'Đã xoá sản phẩm khỏi giỏ hàng.');
            }
        } 
        else {
            return redirect()->route('login')->with('message', 'Vui lòng đăng nhập để thêm/xoá sản phẩm vào giỏ hàng.');
        }   
    }
}
