<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function create()
    {
        return view('admin.coupon.add', [
            'title' => 'Add Coupon'
        ]);
    }

    public function store( StoreCouponRequest $request)
    {
        try{
            $request->except('_token');
            Coupon::create($request->all());

            Session::flash('success', 'Complete Add Coupon');
        } catch(\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function list()
    {
        $coupons = Coupon::withTrashed()->orderByDesc('id')->paginate(20);
        return view('admin.coupon.list', [
            'title' => 'Coupon List',
            'coupons' => $coupons
        ]);
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', [
            'title' => 'Edit Coupon',
            'coupon' => $coupon,
        ]);
    }

    public function update(Coupon $coupon, UpdateCouponRequest $request)
    {
        try {
            $coupon->fill($request->input());
            $coupon->save();
            Session::flash('success', 'Complete Update');
        } catch (\Exception $err) {
            Session::flash('error', 'Error Update');
            return redirect()->back()->withInput();
        }

        return redirect('/admin/coupons/list');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');

        $coupon = Coupon::find($id);
        if ($coupon) {
            if ($coupon->delete()) {
                return response()->json([
                    'error' => false,
                    'message' => 'Complete Delete'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Failed to soft delete coupon'
                ]);
            }
        }

        return response()->json([
            'error' => true,
            'message' => 'coupon not found'
        ]);
    }
}
