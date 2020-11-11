<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Auth;
use Image;

class PostController extends Controller
{
    public function all_post(){
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function save_post(Request $req){
        //validation
        $this->validate($req,[
            'post_title'=>'required|min:2',
            'post_des'=>'required|min:2',
            'slug' => 'required|unique:posts'
        ]);

        //start image 
        $strpos = strpos($req->post_photo,';');
        $sub = substr($req->post_photo,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($req->post_photo)->resize(500, 400);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        //end image

        $post = New Post();
        $post->post_title = $req->post_title;
        $post->slug = $req->slug;
        $post->post_des = $req->post_des;
        $post->meta_des = $req->meta_des;
        $post->cat_id = $req->cat_id;
        $post->post_photo = $name;
        $post->user_id = Auth::user()->id;
        $post->save();

    }

    public function delete_post($id){
        $post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path. $post->post_photo;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
    }

    public function edit_post($id){
        $post = Post::find($id);
        return response()->json([
            'post'=>$post
        ],200);
    }

    public function update_post(Request $req, $id){
        $post = Post::find($id);
        $this->validate($req,[
            'post_title'=>'required|min:2',
            'post_des'=>'required|min:2',
            'slug' => 'required|unique:posts,slug,'.$post->id
        ]);


        if($req->post_photo != $post->post_photo){
            $strpos = strpos($req->post_photo,';');
            $sub = substr($req->post_photo,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($req->post_photo)->resize(200, 200);
            $upload_path = public_path()."/uploadimage/";
            $image = $upload_path. $post->post_photo;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $post->post_photo;
        }

        $post->post_title = $req->post_title;
        $post->slug = $req->slug;
        $post->post_des = $req->post_des;
        $post->meta_des = $req->meta_des;
        $post->cat_id = $req->cat_id;
        $post->post_photo = $name;
        $post->user_id = Auth::user()->id;
        $post->save();
    }
}
