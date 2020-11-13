<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use DB;

class BlogController extends Controller
{
    public function get_all_post(){
        //$blogposts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        $posts = DB::table('posts')
                        ->join('categories', 'posts.cat_slug', '=', 'categories.cat_slug')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->orderBy('posts.id', 'desc')
                        ->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function get_all_category(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function get_post_by_slug($slug){
        //$post = Post::with('user', 'category')->where('slug', $slug)->first();
        $post = DB::table('posts')
                        ->join('categories', 'posts.cat_slug', '=', 'categories.cat_slug')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->orderBy('posts.id', 'desc')
                        ->where('posts.slug', $slug)
                        ->first();
        return response()->json([
            'post' => $post
        ], 200);
    }

    public function get_post_by_cat_slug($cat_slug){
        //$posts = Post::with('user', 'category')->where('cat_slug', $cat_slug)->orderBy('id', 'desc')->get();
        $posts = DB::table('posts')
                        ->join('categories', 'posts.cat_slug', '=', 'categories.cat_slug')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->where('posts.cat_slug', $cat_slug)
                        ->orderBy('posts.id', 'desc')
                        ->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function search_post(){
        $search = \Request::get('s');
        if($search != null){
            $posts = DB::table('posts')
            ->join('categories', 'posts.cat_slug', '=', 'categories.cat_slug')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.post_title', 'like', '%'.$search.'%')
            ->orWhere('posts.post_des', 'like', '%'.$search.'%')
            ->get();
            return response()->json([
            'posts' => $posts
            ], 200);

        }else{
            return $this->get_all_post();
        }
       

    }

    public function get_latestpost(){
        $posts = DB::table('posts')
                        ->join('categories', 'posts.cat_slug', '=', 'categories.cat_slug')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->orderBy('posts.id', 'desc')
                        ->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    

}
