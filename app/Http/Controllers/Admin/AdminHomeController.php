<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index() {
        return view('admin.index',[
            'allProduct' => Product::count(),
            'totalCategories' => Category::count(),
            'totalBlogs' => Post::count(),
            'totalOrder' => Order::count(),
            'totalPendingOrder' => Order::where('status', 'pending')->count(),
            'totalConfirmedOrder' => Order::where('status', 'confirmed')->count(),
            'totalRejectedOrder' => Order::where('status', 'rejected')->count(),
            'totalCancelOrder' => Order::where('status', 'cancel')->count(),
            'totalReturnOrder' => Order::where('status', 'return')->count(),
            'totalCompletedOrder' => Order::where('status', 'completed')->count(),
        ]);
    }

    public function editHomeBanner() {
        return view('admin.banner');
    }

    public function updateHomeBanner(Request $request) {
        $request->validate([
            'link' => 'required | string | url',
            'banner' => 'image | mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('banner')) {
            $arr = explode('/', setting()->home_banner);
            $img = end($arr);

            if ($img != 'banner.png') {
                unlink(base_path(setting()->home_banner));
            }
            $file = $request->file('banner');
            $fileName = time().'-banner-image.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->banner->move($path, $fileName);

            setting()->update([
                'home_banner' => $path.$fileName
            ]);
        }

        setting()->update([
            'banner_link' => $request->link
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    public function announcement() {
        return view('admin.announcement');
    }

    public function announcementUpdate(Request $request) {
        $request->validate([
            'announcement' => 'required | string | max:255',
            'status' => 'required | string | max:3',
        ]);

        setting()->update([
            'announcement' => $request->announcement,
            'announcement_status' => $request->status
        ]);

        return back()->with('success', 'Updated Successfully.');
    }
}
