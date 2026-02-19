<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderControler extends Controller
{
    public function index() {
        $orders = Order::where('user_id', auth()->user()->id)->latest()->get();
        return view('user.order.index', compact('orders'));
    }


    public function show($invoiceId) {
        $order = Order::where([['invoice_id', $invoiceId], ['user_id', auth()->user()->id]])->first();
        $billing = Billing::with('district')->where('order_id', $order->id)->first();
        return view('user.order.show', compact('order', 'billing'));
    }
}
