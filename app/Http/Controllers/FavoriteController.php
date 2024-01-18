<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use DB;

class FavoriteController extends Controller
{
    public function addFavorite($productId)
    {
        $favorites = Session::get('favorites', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong danh sách yêu thích chưa
        $existingProduct = array_search($productId, array_column($favorites, 'id'));

        if ($existingProduct === false) {
            $products = DB::table('products')
            ->select(DB::raw('id, name, image, price'))
            ->where('id', '=', $productId)
            ->get();

            // dd($products);
            // Thêm sản phẩm vào danh sách yêu thích
            $favorites[] = [
                'id' => $products[0]->id,
                'image' => $products[0]->image,
                'fullName' => $products[0]->name,
                'price' => $products[0]->price,
            ];
            Session::put('favorites', $favorites);
        }

        return redirect()->back();
    }

    public function removeFavorite($productId)
    {
        $favorites = Session::get('favorites', []);

        // Tìm vị trí của sản phẩm trong danh sách yêu thích
        $index = array_search($productId, array_column($favorites, 'id'));

        if ($index !== false) {
            // Xóa sản phẩm khỏi danh sách yêu thích
            array_splice($favorites, $index, 1);
            Session::put('favorites', $favorites);
        }

        return redirect()->back();
    }
    public function showFavorites()
    {
        $favorites = Session::get('favorites', []);
        // dd($favorites); 
        return view('favorites', ['favorites' => $favorites],['title'=>'checkout']);
    }
}
