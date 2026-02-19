<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminSubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->where([['subcategory_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->latest()->get();
        return view('admin.sub-categories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->get();
        return view('admin.sub-categories.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory_name' => 'required | string | max:255 | unique:sub_categories',
            'use_menu' => 'required',
        ]);


        SubCategory::insert([
            'category_id' => $request->category,
            'subcategory_name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
            'useMainMenu' => $request->use_menu,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Created Successfully');
    }

    public function edit($id)
    {
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->get();
        $data = SubCategory::where('id', $id)->first();
        return view('admin.sub-categories.edit', compact('categories', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data = SubCategory::where('id', $id)->first();
        $request->validate([
            'category' => 'required',
            'subcategory_name' => 'required | string | unique:sub_categories,subcategory_name,'.$data->id.',id',
            'use_menu' => 'required',
        ]);


        $data->update([
            'category_id' => $request->category,
            'subcategory_name' => $request->subcategory_name,
            'slug' => Str::slug($request->subcategory_name),
            'useMainMenu' => $request->use_menu,
        ]);
        return redirect()->route('subcategory.index')->with('success', 'Updated Successfully');
    }


    public function destroy(string $id)
    {
        $subcategory = SubCategory::where('id', $id)->first();
        Product::where('subcategory_id', $subcategory->id)->delete();


        $subcategory->delete();
        return back()->with('success', 'Deleted Successfully.');

    }
}
