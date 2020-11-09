<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function saveCategory(Request $req){
        //validation
        $this->validate($req,[
            'cat_name' => 'required|min:2|max:50|unique:categories'
        ]);
        $category = New Category();
        $category->cat_name = $req->cat_name;
        $category->save();
        return ['message' => 'ok'];
    }

    public function all_category(){
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function delete_category($id){
        $category = Category::find($id);
        if($category != null){
            $category->delete();
        }
        
    }

    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            'category' =>  $category
        ], 200);
    }

    public function update_category(Request $req, $id){
         //validation
         $this->validate($req,[
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->cat_name = $req->cat_name;
        $category->save();
    }
}
