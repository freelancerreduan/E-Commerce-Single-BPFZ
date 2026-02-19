<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Post::with('category')->where('status', 'publish')->orderBy('id', 'DESC')->get();
        return view('admin.post.index', compact('datas'));
    }
    public function draftPost()
    {
        $datas = Post::with('category')->where('status', 'draft')->orderBy('id', 'DESC')->get();
        return view('admin.post.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->orderBy('category_name', 'DESC')->get();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string | max:255 | unique:posts,title',
            'status' => 'required',
            'category_id' => 'required | numeric',
            'image' => 'required | image | mimes:jpg,png,jpeg',
            'description' => 'required',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);

        $file = $request->file('image');
        $filaName = time().'-image.'.$file->getClientOriginalExtension();
        $path = 'uploads/';
        $request->image->move($path, $filaName);
         Post::insert([
            'category_id' => number_format($request->category_id),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $path.$filaName,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->orderBy('category_name', 'DESC')->get();
        return view('admin.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::where('id', $id)->first();
        $request->validate([
            'title' => 'required | string | max:255 | unique:posts,title,'.$post->id.',id',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'image | mimes:jpg, png, jpeg',
            'description' => 'required',
        ], [
            'category_id.required' => 'The category field is required.'
        ]);

        if ($request->hasFile('image')) {
            unlink(base_path($post->image));
            $file = $request->file('image');
            $filaName = time().'-image.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->image->move($path, $filaName);

            $post->update([
                'image' => $path.$filaName,
            ]);
        }

        $post->update([
            'category_id' => number_format($request->category_id),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'status' => $request->status
        ]);
        return redirect()->route('post.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::where('id', $id)->first();
        unlink(base_path($post->image));
        $post->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
