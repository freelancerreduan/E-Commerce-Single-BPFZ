<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required | string | unique:categories',
            'use_menu' => 'required'
        ]);


        Category::insert([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'useMainMenu' => $request->use_menu,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $data = Category::where('id', $id)->first();
        return view('admin.categories.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Category::where('id', $id)->first();
        $request->validate([
            'category_name' => 'required | string | unique:categories,category_name,'.$data->id.',id',
            'use_menu' => 'required'
        ]);


        $data->update([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'useMainMenu' => $request->use_menu,
        ]);
        return redirect()->route('category.index')->with('success', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $category = Category::where('id', $id)->first();
        Product::where('category_id', $category->id)->delete();
        SubCategory::where('category_id', $category->id)->delete();
        $category->delete();
        return back()->with('success', 'Deleted Successfully.');

    }
}
