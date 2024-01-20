<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Http\Services\Product\ProductService;
use App\Models\Comment;
use App\Models\ProductImage;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index($id = '')
    {
        $product = $this->product->show($id);
        $productsMore = $this->product->more($id);
        $cmts = Comment::where('product_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Eager load mối quan hệ productimages
        $product->load('productimages');

        // Eager load mối quan hệ productimages
        $product->load('productimages');

        return view('products.detail', [
            'title' => $product->name,
            'product' => $product,
            'cmts' => $cmts,
            'products' => $productsMore,
            'producttypes' => ProductType::select('id', 'name')->where('status', 1)->get(),
        ]);
    }
}
