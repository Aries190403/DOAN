<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add Product ',
            'producttypes' => ProductType::where('deleted_at', NULL)->get()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Complete Add Product');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function list()
    {
        $products = Product::with('producttype')->orderByDesc('product_type_id')->paginate(15);

        return view('admin.product.list', [
            'title' => 'List Product',
            'products' => $products
        ]);
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Edit Product' . $product->name,
            'product' => $product,
            'producttypes' => ProductType::where('deleted_at', NULL)->get(),
        ]);
    }

    public function update(Product $product, UpdateProductRequest $request)
    {
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Complete Update');
        } catch (\Exception $err) {
            Session::flash('error', 'Error Update');
            Log::info($err->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect('/admin/products/list');
    }

    public function destroy(Request $request)
    {
        $id = (int)$request->input('id');
        $product = Product::where('id', $id)->first();

        if ($product) {
            $product->delete();
            return Response::json([
                'error' => false,
                'message' => 'Complete Delete'
            ]);
        }

        return Response::json([
            'error' => true
        ]);
    }
}
