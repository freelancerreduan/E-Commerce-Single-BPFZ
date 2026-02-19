<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $datas = Feedback::latest()->get();
        return view('admin.feedback.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.feedback.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required | image | mimes:jpg,png,jpeg,webp',
        ]);

        $images = $request->image;
        foreach ($images as $singleImage) {
            $imgName = time().Str::random(5).'-feedback.'.$singleImage->getClientOriginalExtension();
            $path = 'uploads/';
            $singleImage->move($path, $imgName);
            Feedback::insert([
                'image' => $path.$imgName,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        return abort(404);
    }

    public function update(Request $request, $id)
    {
        return abort(404);
    }


    public function destroy(string $id)
    {
        $data = Feedback::where('id', $id)->first();
        unlink(base_path($data->image));
        $data->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
