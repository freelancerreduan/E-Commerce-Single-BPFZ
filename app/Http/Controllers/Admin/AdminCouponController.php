<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    public function index()
    {
        $datas = Coupon::latest()->get();
        return view('admin.coupon.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string | unique:coupons,coupon_name',
            'discount' => 'required | numeric | min:1 | max:99',
            'end_date' => 'required | after:today'
        ]);


        Coupon::insert([
            'coupon_name' => $request->name,
            'discount' => $request->discount,
            'end_date' => $request->end_date,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = Coupon::where('id', $id)->first();
        return view('admin.coupon.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Coupon::where('id', $id)->first();
        $request->validate([
            'name' => 'required | string | unique:coupons,coupon_name,'.$data->id.',id',
            'discount' => 'required | numeric | min:1 | max:99',
            'end_date' => 'required | after:today'
        ]);


        $data->update([
            'coupon_name' => $request->name,
            'discount' => $request->discount,
            'end_date' => $request->end_date
        ]);
        return redirect()->route('coupon.index')->with('success', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        //
    }
}
