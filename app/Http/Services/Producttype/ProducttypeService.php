<?php


namespace App\Http\Services\Producttype;


use App\Models\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProducttypeService
{
    public function getId($id)
    {
        return ProductType::where('id', $id)->where('status', 1)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
        $query = $menu->product()
            ->select('id', 'name', 'price', 'image')
            ->where('status', 1);

        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}
