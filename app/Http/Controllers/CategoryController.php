<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory() {
        $category = Category::all();
        return response()->json($category);
    }

    function DetailCategory($id) {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function showPostByCategory($id) {

        $posts = Post::where('category_id', '=', $id)->where('access_modifier', 0 )->with('user')->with('category')->get();
        return response()->json($posts);
    }
}
