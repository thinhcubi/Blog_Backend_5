<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{


    public function index(){

        $post = Post::all();
        return response()->json($post,201);
    }
    public function store(Request $request){

        DB::beginTransaction();

        try {

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content_post;
            $post->image = $request->image;
            $post->desc = $request->desc;
            $post->access_modifier= $request->access_modifier;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->save();
            return response()->json('Đã thêm thành công bài post' );

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }
}
