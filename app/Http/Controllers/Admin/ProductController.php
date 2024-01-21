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

class ProductController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.product.add',[
            'title' => 'Add Product ',
            'producttypes' => ProductType::where('status', 1)->get()
        ]);
    }

    public function store(Request $request)
    {
        try{
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Complete Add Product');
        } catch(\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function list()
    {
        $products = Product::with('producttype')->orderByDesc('product_type_id')->paginate(10);
        $deletedProducts = Product::onlyTrashed()->orderByDesc('id')->get();

        return view('admin.product.list', [
            'title' => 'List Product',
            'products' => $products,
            'allProducts' => $products->merge($deletedProducts) //sử dụng hàm merge() để kết hợp cả hai bộ sản phẩm (đã xóa và chưa xóa) thành một bộ duy nhất
        ]);
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Edit Product: ' . $product->name,
            'product' => $product,
            'producttypes' => ProductType::where('status', 1)->get(),
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
        $id = $request->input('id');

        $product = Product::find($id);
        if ($product) {
            if ($product->delete()) {
                return response()->json([
                    'error' => false,
                    'message' => 'Complete Delete'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed to soft delete product'
                ]);
            }
        }

        return response()->json([
            'error' => true,
            'message' => 'product not found'
        ]);
    }
}
