<?php


namespace App\Http\Services\Product;


use App\Models\Product;

class ProductService
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return Product::select('id','SKU', 'name','description' , 'price', 'stock',
        'image', 'ebook_link', 'product_type_id')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
            $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('status', 1)
            ->with('producttype')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::select('id','SKU', 'name','description' , 'price', 'stock',
                        'image', 'ebook_link', 'product_type_id')
            ->where('status', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
