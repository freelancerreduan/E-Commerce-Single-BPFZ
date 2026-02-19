<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserHomeController extends Controller
{
    public function index () {
        return view('user.index');
    }


    public function storeReview(Request $request) {
        $request->validate([
            'rate' => 'required',
            'review' => 'required',
            'product_id' => 'required'
        ]);

        Review::insert([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'review' => $request->review,
            'rating' => $request->rate,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Review submited Successfully.');
    }

    public function edit() {
        return view('user.edit-account');
    }

    public function update(Request $request) {
        $user = User::where('id', auth()->user()->id)->first();
        $request->validate([
            'name' => 'required | string | max:255',
            'email' => 'required | email | unique:users,email,'.$user->id.',id',
            'avatar' => 'image | mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('avatar')) {
            $arr = explode('/', auth()->user()->avatar);
            $img = end($arr);
            if ($img != 'avatar.png') {
                unlink(base_path(auth()->user()->avatar));
            }
            $file = $request->file('avatar');
            $fileName = time().'-avatar.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->avatar->move($path, $fileName);

            $user->update([
                'avatar' => $path.$fileName
            ]);
        }
        $user->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'email' => $request->email
        ]);;

        return back()->with('success', 'Updated successfully');
    }


    public function password() {
        return view('user.password');
    }


    public function passwordUpdate(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required | string | min:6 | max:32 | confirmed'
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Updated Successfully');
        }else{
            return back()->with('notMatch', 'Current password not match');
        }
    }
}
