<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserCartController extends Controller
{
    public function index() {
        $datas = Cart::with('product', 'sizeRelation')->where('user_id', auth()->user()->id)->get();
        if (count($datas) < 1) {
            return redirect()->route('frontend.index')->with('error', 'Please shop here first');
        }
        $couponName =  "";
        $discount = 0;
        if (isset($_GET['coupon_name']) && $_GET['coupon_name'] != '') {
            $coupon = Coupon::where('coupon_name', $_GET['coupon_name'])->first();
            if (!$coupon) {
                $couponName =  "";
                $discount = 0;
                return back()->with('error', 'Coupon dose not match.');
            }
            if ($coupon->end_data > Carbon::now()) {
                $couponName =  "";
                $discount = 0;
                return back()->with('error', 'This Coupon is expired.');
            }
            $couponName =  $coupon->coupon_name;
            $discount = $coupon->discount;


        }




        return view('user.cart.index', compact('datas', 'couponName', 'discount'));
    }

    public function store(Request $request) {
        $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
            'size_id' => 'required',
            'size' => 'required',
        ]);

        $cart = Cart::where([['user_id', auth()->user()->id], ['product_id', $request->product_id]])->first();

        if ($cart) {
            $cart->update([
                'size_id' => $request->size_id,
                'size' => $request->size,
            ]);
            $cart->increment('quantity', $request->quantity);
        }else{
            Cart::insert([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success', 'Product was successfully added to your cart.');
    }


    public function update(Request $request) {
        foreach ($request->carts as $cartId=>$quantity) {
            $cart = Cart::where([['id', $cartId], ['user_id', auth()->user()->id]])->first();
            $cart->update([
                'quantity' => $quantity
            ]);
        }
        return back()->with('success', 'Updated Successfully.');
    }

    public function delete($id) {
        $id = Crypt::decrypt($id);
        $cart = Cart::where([['id', $id], ['user_id', auth()->user()->id]])->first();
        $cart->delete();
        return back()->with('success', 'Items deleted successfully.');
    }


}
