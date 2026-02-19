<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function generalSetting () {
        return view('admin.setting.generalSetting ');
    }
    public function generalSettingUpdate (Request $request) {
        $request->validate([
            'site_name' => 'required | string | max:255',
            'author_name' => 'required | string | max:255',
            'author_image' => 'image | mimes:jpg,png,jpeg',
            'address' => 'required | string | max:255',
            'email' => 'required | email | max:255',
            'phone' => 'required | string | max:255',
            'fb_link' => 'required | string | url | max:255',
            'tw_link' => 'required | string | url | max:255',
            'ins_link' => 'required | string | url | max:255',
            'yt_link' => 'required | string | url | max:255',
            'tt_link' => 'required | string | url | max:255',
            'site_logo' => 'image | mimes:jpg,png,jpeg',
            'site_favicon' => 'image | mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('author_image')) {
            $arr1 = explode('/',setting()->author_image);
            $logo1 = end($arr1);
            if ($logo1 != 'avatar.png') {
                unlink(base_path(setting()->author_image));
            }
            $file1 = $request->file('author_image');
            $author_image = time().'-author-iamge.'.$file1->getClientOriginalExtension();
            $path1 = 'uploads/';
            $request->author_image->move($path1, $author_image);
            setting()->update([
                'author_image' => $path1.$author_image
            ]);
        }

        if ($request->hasFile('site_logo')) {
            $arr1 = explode('/',setting()->site_logo);
            $logo1 = end($arr1);
            if ($logo1 != 'default-logo-1.png') {
                unlink(base_path(setting()->site_logo));
            }
            $file1 = $request->file('site_logo');
            $fileName1 = time().'-logo.'.$file1->getClientOriginalExtension();
            $path1 = 'uploads/';
            $request->site_logo->move($path1, $fileName1);
            setting()->update([
                'site_logo' => $path1.$fileName1
            ]);
        }
        if ($request->hasFile('site_favicon')) {
            $arr3 = explode('/',setting()->site_favicon);
            $logo3 = end($arr3);
            if ($logo3 != 'default-favicon.png') {
                unlink(base_path(setting()->site_favicon));
            }
            $file3 = $request->file('site_favicon');
            $fileName3 = time().'-favicon.'.$file3->getClientOriginalExtension();
            $path3 = 'uploads/';
            $request->site_favicon->move($path3, $fileName3);
            setting()->update([
                'site_favicon' => $path3.$fileName3
            ]);
        }
        setting()->update([
            'site_name' => $request->site_name,
            'author_name' => $request->author_name,
            'fb_link' => $request->fb_link,
            'tw_link' => $request->tw_link,
            'ins_link' => $request->ins_link,
            'yt_link' => $request->yt_link,
            'tt_link' => $request->tt_link,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    public function metaSetting() {
        return view('admin.setting.metaSetting');
    }

    public function metaSettingUpdate(Request $request) {
        $request->validate([
            'site_title' => 'required | string | max:60',
            'meta_title' => 'required | string | max:60',
            'meta_description' => 'required | string | max:160',
            'meta_keyword' => 'required | string | max:255',
            'focus_keyword' => 'required | string | max:255',
        ]);

        setting()->update([
            'site_title' => $request->site_title,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'focus_keyword' => $request->focus_keyword,
        ]);
        return back()->with('success', 'Updated Successfully');
    }
}
