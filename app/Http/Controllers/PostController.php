<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function all_post(){
        $posts = Post::with('user', 'category')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
}
