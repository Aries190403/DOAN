<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class ProductTypeController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('admin.producttype.add',[
            'title' => 'Add Product Type' //name
        ]);
    }

    public function store(Request $request)
    {
        try{
            ProductType::create([
                'name' => (string)$request->input('name')
            ]);
            Session::flash('success', 'Complete Add Product Type');
        } catch(\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function list(ProductType $producttype)
    {
        $producttype = ProductType::withTrashed()->orderByDesc('id')->paginate(20);

        return view('admin.producttype.list', [
            'title' => 'List Product Types',
            'producttypes' => $producttype
        ]);
    }

    public function edit(ProductType $producttype)
    {
        return view('admin.producttype.edit', [
            'title' => 'Edit Product Type' . $producttype->name,
            'producttype' => $producttype
        ]);
    }

    public function update(ProductType $producttype, UpdateProductTypeRequest $request)
    {
        $producttype->name = (string)$request->input('name');
        $producttype->save();

        Session::flash('success', 'Edit Product Type Complete');

        return redirect('/admin/producttypes/list');
    }

    public function destroy(Request $request)
    {
        $id = (int)$request->input('id');
        $producttype = ProductType::where('id', $id)->first();

        if ($producttype) {
            $producttype->delete();
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
