<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function pending() {
        $datas = Order::with('user')->where('status', 'pending')->orderBy('created_at', 'DESC')->get();
        return view('admin.order.orders', compact('datas'));
    }
    public function confirmed() {
        $datas = Order::with('user')->where('status', 'confirmed')->orderBy('created_at', 'DESC')->get();
        return view('admin.order.orders', compact('datas'));
    }
    public function rejected() {
        $datas = Order::with('user')->where('status', 'rejected')->orderBy('created_at', 'DESC')->get();
        return view('admin.order.orders', compact('datas'));
    }
    public function canceled() {
        $datas = Order::with('user')->where('status', 'canceled')->orderBy('created_at', 'DESC')->get();
        return view('admin.order.orders', compact('datas'));
    }
    public function return() {
        $datas = Order::with('user')->where('status', 'return')->orderBy('created_at', 'DESC')->get();
        return view('admin.order.orders', compact('datas'));
    }
    public function completed() {
        $datas = Order::with('user')->where('status', 'completed')->orderBy('created_at', 'DESC')->get();
        return view('admin.order.orders', compact('datas'));
    }

    public function status(Request $request) {
        $order = Order::where('id', $request->orderId)->first();
        $order->update([
            'status' => $request->status,
        ]);
    }


}
