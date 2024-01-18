<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Services\Producttype\ProducttypeService;

class ProducttypeController extends Controller
{

    protected $producttypeService;

    public function __construct(ProducttypeService $producttypeService)
    {
        $this->producttypeService = $producttypeService;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $producttype = $this->producttypeService->getId($id);
        $products = $this->producttypeService->getProduct($producttype, $request);

        return view('producttype',[
            'title' => $producttype->name,
            'products' => $products,
            'producttype' => $producttype
        ]);
    }
}
