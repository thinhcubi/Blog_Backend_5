<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getListPostsByUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $posts = Post::where('user_id',$user->id)->get();
        return response()->json($posts);
    }

    public function getById()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $id = $user->id;
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function editProfile(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
            $data = [
                'status' => 'success',
                'message' => 'Cập nhật thành công',
            ];
            return response()->json($data);
    }

    public function createPost(CreatePostRequest $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->_content;
        $post->image = $request->image;
        $post->desc = $request->desc;
        $post->user_id = $user->id;
        $post->access_modifier = $request->access_modifier;
        $post->category_id = $request->category_id;
        $post->save();
        return response()->json();
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}
