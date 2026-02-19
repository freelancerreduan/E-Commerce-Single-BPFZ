<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Division;
use App\Models\FeaturedImage;
use App\Models\Feedback;
use App\Models\Page;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendHomeController extends Controller
{
    public function index() {
        $products = Product::with('category')->orderBy('created_at', 'DESC')->paginate(12);
        return view('index', compact('products'));
    }
    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->orderBy('created_at', 'DESC')->paginate(12);
        return view('category', compact('category', 'products'));
    }
    public function subCategory($slug) {
        $SubCategory = SubCategory::where('slug', $slug)->first();
        $products = Product::where('subcategory_id', $SubCategory->id)->orderBy('created_at', 'DESC')->paginate(12);
        return view('sub-category', compact('SubCategory', 'products'));
    }

    public function search() {
        $search = $_GET['search'];
        if ($search == '') {
            return back();
        }

        $products = DB::table('products')
                    ->where('products.title', 'like', '%'.$search.'%')
                    ->orWhere('products.slug', 'like', '%'.$search.'%')
                    ->orWhere('products.sku', 'like', '%'.$search.'%')
                    ->orWhere('categories.category_name', 'like', '%'.$search.'%')
                    ->orWhere('categories.slug', 'like', '%'.$search.'%')
                    ->leftJoin('categories', 'categories.id', 'products.category_id')
                    ->select('products.*', 'categories.category_name', 'categories.slug as categorySlug')
                    ->orderBy('created_at', 'DESC')->paginate(12);

        return view('search', compact('search', 'products'));
    }

    public function shop($slug) {
        $product = Product::with('category')->where('slug', $slug)->first();
        $featureds = FeaturedImage::where('product_id', $product->id)->get();
        $reviws = Review::with('user')->where('product_id', $product->id)->latest()->limit(12)->get();
        return view('shop', compact('product', 'featureds', 'reviws'));
    }


    public function termsAndCondition() {
        $data = Page::where('id', 1)->first();
        return view('page', compact('data'));
    }
    public function returnPolicy() {
        $data = Page::where('id', 2)->first();
        return view('page', compact('data'));
    }
    public function privacyPolicy() {
        $data = Page::where('id', 3)->first();
        return view('page', compact('data'));
    }
    public function about() {
        $data = Page::where('id', 4)->first();
        return view('page', compact('data'));
    }

    public function reviews() {
        $reviews = Feedback::latest()->paginate(36);
        return view('reviews', compact('reviews'));
    }
}
