<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    public function index() {
        $posts = Post::with('category')->where('status', 'publish')->latest()->paginate(16);
        return view('blog.index', compact('posts'));
    }

    public function details($slug) {
        $post = Post::where('slug', $slug)->first();
        $lposts = Post::where([['status', 'publish'], ['id', '!=', $post->id]])->latest()->limit(16)->get();
        if (!$post) {
            return abort(404);
        }
        return view('blog.details', compact('lposts', 'post'));
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            return abort(404);
        }
        $posts = Post::where([['status', 'publish'], ['category_id', $category->id]])->latest()->paginate(16);
        return view('blog.category', compact('posts', 'category'));
    }
}
