<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index() {
        return view('admin.profile.index');
    }


    public function edit() {
        return view('admin.profile.edit');
    }

    public function remove() {
        $user = User::where('id', auth()->user()->id)->first();
        $arr = explode('/', $user->avatar);
        $img = end($arr);
        if ($img != 'avatar.png') {
            unlink(base_path($user->avatar));
        }
        $user->update([
            'avatar' => 'uploads/avatar.png'
        ]);
        return back();
    }

    public function update(Request $request) {
        $user = User::where('id', auth()->user()->id)->first();
        $request->validate([
            'name' => 'required | string | max:255',
            'avatar' => 'image | mimes:jpg,png,jpeg',
            'email' => 'required | email | unique:users,email,'.$user->id.',id',
        ]);
        if ($request->hasFile('avatar')) {
            $arr = explode('/', $user->avatar);
            $img = end($arr);
            if ($img != 'avatar.png') {
                unlink(base_path($user->avatar));
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
            'title' => $request->title,
            'about' => $request->about,
            'country' => $request->country,
            'address' => $request->address,
            'phone' => $request->phone,
            'twitter_link' => $request->twitter_link,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'linkedin_link' => $request->linkedin_link,
            'github_link' => $request->github_link,
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    public function password() {
        return view('admin.profile.password');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required | string | min:6 | max:32 | confirmed'
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('success', 'Updated Successfully');
        }else{
            return back()->with('notMatch', 'Current password not match');
        }
    }

}
