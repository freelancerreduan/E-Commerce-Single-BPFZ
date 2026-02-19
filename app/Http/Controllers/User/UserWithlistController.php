<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserWithlistController extends Controller
{
    public function index() {
        $datas = Wishlist::with('product')->where('user_id', auth()->user()->id)->get();
        return view('user.wishlist', compact('datas'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required'
        ]);
        $wishlist = Wishlist::where([['user_id', auth()->user()->id], ['product_id', $request->product_id]])->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json('removed');
        }else{
            Wishlist::insert([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'created_at' => Carbon::now()
            ]);
            return response()->json('added');
        }
    }

    public function delete($id) {
        $id = Crypt::decrypt($id);
        $data = Wishlist::where([['id', $id], ['user_id', auth()->user()->id]])->first();
        if (!$data) {
            return back()->with('error', 'Undifined product.');
        }

        $data->delete();
        return back()->with('success', 'Successfully Removed form  wishlist.');
    }
}
