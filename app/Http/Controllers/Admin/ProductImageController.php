<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function create()
    {
        return view('admin.productimage.add', [
            'title' => 'Add Product Image',
            'products' => Product::where('status', 1)->get(),
        ]);
    }

    public function store(StoreProductImageRequest $request)
    {
        try{
            ProductImage::create([
                'image_path' => (string)$request->input('image_path'),
                'status' => (string)$request->input('status'),
                'product_id' => (string)$request->input('product_id')
            ]);

            Session::flash('success', 'Complete Add Product Image');
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function list()
    {
        $productimages = ProductImage::with('product')->orderByDesc('product_id')->paginate(10);
        $deletedProductimages = ProductImage::onlyTrashed()->orderByDesc('id')->get();
        return view('admin.productimage.list', [
            'title'=>'List Product Images',
            'productimages' => $productimages,
            'allProductimage' => $productimages->merge($deletedProductimages)
        ]);
    }

    public function search(Request $request)
    {
        $productimages = ProductImage::with('product')->orderByDesc('product_id')->paginate(10);

        $searchTerm = $request->input('search');

        // Tìm kiếm sản phẩm theo tên sản phẩm.
        $result = ProductImage::whereHas('product', function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%$searchTerm%");
        })
        ->orWhere('status', 'like', "%$searchTerm%")
        ->paginate(10);

        return view('admin.productimage.list', [
            'title' => "Search Result For: $searchTerm",
            'allProductimage' => $result,
            'productimages' => $productimages,
        ]);
    }

    public function edit(ProductImage $productimage)
    {
        return view('admin.productimage.edit', [
            'title' => 'Edit Product Image: ',
            'productimage' => $productimage,
            'products' => Product::where('status', 1)->get(),
        ]);
    }

    public function update(UpdateProductImageRequest $request, ProductImage $productimage)
    {
        try{
            $productimage->fill($request->input());
            $productimage->save();

            Session::flash('success', 'Success Update Product Image');
        }catch(\Exception $err)
        {
            Session::flash('error', 'Error Update Product Image');

            return redirect()->back()->withInput();
        }
        return redirect('admin/productimages/list');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        $productimage = ProductImage::find($id);
        if ($productimage) {
            if ($productimage->delete()) {
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
            'message' => 'product image not found'
        ]);
    }
}
