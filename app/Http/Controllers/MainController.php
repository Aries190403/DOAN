<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductType;
use Illuminate\Http\Request;


use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

class MainController extends Controller
{
    protected function fixImage(Product $p)
    {
        // Lấy tất cả các hình ảnh từ bảng product_images dựa trên $p->id
        $images = ProductImage::where('product_id', $p->id)->pluck('image_path')->toArray();

        $imageUrls = [];

        foreach ($images as $image) {
            $fullImagePath = public_path("storage/upload/product/{$image}");

            if (file_exists($fullImagePath)) {
                $imageUrls[] = asset("storage/upload/product/{$image}");
                // var_dump($imageUrls);
            } else {
                $imageUrls[] = asset("image/No-Image-Placeholder.svg (1).png");
            }
        }

        $p->image = $imageUrls;
    }




    // public function index()
    // {
    //     $productType = ProductType::all();
    //     $lst = Product::all();
    //     foreach ($lst as $p) {
    //         $this->fixImage($p);
    //     }
    //     return view('home', [
    //         'title' => 'Home', 'lst' => $lst, 'productType' => $productType
    //     ]);
    // }
    public function index()
    {
        $productType = ProductType::all();
        $lst = Product::all();
        foreach ($lst as $p) {
            $this->fixImage($p);
        }

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

            Session::put('cart', $cartProducts);
            // dd(Session::get('cart'));
            return view('home', [
                'title' => 'Home', 'lst' => $lst, 'productType' => $productType, 'cartProducts' => $cartProducts
            ]);
        } else {
            return view('home', [
                'title' => 'Home', 'lst' => $lst, 'productType' => $productType
            ]);
        }
    }


    public function show(Request $request, Product $product)
    {
        $this->fixImage($product);
        if ($request->expectsJson()) {
            return $product;
        }
        return view('product-show', ['title' => 'Product', 'p' => $product]);
    }
    public function showCart()
    {
            $cartProducts="";
            return view('header', ['cartProducts' => $cartProducts]);
    }
}
