<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function get_all_post(){
        $blogposts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'blogposts' => $blogposts
        ], 200);
    }

    public function get_all_category(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function get_post_by_slug($slug){
        $post = Post::with('user', 'category')->where('slug', $slug)->first();
        return response()->json([
            'post' => $post
        ], 200);
    }

    

}
