<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\PaymentGetway;
use App\Models\Product;
use App\Models\Size;
use App\Models\Upazila;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserCheckoutController extends Controller
{
    public function create() {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $getways = PaymentGetway::all();
        $divisions = Division::select(['id', 'name'])->get();
        if (count($carts) < 1) {
            return redirect()->route('frontend.index');
        }
        return view('user.checkout.create', compact('carts', 'getways', 'divisions'));
    }

    public function getDistrict(Request $request) {
        $districts = District::where('division_id', $request->divisionId)->select(['id', 'name'])->get();
        return view('user.layouts.partials.get-district', compact('districts'));
    }

    public function gettThana(Request $request) {
        $thanas = Upazila::where('district_id', $request->districtId)->select(['id', 'name'])->get();
        return view('user.layouts.partials.get-thana', compact('thanas'));
    }


    public function store(Request $request) {
        $request->validate([
            'name' => 'required | string | max:255',
            'phone' => 'required | string | min:11 | max:11',
            'division' => 'required | numeric',
            'district' => 'required | numeric',
            'thana' => 'required | numeric',
            'full_address' => 'required | string | max:255',

            'carts.*' =>'required',

            'getway_id' => 'required | numeric',
            'amount' => 'required | numeric | min:1',
            'sender_number' => 'required | string | min:11 | max:11',
            'transaction_id' => 'required | string | max:255',

            'sub_total' => 'required',
            'discount' => 'required',
            'coupon_name' => 'required',
            'shipping' => 'required',
            'total' => 'required',
        ]);
        $invoice = random_int(00000000, 99999999);
        $orderId = Order::insertGetId([
            'user_id' => auth()->user()->id,
            'sub_total' => $request->sub_total,
            'discount' => $request->discount,
            'coupon_name' => $request->coupon_name,
            'shipping' => $request->shipping,
            'total' => $request->total,
            'invoice_id' => $invoice,
            'created_at' => Carbon::now()
        ]);

        Billing::insert([
            'order_id' => $orderId,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'division_id' => $request->division,
            'district_id' => $request->district,
            'thana_id' => $request->thana,
            'full_address' => $request->full_address,
            'addition_info' => $request->order_comments,
            'created_at' => Carbon::now()
        ]);

        $carts = $request->carts;
        foreach ($carts as $key => $cartId) {
            $cart = Cart::where([['id', $cartId], ['user_id', auth()->user()->id]])->first();
            $varient = Size::where('id', $cart->size_id)->first();

            if ($varient->stock < $cart->quantity) {
                return back()->with('error', 'Stock not available.');
            }

            OrderItem::insert([
                'order_id' => $orderId,
                'product_id' => $cart->product_id,
                'size_id' => $cart->size_id,
                'qty' => $cart->quantity,
                'created_at' => Carbon::now()
            ]);
            $varient->decrement('stock', $cart->quantity);
            $cart->delete();
        }

        Payment::insert([
            'order_id' => $orderId,
            'getway_id' => $request->getway_id,
            'sender_number' => $request->sender_number,
            'trx_id' => $request->transaction_id,
            'amount' => $request->amount,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('frontend.index')->with('success', 'Order Submited Successfully');
    }
}
