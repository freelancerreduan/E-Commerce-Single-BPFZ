<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\Category;
use App\Models\FeaturedImage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Review;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Product::with('category', 'size')->orderBy('created_at', 'DESC')->get();
        return view('admin.product.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->orderBy('category_name', 'DESC')->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | string | max:255 | unique:products,title',
            'category' => 'required | numeric',
            'sub_category' => 'required | numeric',
            'price' => 'required | numeric | min:1',
            'sku' => 'required | string | max:255 | unique:products,sku',
            'description' => 'required | string',
            'additional_info' => 'required | string',
            'thumbnails' => 'required | image | mimes:jpg,png,jpeg,webp',
            'featured_images.*' => 'required | image | mimes:jpg,png,jpeg,webp',
            'varient' => 'required | array | min:1',
            'varient.*.size' => 'required | string | max:255',
            'varient.*.stock' => 'required | numeric | min:1',
        ],[
            'varient.*.size.required' => 'The size field is required.',
            'varient.*.stock.required' => 'The stock field is required.',
            'varient.*.numeric.required' => 'The stock field must be give number.',
            'varient.*.numeric.required' => 'The stock field minimum value 1.',
        ]);

        $file = $request->file('thumbnails');
        $fileName = time().'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
        $path = 'uploads/';
        $request->thumbnails->move($path,$fileName);

        $productId = Product::insertGetId([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'subcategory_id' => $request->sub_category,
            'old_price' => $request->old_price ? $request->old_price : null,
            'price' => $request->price,
            'sku' => $request->sku,
            'description' => $request->description,
            'additional_info' => $request->additional_info,
            'thumbnails' => $path.$fileName,
            'created_at' => Carbon::now()
        ]);

        $images = $request->featured_images;
        foreach ($images as $singleImage) {
            $featuredFileName = time().Str::random(5).'-featured.'.$singleImage->getClientOriginalExtension();
            $fPath = 'uploads/';
            $singleImage->move($path, $featuredFileName);
            FeaturedImage::insert([
                'product_id' => $productId,
                'featured_image' => $fPath.$featuredFileName,
                'created_at' => Carbon::now()
            ]);
        }


        foreach($request->varient as $singlevarient)
        {
            Size::insert([
                'product_id' => $productId,
                'size' => $singlevarient['size'],
                'stock' => $singlevarient['stock'],
                'created_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::where('id', $id)->first();
        $categories = Category::where([['category_name', '!=', 'Uncategorized'], ['slug', '!=', 'uncategorized']])->orderBy('category_name', 'DESC')->get();
        $subCategory = SubCategory::where('id', $data->subcategory_id)->first();
        $sizes = Size::where('product_id', $data->id)->get();
        $featureds = FeaturedImage::where('product_id', $data->id)->get();
        return view('admin.product.edit', compact('categories', 'subCategory', 'data', 'sizes', 'featureds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::where('id', $id)->first();
        $request->validate([
            'title' => 'required | string | max:255 | unique:products,title,'.$data->id.',id',
            'category' => 'required | numeric',
            'sub_category' => 'required | numeric',
            'price' => 'required | numeric | min:1',
            'sku' => 'required | string | max:255 | unique:products,sku,'.$data->id.',id',
            'description' => 'required | string',
            'additional_info' => 'required | string',
            'thumbnails' => 'image | mimes:jpg,png,jpeg',
            'featured_images.*' => 'image | mimes:jpg,png,jpeg',
            'varient' => 'required | array | min:1',
            'varient.*.size' => 'required | string | max:255',
            'varient.*.stock' => 'required | numeric | min:1',
        ],[
            'varient.*.size.required' => 'The size field is required.',
            'varient.*.stock.required' => 'The stock field is required.',
            'varient.*.numeric.required' => 'The stock field must be give number.',
            'varient.*.numeric.required' => 'The stock field minimum value 1.',
        ]);

        if ($request->hasFile('thumbnails')) {
            unlink(base_path($data->thumbnails));

            $file = $request->file('thumbnails');
            $fileName = time().'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
            $path = 'uploads/';
            $request->thumbnails->move($path,$fileName);
            $data->update([
                'thumbnails' => $path.$fileName,
            ]);
        }

        if ($request->hasFile('featured_images')) {
            $featureds = FeaturedImage::where('product_id', $data->id)->get();
            foreach ($featureds as $key => $featured) {
                unlink(base_path($featured->featured_image));
                $featured->delete();
            }

            $images = $request->featured_images;
            foreach ($images as $singleImage) {
                $featuredFileName = time().Str::random(5).'-featured.'.$singleImage->getClientOriginalExtension();
                $fPath = 'uploads/';
                $singleImage->move($fPath, $featuredFileName);
                FeaturedImage::insert([
                    'product_id' => $data->id,
                    'featured_image' => $fPath.$featuredFileName,
                    'created_at' => Carbon::now()
                ]);
            }


        }

        Size::where('product_id', $data->id)->delete();
        foreach($request->varient as $singlevarient)
        {
            Size::insert([
                'product_id' => $data->id,
                'size' => $singlevarient['size'],
                'stock' => $singlevarient['stock'],
                'created_at' => Carbon::now()
            ]);
        }



        $data->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'subcategory_id' => $request->sub_category,
            'old_price' => $request->old_price ? $request->old_price : null,
            'price' => $request->price,
            'sku' => $request->sku,
            'description' => $request->description,
            'additional_info' => $request->additional_info,
        ]);

        return back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::where('id', $id)->first();
        unlink(base_path($data->thumbnails));
        $featureds = FeaturedImage::where('product_id', $data->id)->get();
        foreach ($featureds as $key => $featured) {
            unlink(base_path($featured->featured_image));
            $featured->delete();
        }
        Cart::where('product_id', $data->id)->delete();
        Wishlist::where('product_id', $data->id)->delete();
        Size::where('product_id', $data->id)->delete();
        Review::where('product_id', $data->id)->delete();

        $orderItems = OrderItem::where('product_id', $data->id)->get();
        foreach ($orderItems as $item) {
            Payment::where('order_id', $item->order_id)->delete();
            Billing::where('order_id', $item->order_id)->delete();
            Order::where('id', $item->order_id)->delete();
            $item->delete();
        }
        $data->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function addStep(Request $request) {
        $i = $request->i;

        return view('admin.layouts.partials.extra.add-step', compact('i'));
    }

    public function getSubCategory(Request $request) {
        $request->validate([
            '*' => 'required'
        ]);

        $subCategories = SubCategory::where('category_id', $request->catId)->get();
        return view('admin.layouts.partials.sub-category', compact('subCategories'));
    }
}
